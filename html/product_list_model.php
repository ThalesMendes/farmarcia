<?php
  class product_list_model {
    private const DEFAULT_PRODUCTS_COUNT = 10;

    private $db_connection;

    function __construct($db_connection) {
      $this->db_connection = $db_connection;
    }

    public function get_categories() {
      $result = $this->db_connection->query(
        "SELECT *
         FROM `Categoria`
         ORDER BY `nome` ASC");

      $products = array();
      while ($row = $result->fetch_assoc()) {
        $categories[] = $row;
      }
      $result->close();

      return $categories;
    }

    public function get_products($sort_sql, $filtered_categories, $search_string) {
      if (empty($search_string) && empty($filtered_categories)) {
        return self::get_default_products($sort_sql);
      }

      $sql = "SELECT * FROM `Produto` ";

      if (empty($filtered_categories)) {
        $sql .= "ORDER BY $sort_sql;";
        $result = $this->db_connection->query($sql);
      } else {
        $result = self::query_filtered_products($sql, $sort_sql, $filtered_categories);
      }

      $categories = self::get_categories();

      $products = array();
      if (!empty($search_string)) {
        $exploded_search = explode(' ', $search_string);

        while ($row = $result->fetch_assoc()) {
          if (product_searcher::is_product_search_match($row['nome'], $exploded_search)
          || product_searcher::is_category_search_match($row['Categoria_id'], $categories, $exploded_search)) {
            $products[] = $row;
          }
        }
      } else {
        while ($row = $result->fetch_assoc()) {
          $products[] = $row;
        }
      }

      $result->close();

      return $products;
    }

    private function get_default_products($sort_sql) {
      $result = $this->db_connection->query(
        "SELECT *
        FROM `Produto`
        ORDER BY $sort_sql
        LIMIT " . self::DEFAULT_PRODUCTS_COUNT . ";");

      $products = array();
      while ($row = $result->fetch_assoc()) {
        $products[] = $row;
      }
      $result->close();

      return $products;
    }

    private function query_filtered_products($base_sql, $sort_sql, $filtered_categories) {
      $sql = $base_sql . "WHERE `Categoria_id` = ?";
      $sql .= str_repeat(" OR `Categoria_id` = ?", count($filtered_categories) - 1);
      $sql .= " ORDER BY $sort_sql;";

      $types = str_repeat('i', count($filtered_categories));

      $stmt = $this->db_connection->prepare($sql);

      $params = array($types);
      foreach ($filtered_categories as &$category) {
        $params[] = &$category;
      }
      call_user_func_array(array($stmt, 'bind_param'), $params);

      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();

      return $result;
    }
  }

  class product_searcher {
    private const MIN_CATEGORY_SIMILARITY = 65;
    private const MIN_NAME_SIMILARITY = 72.5;

    public function is_product_search_match($product_name, $search_tokens) {
      $name_tokens = explode(' ', $product_name);

      foreach ($search_tokens as $search_token) {
        if (!self::contains($search_token, $product_name)
         && !self::is_similar($name_tokens, $search_token, self::MIN_NAME_SIMILARITY))
          return false;
      }
      return true;
    }

    public function is_category_search_match($product_category_id, $categories, $search_tokens) {
      foreach ($categories as $category) {
        if ($category['id'] == $product_category_id) {
          if (self::is_category_match($category['nome'], $search_tokens))
            return true;
          else
            return false;
        }
      }
      return false;
    }

    private static function is_category_match($category_name, $search_tokens) {
      $name_tokens = explode(' ', $category_name);

      foreach ($search_tokens as $search_token) {
        if (!self::is_similar($name_tokens, $search_token, self::MIN_CATEGORY_SIMILARITY))
          return false;
      }
      return true;
    }

    private static function is_similar($name_tokens, $search_token, $min_similarity) {
      foreach ($name_tokens as $name_token) {
        similar_text($name_token, $search_token, $similarity);
        if ($similarity >= $min_similarity)
          return true;
      }
    }

    private static function contains($needle, $haystack) {
      return stripos($haystack, $needle) !== false;
    }
  }
?>

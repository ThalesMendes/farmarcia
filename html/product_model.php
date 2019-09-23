<?php
  class product_model
  {
      private $db_connection;

      public function __construct($db_connection)
      {
          $this->db_connection = $db_connection;
      }

      public function get_product($id)
      {
          $id = $_GET['id'];

          $stmt = $this->db_connection->prepare(
              'SELECT *
        FROM `produto`
        WHERE `id` = ?'
          );

          $stmt->bind_param('i', $id);
          $stmt->execute();

          $result = $stmt->get_result();
          if ($result !== false) {
              $product = $result->fetch_assoc();
          }
          $result->close();

          return $product;
      }

      public function get_category_name($category_id)
      {
          $stmt = $this->db_connection->prepare(
              'SELECT `nome`
        FROM `categoria`
        WHERE `id` = ?'
          );

          $stmt->bind_param('i', $category_id);
          $stmt->execute();

          $result = $stmt->get_result();
          if ($result !== false) {
              $category = $result->fetch_assoc();
          }
          $result->close();

          return $category['nome'];
      }
  }

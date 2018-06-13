<?php
  function limit_text($text, $char_count) {
    if (strlen($text) > $char_count)
      return explode("\n", wordwrap($text, $char_count))[0] . '...';
    else
      return $text;
  }

  function get_image_path($img_name) {
    $product_image_directory = '../assets/imgs/produtos/';

    if ($img_name != NULL)
      return $product_image_directory . $img_name;
    else
      return $product_image_directory . 'produto-placeholder.png';
  }
?>

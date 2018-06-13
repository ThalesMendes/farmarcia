<?php
  $db_connection = new mysqli('localhost', 'root', '', 'farmarcia', 3306);
  $db_connection->set_charset('utf8');

  if ($db_connection->error) {
    exit;
  }
?>

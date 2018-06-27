<?php
  session_start();

  if (!isset($_SESSION['login']) || !isset($_SESSION['ip']) || $_SESSION['ip'] !== $_SERVER['REMOTE_ADDR']) {
    require 'logout.php';
  }
?>

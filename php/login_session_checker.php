<?php 
// file ini berfungsi untuk mengatasi admin yang mencoba untuk masuk dashboard tapi belum melakukan login.
session_start();

// cek session
if (!isset($_SESSION["login"]) || ! $_SESSION["login"] == true) {
  header('Location:login.php');
  exit;
}

?>
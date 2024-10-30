<?php 
// file ini berfungsi untuk mengatasi admin yanng mencoba untuk melakukan edit / hapus/ tambah data member tanpa masuk dashboard terlebih dahulu.

session_start();
if (!isset($_SESSION["dashboard_visited"]) || !$_SESSION["dashboard_visited"]) {
    header('Location:../login.php');
    exit;
}


?>
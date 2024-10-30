<?php 
// fungsi file ini untuk keluar dari login (logout) dan menghapus semua data variabel session yang sudah dibuat , dan mengembalikan halaman ke halaman login.
session_start();
session_destroy();
header('Location:  ../login.php');

?>
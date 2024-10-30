<?php 
// file ini berfungsi untuk mengkoneksikan ke database mysql , file ini akan sering dipanggil di beberapa file lain.

$HOSTNAME = 'localhost';
$USERNAME = 'root';
$PASSWORD = 'rahadityaputra';
$DATABASE = 'lfc_member_database';


// membuat koneksi
$koneksi =  mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);

if (mysqli_connect_errno()) {
    echo "koneksi eror";
}

?>
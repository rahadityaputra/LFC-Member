<?php 
// file ini berfungsi untuk mengkoneksikan ke database mysql , file ini akan sering dipanggil di beberapa file lain.

$HOSTNAME = 'localhost';
$USERNAME = 'root';
$PASSWORD = 'rahadityaputra';
$DATABASE = 'lfc_member_database';


function connect_db() {
    global  $HOSTNAME, $USERNAME, $PASSWORD, $DATABASE;
    $conn = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);
    // membuat koneksi
    // $koneksi =  mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);    
    if (mysqli_connect_errno($conn)) {
        die("eror connection". mysqli_connect_error());
    }

    return $conn;
}

?>
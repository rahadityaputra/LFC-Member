<?php 
$HOSTNAME = 'localhost';
$USERNAME = 'root';
$PASSWORD = 'rahadityaputra';
$DATABASE = 'lfc_member_database';

if (!function_exists('connect_db')) {
    function connect_db() {
        global  $HOSTNAME, $USERNAME, $PASSWORD, $DATABASE;
        $conn = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);
        if (!$conn) {
            die("eror connection". mysqli_connect_error());
        }
    
        return $conn;
    }    
}

?>
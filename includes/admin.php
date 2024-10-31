<?php 
require_once '../includes/functions.php';


// function untuk mengecek valid data username dan password admin 
function check_credentials_admin($conn, $username, $password) {
    $sqlQuery = "SELECT * FROM members WHERE username = $username AND password =  $password";

    $result = queryMysql($conn,  $sqlQuery);
    if (count($result) == 1) {
        return true;
    } else {
        return false;
    }
}

// function untuk membuat session saat sudah berhasil login
function login_admin($username, $password){
    session_start();
    $_SESSION["username"] = $username;
    $_SESSION["password"] = $password;

}

// function untuk menghapus session yang telah dibuat agar logout
function logout_admin() {
    session_start();
    session_destroy();
}


// function untuk cek apakah admin sudah login atau belum
function admin_is_logged_in() {
    session_start();
    if (isset($_SESSION["username"]) &&  isset($_SESSION["password"])) {
        return true;
    } else {
        return false;
    }
}
?>
<?php 

require '../includes/admin.php';

function login() {
    require_once '../views/admin/login.php';
}

function login_verification($conn) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    var_dump($password, $username);

    if (check_credentials_admin($conn, $username, $password)) {
        create_session($username, $password);
        header('Location: index.php?action=list_member');
        exit;
    } else {
        header('Location: index.php?action=login&error=true');
        exit;
    }
}
?>
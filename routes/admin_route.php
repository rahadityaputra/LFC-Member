<?php

if (isset($_GET["action"])) {
    # code...
    $action = $_GET['action'];
    switch ($action) {
        case 'login':
            login();
            break;
        case 'login_verification':
            login_verification($conn);
            break;
        default:
            header('Location:index.php?action=login');
            exit;

            break;
    }
} else {
    header('Location:index.php?action=login');
    exit;
}

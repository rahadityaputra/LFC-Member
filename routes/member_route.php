<?php


if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'list_member':
            list_members($conn);
            break;
        case 'input_member':
            $mode = $_GET["mode"];
            input_member($conn , $mode);
            break;
        case 'add_member':
            add_member($conn);
            break;
        case 'edit_member':
            edit_member($conn);
            break;
        case 'delete_member':
            $id = $_GET['id'];
            $image = $_GET["image"];
            delete_member($conn, $id, $image);
            break;
        case 'card_member':
            showCardMember($conn);
            break;
        case 'logout':
            logout_admin();
            break;
        default:
            header('Location:index.php?action=login');
            exit;
            break;
    }
} else {
    header('Location: index.php?action=list_member');
    exit;
}

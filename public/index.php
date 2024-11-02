<?php

require_once '../config/database.php';
require_once '../actions/admin_action.php';
require_once '../actions/member_action.php';

$conn = connect_db();

// mengatur route aplikasi 
if (admin_is_logged_in()) {
   require_once '../routes/member_route.php';
} else {
    require_once '../routes/admin_route.php';

}

// Tutup koneksi database
mysqli_close($conn);

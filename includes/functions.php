<?php 

require '../config/database.php';

function queryMysql($conn, $sqlQuery) {
    $arr = array();
    $result = mysqli_query($conn, $sqlQuery);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $arr[] = $row;
        }

        return $arr;
    }

    return false;
}



?>
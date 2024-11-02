<?php

require '../config/database.php';


if (!function_exists('queryMysql')) {
    function queryMysql($conn, $sqlQuery)
    {
        $result = mysqli_query($conn, $sqlQuery);

        if ($result) {
            // Jika query berhasil dieksekusi
            if (strpos(strtoupper($sqlQuery), 'SELECT') === 0) {
                // Jika query adalah SELECT, kembalikan data seperti sebelumnya
                $arr = array();
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $arr[] = $row;
                    }
                    return $arr;
                } else {
                    return []; // Kembalikan array kosong jika tidak ada hasil
                }
            } else {
                // Jika query adalah DELETE atau INSERT, kembalikan true
                return true;
            }
        } else {
            // Jika query gagal dieksekusi, kembalikan false
            return false;
        }
    }
}


if (!function_exists('checkPayment')) {
    function checkPayment($member_type, $payment_nominal)
    {
        if ($member_type == 'regular' || $member_type == 'online') {
            return $payment_nominal == '10000';
        } else if ($member_type == 'student') {
            return $payment_nominal == '5000';
        }
        return $payment_nominal == '20000';
    }
}

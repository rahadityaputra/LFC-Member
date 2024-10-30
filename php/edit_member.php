<?php 


// cek sesi
include "dashboard_session_checker.php";

$id = $_POST["id"];
$name = $_POST['name'];
$gender = $_POST["gender"];
$birth = $_POST["birth"];
$address = $_POST["address"];
$phone_number =  $_POST["phone-number"];
$member_type = $_POST["member-type"];

echo $id;
echo $name;
echo $gender;

include "koneksi.php";

$sqlQuery = "UPDATE `members` SET 
                `name` = '$name',
                `gender`= '$gender', 
                `birth` = '$birth',
                `address` = '$address',
                `phone_number` = '$phone_number', 
                `member_type` = '$member_type'
                WHERE `id_member` = $id";

$result = mysqli_query($koneksi,  $sqlQuery);

if ($result) {
    header('Location: ../index.php');
}

?>

<?php 


include "dashboard_session_checker.php";
include "koneksi.php";

$id_hapus = $_GET["id"]; 

$sqlQuery = "DELETE FROM members WHERE id_member ='$id_hapus'";
$result = mysqli_query($koneksi,  $sqlQuery);

if($result) {
    header('Location: ../index.php');
}

?>
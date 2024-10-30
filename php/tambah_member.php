<?php 

$photo = $_FILES["card-photo"];
$target_dir = "../card/photo/";
$imageFileType = strtolower(pathinfo(basename($photo["name"]), PATHINFO_EXTENSION));
$newFileName = time(). "." . $imageFileType; // Nama file unik
$target_file = $target_dir . $newFileName;
$uploadOk = 1;

var_dump(pathinfo($target_file, PATHINFO_EXTENSION));
if (isset($_POST["submit"])) {
  $check = getimagesize($photo["tmp_name"])["mime"];
  if ($check !== 'image/jpeg') {
    echo "<h1>File is not an image. </h1>";
    $uploadOk = 0;
    exit();
  } else {
    $uploadOk = 1;
  }
}

// upload ke folder card/photo/
if (!move_uploaded_file($photo["tmp_name"], $target_file)) {
  exit();
}



// menangkap data dari inputan form
$name = $_POST['name'];
$gender = $_POST["gender"];
$birth = $_POST["birth"];
$address = $_POST["address"];
$phone_number =  $_POST["phone-number"];
$member_type = $_POST["member-type"];
$join_date = date('Y-m-j');
$ImagePath = $target_dir . $newFileName;


include "koneksi.php";

$sqlQuery = "INSERT INTO `members` (`id_member`, `name`, `gender`, `birth`, `phone_number`, `member_type`, `join_date`, `image_path`) VALUES (NULL, '$name', '$gender', '$birth', '$phone_number', '$member_type', current_timestamp(), '$ImagePath');";

$result = mysqli_query($koneksi,  $sqlQuery);

if ($result) {

    header('Location: ../index.php');
}














?>
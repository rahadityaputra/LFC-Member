<?php

require '../includes/functions.php';

function list_members($conn)
{
  $sqlQuery =  "SELECT 
    id_member, 
    name, 
    join_date, 
    member_type, 
    CASE 
      WHEN member_type = 'regular' OR member_type = 'student' OR member_type = 'online' THEN join_date + INTERVAL 1 WEEk
      ELSE join_date + INTERVAL 1 MONTH
      END AS expired_date
    FROM members";

  $result = queryMysql($conn, $sqlQuery);


  require_once '../views/user/dashboard.php';
}

function add_member($conn, $name, $gender, $birth, $phone_number, $member_type, $photo)
{
  $target_dir = "../card/photo/";
  $imageFileType = strtolower(pathinfo(basename($photo["name"]), PATHINFO_EXTENSION));
  $newFileName = time() . "." . $imageFileType; // Nama file unik
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
  $ImagePath = $target_dir . $newFileName;


  $sqlQuery = "INSERT INTO `members` (`id_member`, `name`, `gender`, `birth`, `phone_number`, `member_type`, `join_date`, `image_path`) VALUES (NULL, '$name', '$gender', '$birth', '$phone_number', '$member_type', current_timestamp(), '$ImagePath');";

  $result = queryMysql($conn,  $sqlQuery);


  require_once '../views/user/add.php';
}




function  delete_member($conn, $id_member)
{
  $sqlQuery = "DELETE FROM members WHERE id_member ='$id_member'";
  $result = queryMysql($conn, $sqlQuery);
  require_once '../views/user/delete.php';
}



function  edit_member($conn, $id_member, $name, $gender, $birth, $address, $phone_number, $member_type)
{
  $sqlQuery = "UPDATE `members` SET 
                `name` = '$name',
                `gender`= '$gender', 
                `birth` = '$birth',
                `address` = '$address',
                `phone_number` = '$phone_number', 
                `member_type` = '$member_type'
                WHERE `id_member` = $id_member";

  $result = queryMysql($conn, $sqlQuery);
  require_once '../views/user/edit.php';
}

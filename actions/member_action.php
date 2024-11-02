<?php

require '../includes/functions.php';

function list_members($conn)
{
  $sqlQuery =  "SELECT 
    id_member, 
    name, 
    join_date, 
    member_type,
    image_path, 
    CASE 
      WHEN member_type = 'regular' OR member_type = 'student' OR member_type = 'online' THEN join_date + INTERVAL 1 WEEk
      ELSE join_date + INTERVAL 1 MONTH
      END AS expired_date
    FROM members";

  $result = queryMysql($conn, $sqlQuery);
  require_once '../views/user/dashboard.php';
}


function input_member($conn, $mode)
{
  if ($mode == 'edit') {
    $id = $_GET["id"];
    $sqlQuery = "SELECT * FROM `members` WHERE id_member = '$id'";
    $result = queryMysql($conn, $sqlQuery);
  }
  require_once '../views/user/input.php';
}


function add_member($conn)
{


  $photo = $_FILES["card-photo"];
  $name = $_POST['name'];
  $gender = $_POST["gender"];
  $birth = $_POST["birth"];
  $address = $_POST["address"];
  $phone_number =  $_POST["phone-number"];
  $member_type = $_POST["member-type"];
  $payment_nominal = $_POST["payment-nominal"];
  
  if (!checkPayment($member_type, $payment_nominal)) {
    header('Location: index.php?action=input_member&mode=add&payment=false');
    exit;
  }


  $target_dir = "../member_photos/";
  $imageFileType = strtolower(pathinfo(basename($photo["name"]), PATHINFO_EXTENSION));

  if ($photo["name"] == "") { // jika foto member tidak diapload
    if ($gender == 'male') {
      $newFileName = "male_default.jpg";
    } else {
      $newFileName = "female_default.jpg";
    }
  } else {
    $newFileName = time() . "." . $imageFileType; // Nama file unik
  }


  $target_file = $target_dir . $newFileName;



  if ($photo["name"] != '') { // jika foto tidak diupload maka file tidak usah disimpan
    if (!move_uploaded_file($photo["tmp_name"], $target_file)) {
      exit();
    }
  }

  $ImagePath = $target_dir . $newFileName;

  $sqlQuery = "INSERT INTO `members` (`id_member`, `name`, `gender`, `birth`, `address`, `phone_number`, `member_type`, `join_date`, `image_path`) 
  VALUES (NULL, '$name', '$gender', '$birth', '$address', '$phone_number', '$member_type', DATE(current_timestamp()), '$ImagePath')";

  echo  $sqlQuery;
  $result = mysqli_query($conn, $sqlQuery);

  header('Location: index.php?action=list_member');
}


function  delete_member($conn, $id_member, $image_path)
{
  $sqlQuery = "DELETE FROM members WHERE id_member ='$id_member'";
  $result = queryMysql($conn, $sqlQuery);
  if (file_exists($image_path) && $image_path != '../member_photos/male_default.jpg' && $image_path != '../member_photos/female_default.jpg' ){
    unlink($image_path);
  }  
  header('Location:index.php?action=list_member');
}



function  edit_member($conn)
{
  $id = $_POST['id'];
  $photo = $_FILES["card-photo"];
  $name = $_POST['name'];
  $gender = $_POST["gender"];
  $birth = $_POST["birth"];
  $address = $_POST["address"];
  $phone_number =  $_POST["phone-number"];
  $member_type = $_POST["member-type"];
  $payment_nominal = $_POST["payment-nominal"];
  if (!checkPayment($member_type, $payment_nominal)) {
    header('Location: index.php?action=input_member&mode=edit&id='.$id.'&payment=false');
    exit;
  }


  $sqlQuery = "UPDATE `members` SET 
                `name` = '$name',
                `gender`= '$gender', 
                `birth` = '$birth',
                `address` = '$address',
                `phone_number` = '$phone_number', 
                `member_type` = '$member_type'
                WHERE `id_member` = $id";

  $result = queryMysql($conn, $sqlQuery);
  header('Location: index.php?action=list_member');
}

function showCardMember($conn)
{
  $id = $_GET["id"];
  $sqlQuery = "SELECT 
              *,
              CASE 
                WHEN member_type = 'regular' OR member_type = 'student' OR member_type = 'online' THEN join_date + INTERVAL 1 WEEk
                ELSE join_date + INTERVAL 1 MONTH
                END AS expired_date 
            FROM members WHERE id_member = '$id'";

  $data = queryMysql($conn, $sqlQuery);

  require_once '../views/user/card.php';
}

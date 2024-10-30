<?php
// file ini berfungsi untuk mengecek data login ke database (tabel admin) , jika data valid maka akan dibuatkan varibel session , jika tidak valid maka akan dikembalikan ke halaman login dengan alert gagal.

session_start();

$username = $_POST["username"];
$password = $_POST["password"];


include "koneksi.php";
// cek di mysql apakah  username dan password sudah ada di database
$result = mysqli_query($koneksi,  "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");

if (mysqli_num_rows($result) > 0) {
    //jika ada maka user diarahkan ke halaman index (utama) 
    $_SESSION['username'] = $username;
    $_SESSION['login'] = true;
    header("Location: ../index.php");
} else {
    //jika tidak ada maka diarahkan ke halaman login kembali
    echo "username atau password salah";
    header("Location: ../login.php?error=true");
}

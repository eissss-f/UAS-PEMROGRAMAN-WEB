<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "smart_pju";

$koneksi = mysqli_connect(
    $host,
    $user,
    $pass,
    $db
);

if(!$koneksi){
    die("Koneksi gagal");
}
?>
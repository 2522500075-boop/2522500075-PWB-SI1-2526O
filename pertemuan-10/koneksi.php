<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_pwd2025";

$conn = mysqli_conect($host, $user, $pass, $db);

if (!$conn) {
  die("Koneksi gagal: " . mysqli_conect_error());
}
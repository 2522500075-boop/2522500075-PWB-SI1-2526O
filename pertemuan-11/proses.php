<?php
session_start();

require 'fungsi.php';
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('index.php#contact');
}

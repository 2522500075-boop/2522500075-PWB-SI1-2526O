<?php
session_start();

require 'fungsi.php';
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('index.php#biodata');
}
$nim = bersihkan($_POST['txtNIM'] ?? '');
$nama = bersihkan($_POST['txtNMlengkap'] ?? '');
$tempat = bersihkan($_POST['txtT4lhr'] ?? '');
$tanggal = bersihkan($_POST["txtTgLlhr"] ?? '');
$hobi = bersihkan($_POST["txtHobi"] ?? '');
$pasangan = bersihkan($_POST["txtPasangan"] ?? '');
$pekerjaan = bersihkan($_POST["txtKerja"] ?? '');
$ortu = bersihkan($_POST["txtNMOrtu"] ?? '');
$kakak = bersihkan($_POST["txtNMKakak"] ?? '');
$adik = bersihkan($_POST["txtNMAdik"] ?? '');

$errors = [];

if ($nim === '')        { $errors[] = 'NIM wajib diisi.'; }
if ($nama === '')       { $errors[] = 'Nama lengkap wajib diisi.'; }
if ($tempat === '')     { $errors[] = 'Tempat lahir wajib diisi.'; }
if ($tanggal === '')    { $errors[] = 'Tanggal lahir wajib diisi.'; }
if ($hobi === '')       { $errors[] = 'Hobi wajib diisi.'; }
if ($pekerjaan === '')  { $errors[] = 'Pekerjaan wajib diisi.'; }
if ($ortu === '')       { $errors[] = 'Nama orang tua wajib diisi.'; }
if ($kakak === '')       { $errors[] = 'Nama kakak wajib diisi.'; }
if ($adik === '')       { $errors[] = 'Nama adik wajib diisi.'; }

if (mb_strlen($nim) < 5)  { $errors[] = 'NIM minimal 5 karakter.'; }
if (mb_strlen($nama) < 3) { $errors[] = 'Nama minimal 3 karakter.'; }
if (!empty($errors)) {
   
    $_SESSION['flash_error'] = implode('<br>', $errors);
    redirect_ke('index.php#biodata');
}

$sql = "INSERT INTO tbl_biodata_amik (cnim, cnama_lengkap, ctempat_lahir, ctanggal_lahir, chobi, cpasangan, cpekerjaan, cnama_orang_tua, cnama_kaka, cnama_adik) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,)";
$stmt = mysqli_prepare($conn, $sql);
if (!$stmt) {
    $_SESSION['flash_error'] = 'Terjadi kesalahan sistem (prepare gagal).';
    redirect_ke('index.php#bibodata');
}
mysqli_stmt_bind_param($stmt, "ssssssssss", $nim, $nama, $tempat, $tanggal, $hobi, $pasangan, $pekerjaan, $ortu, $kakak, $adik);
if (mysqli_stmt_execute($stmt)) {
    unset($_SESSION['old_biodata']);
    $_SESSION['flash_sukses'] = 'Terima kasih, data Anda sudah tersimpan.';
    redirect_ke('index.php#biodata');
} else {
    
    $_SESSION['flash_error'] = 'Data gagal disimpan. Silakan coba lagi.';
    redirect_ke('index.php#contact');
}
mysqli_stmt_close($stmt);

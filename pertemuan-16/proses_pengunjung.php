<?php
session_start();
require __DIR__ . '/koneksi.php'; // ← perbaikan path
require_once __DIR__ . '/fungsi.php';

# cek method form, hanya izinkan POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('index.php#biodata');
}

# inisialisasi errors (WAJIB ADA)
$errors = [];

# ambil dan bersihkan nilai dari form
$kode       = bersihkan($_POST['txtkdPengunjung'] ?? '');
$nama       = bersihkan($_POST['txtnmPengunjung'] ?? '');
$alamat     = bersihkan($_POST['txtalmtrumah'] ?? '');
$tanggal    = bersihkan($_POST['txttglkunjungan'] ?? '');
$hobi       = bersihkan($_POST['txtHobi'] ?? '');
$asal       = bersihkan($_POST['txtAsalslta'] ?? '');
$pekerjaan  = bersihkan($_POST['txtPekerjaan'] ?? '');
$ortu       = bersihkan($_POST['txtNmOrtu'] ?? '');
$pacar      = bersihkan($_POST['txtNmpacar'] ?? '');
$mantan     = bersihkan($_POST['txtNmmmantan'] ?? '');

# (jika nanti mau tambah validasi, errors sudah siap)
if (!empty($errors)) {
    $_SESSION['old_biodata'] = [
        'kode'       => $kode,
        'nama'       => $nama,
        'alamat'     => $alamat,
        'tanggal'    => $tanggal,
        'hobi'       => $hobi,
        'asal'       => $asal,
        'pekerjaan'  => $pekerjaan,
        'ortu'       => $ortu,
        'pacar'      => $pacar,
        'mantan'     => $mantan,
    ];

    $_SESSION['flash_error'] = implode('<br>', $errors);
    redirect_ke('index.php#biodata');
}

$sql = "INSERT INTO tbl_biodata_daftar_pengunjung
        (zkode_pengunjung, znama_pengunjung, zalamat_rumah, ztanggal_kunjungan, zhobi,
         zasal_SLTA, zpekerjaan, znama_orang_tua, znama_pacar, znama_mantan)
        VALUES (?,?,?,?,?,?,?,?,?,?)";

$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    $_SESSION['flash_error'] = 'Kesalahan sistem (prepare gagal).';
    redirect_ke('index.php#biodata');
}

mysqli_stmt_bind_param(
    $stmt,
    "ssssssssss",
    $kode,
    $nama,
    $alamat,
    $tanggal,
    $hobi,
    $asal,
    $pekerjaan,
    $ortu,
    $pacar,
    $mantan
);

if (mysqli_stmt_execute($stmt)) {
    unset($_SESSION['old_biodata']);
    $_SESSION['flash_sukses'] = 'Biodata berhasil disimpan.';
} else {
    $_SESSION['flash_error'] = 'Data gagal disimpan: ' . mysqli_stmt_error($stmt);
}

mysqli_stmt_close($stmt);
redirect_ke('index.php#biodata');

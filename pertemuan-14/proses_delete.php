<?php
session_start();

require __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

$cid = filter_input(INPUT_GET, 'cid', FILTER_VALIDATE_INT, [
  'options' => ['min_range' => 1]
]);

if (!$cid) {
  $_SESSION['sinar_error'] = 'CID tidak valid.';
  redirect_ke('read.php');
}

$stmt = mysqli_prepare(
  $conn,
  "DELETE FROM tbl_tamu WHERE cid = ?");

if (!$stmt) {

  $_SESSION['sinar_error'] = 'Terjadi kesalahan sistem (prepare gagal).';
  redirect_ke('read.php');
}


mysqli_stmt_bind_param($stmt, "i", $cid);

if (mysqli_stmt_execute($stmt)) {




  $_SESSION['sinar_sukses'] = 'Terima kasih, data Anda sudah musnahkan.';
  redirect_ke('read.php');
} else {
  $_SESSION['sinar_error'] = 'Data gagal dimusnahkan. Silakan coba lagi.';
  redirect_ke('edit.php?cid=' . (int)$cid);
}


mysqli_stmt_close($stmt);

redirect_ke('read.php');
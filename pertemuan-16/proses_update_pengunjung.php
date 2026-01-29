<?php
  session_start();
  require __DIR__ . '/koneksi.php';
  require_once __DIR__ . '/fungsi.php';

  #cek method form, hanya izinkan POST
  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('read.php');
  }

  #validasi cid wajib angka dan > 0
  $cid = filter_input(INPUT_POST, 'cid', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
  ]);

  if (!$cid) {
    $_SESSION['flash_error'] = 'CID Tidak Valid.';
    redirect_ke('edit.php?cid='. (int)$cid);
  }

  #ambil dan bersihkan (sanitasi) nilai dari form
  $kode         = bersihkan($_POST['kode_pengunjung']  ?? '');
  $nama         = bersihkan($_POST['nama_pengunjung']  ?? '');
  $alamat       = bersihkan($_POST['alamat_rumah'] ?? '');
  $tanggal      = bersihkan($_POST['tanggal_kunjungan'] ?? '');
  $hobi         = bersihkan($_POST['hobi'] ?? '');
  $asal         = bersihkan($_POST['asal_slta'] ?? '');
  $pekerjaan    = bersihkan($_POST['pekerjaan'] ?? '');
  $ortu         = bersihkan($_POST['nama_ortu'] ?? ''); 
  $pacar        = bersihkan($_POST['nama_pacar'] ?? '');
  $mantan       = bersihkan($_POST['nama_mantan'] ?? '');

  #Validasi sederhana
  $errors = []; #ini array untuk menampung semua error yang ada

  if ($kode === '') {
    $errors[] = 'Kode Pengunjung wajib diisi.';
  }
  if ($nama === '') {
    $errors[] = 'Nama Pengunjung wajib diisi.';
  }

  if ($alamat === '') {
    $errors[] = 'Alamat Rumah wajib diisi.';
  }

  if ($tanggal === '') {
    $errors[] = 'Tanggal Kunjungan wajib diisi.';
  }
  
  if ($hobi === '') {
    $errors[] = 'Hobi wajib diisi.';
  }
    if ($asal === '') {
        $errors[] = 'Asal SLTA wajib diisi.';
    }
    if ($pekerjaan === '') {
        $errors[] = 'Pekerjaan wajib diisi.';
    }
    if ($ortu === '') {
        $errors[] = 'Nama orang tua wajib diisi.';
    }
    if ($pacar === '') {
        $errors[] = 'Nama pacar wajib diisi.';
    }
    if ($adik === '') {
        $errors[] = 'Nama Mantan wajib diisi.';
    }

  if (mb_strlen($nama) < 3) {
    $errors[] = 'Nama minimal 3 karakter.';
  }

  /*
  kondisi di bawah ini hanya dikerjakan jika ada error, 
  simpan nilai lama dan pesan error, lalu redirect (konsep PRG)
  */
  if (!empty($errors)) {
    $_SESSION['old_biodata'] = [
      'kode_pengunjung'     => $kode,
      'nama_pengunjung'     => $nama,
      'alamat_rumah'        => $alamat,
      'tanggal_kunjungan'   => $tanggal,
      'hobi'                => $hobi,
      'asal_slta'           => $asal,
      'pekerjaan'           => $pekerjaan,
      'nama_ortu'           => $ortua,
      'nama_pacar'          => $pacar,
      'nama_mantan'         => $mantan
    ];

    $_SESSION['flash_error'] = implode('<br>', $errors);
    redirect_ke('edit_biodata.php?cid='. (int)$cid);
  }

  /*
    Prepared statement untuk anti SQL injection.
    menyiapkan query UPDATE dengan prepared statement 
    (WAJIB WHERE cid = ?)
  */
  $stmt = mysqli_prepare($conn, "UPDATE tbl_biodata_daftar_pengunjung
                                SET cnim = ?, zkode_pengunjung = ?, znama_pengunjung = ?, zalamat_rumah = ?, zhobi = ?, zasal_slta = ?, zpekerjaan = ?, znama_orang_tua = ?, znama_pacar = ?, znama_mantan = ? 
                                WHERE cid = ?");
  if (!$stmt) {
    #jika gagal prepare, kirim pesan error (tanpa detail sensitif)
    $_SESSION['flash_error'] = 'Terjadi kesalahan sistem (prepare gagal).';
    redirect_ke('edit_biodata.php?cid='. (int)$cid);
  }

  #bind parameter dan eksekusi (s = string, i = integer)
  mysqli_stmt_bind_param($stmt, "ssssssssssi", $kode, $nama, $alamat, $tanggal, $hobi, $asal, $pekerjaan, $ortua, $pacar, $mantan, $cid);

  if (mysqli_stmt_execute($stmt)) { #jika berhasil, kosongkan old value
    unset($_SESSION['old_biodata']);
    /*
      Redirect balik ke read.php dan tampilkan info sukses.
    */
    $_SESSION['flash_sukses'] = 'Terima kasih, data Anda sudah diperbaharui.';
    redirect_ke('read_biodata.php'); 
  } else { 
    $_SESSION['old_biodata'] = [
      'kode_pengunjung' => $kode,
      'nama_pengunjung'  => $nama,
      'alamat_rumah' => $alamat,
      'tanggal_kunjungan' => $tanggal,
      'hobi' => $hobi,
      'asal_slta' => $asal,
      'pekerjaan' => $pekerjaan,
      'nama_orang_tua' => $ortua,
      'nama_pacar' => $pacar,
      'nama_mantan' => $mantan
    ];
    $_SESSION['flash_error'] = 'Data gagal diperbaharui. Silakan coba lagi.';
    redirect_ke('edit_biodata.php?cid='. (int)$cid);
  }
  
  mysqli_stmt_close($stmt);
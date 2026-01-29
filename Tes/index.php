<?php
session_start();
require_once __DIR__ . '/fungsi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Judul Halaman</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <h1>Ini Header</h1>
    <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation">
      &#9776;
    </button>
    <nav>
      <ul>
        <li><a href="#home">Beranda</a></li>
        <li><a href="#about">Tentang</a></li>
        <li><a href="#contact">Kontak</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section id="home">
      <h2>Selamat Datang</h2>
      <?php
      echo "halo dunia!<br>";
      echo "nama saya hadi";
      ?>
      <p>Ini contoh paragraf HTML.</p>
    </section>

    <?php
    $flash_sukses = $_SESSION['flash_sukses'] ?? ''; #jika query sukses
    $flash_error  = $_SESSION['flash_error'] ?? ''; #jika ada error
    $old        = $_SESSION['old'] ?? []; #untuk nilai lama form

    unset($_SESSION['flash_sukses'], $_SESSION['flash_error'], $_SESSION['old']); #bersihkan 3 session ini
    ?>

    <section id="biodata">
      <h2>Biodata Sederhana Pengunjung</h2>
            <?php if (!empty($flash_sukses1)): ?>
        <div style="padding:10px; margin-bottom:10px; background:#d4edda; color:#155724; border-radius:6px;">
          <?= $flash_sukses1; ?>
        </div>
      <?php endif; ?>

      <?php if (!empty($flash_error1)): ?>
        <div style="padding:10px; margin-bottom:10px; background:#f8d7da; color:#721c24; border-radius:6px;">
          <?= $flash_error1; ?>
        </div>
      <?php endif; ?>
      <form action="proses_biodata.php" method="POST">
        
        <label for="txtKodePen"><span>Kode Pengunjung:</span>
          <input type="text" id="txtKodePen" name="txtKodePen" placeholder="Masukkan Kode"
            required autocomplete="off"
            value="<?= isset($old1['KodePen']) ? htmlspecialchars($old1['KodePen']) : '' ?>">
        </label>
        
        <label for="txtNmPengunjung"><span>Nama Pengunjung:</span>
          <input type="text" id="txtNmPengunjung" name="txtNmPengunjung" placeholder="Masukkan Nama Pengunjung"
            required autocomplete="name"
            value="<?= isset($old1['NmPengunjung']) ? htmlspecialchars($old1['NmPengunjung']) : '' ?>">
        </label>
        
        <label for="txtAlRmh"><span>Alamat Rumah:</span>
          <input type="text" id="txtAlRmh" name="txtAlRmh" placeholder="Masukkan Alamat rumah"
            required
            value="<?= isset($old1['AlRmh']) ? htmlspecialchars($old1['AlRmh']) : '' ?>">
        </label>
        
        <label for="txtTglKunjungan"><span>Tanggal Kunjungan:</span>
          <input type="text" id="txtTglKunjungan" name="txtTglKunjungan" placeholder="Masukkan Tanggal Kunjungan"
            required
            value="<?= isset($old1['TglKunjungan']) ? htmlspecialchars($old1['TglKunjungan']) : '' ?>">
        </label>
        
        <label for="txtHobi"><span>Hobi:</span>
          <input type="text" id="txtHobi" name="txtHobi" placeholder="Masukkan Hobi"
            required
            value="<?= isset($old1['Hobi']) ? htmlspecialchars($old1['Hobi']) : '' ?>">
        </label>
        
        <label for="txtAS"><span>Asal SLTA:</span>
          <input type="text" id="txtAS" name="txtAS" placeholder="Masukkan SLTA"
            required
            value="<?= isset($old1['AlS']) ? htmlspecialchars($old1['AlS']) : '' ?>">
        </label>
        
        <label for="txtKerja"><span>Pekerjaan:</span>
          <input type="text" id="txtKerja" name="txtKerja" placeholder="Masukkan Pekerjaan"
            required
            value="<?= isset($old1['Pekerjaan']) ? htmlspecialchars($old1['Pekerjaan']) : '' ?>">
        </label>
        
        <label for="txtNmOrtu"><span>Nama Orang Tua:</span>
          <input type="text" id="txtNmOrtu" name="txtNmOrtu" placeholder="Masukkan Nama Orang Tua"
            required
            value="<?= isset($old1['Nama_Orang_Tua']) ? htmlspecialchars($old1['Nama_Orang_Tua']) : '' ?>">
        </label>
        
        <label for="txtNmPcr"><span>Nama Pacar:</span>
          <input type="text" id="txtNmPcr" name="txtNmPcr" placeholder="Masukkan Nama Pacar"
            required
            value="<?= isset($old1['Nama_Pacar']) ? htmlspecialchars($old1['Nama_Pacar']) : '' ?>">
        </label>
        
        <label for="txtNmMntn"><span>Nama Mantan:</span>
          <input type="text" id="txtNmMntn" name="txtNmMntn" placeholder="Masukkan Nama Mantan"
            required
            value="<?= isset($old1['Mntn']) ? htmlspecialchars($old1['Mntn']) : '' ?>">
        </label>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>
    </section>

<?php
require_once 'koneksi.php';

$sql = "SELECT * FROM tbl_biodata ORDER BY TglKunjungan DESC LIMIT 1";
$q = mysqli_query($conn, $sql);
$biodata = mysqli_fetch_assoc($q) ?? [];

$fieldConfig = [
  "KodePen" => ["label" => "Kode Pengunjung:", "suffix" => ""],
  "NmPengunjung" => ["label" => "Nama Pengunjung:", "suffix" => " 😊"],
  "AlRmh" => ["label" => "Alamat Rumah:", "suffix" => ""],
  "TglKunjungan" => ["label" => "Tanggal Kunjungan:", "suffix" => ""],
  "Hobi" => ["label" => "Hobi:", "suffix" => " 🎵"],
  "AlS" => ["label" => "Asal SLTA:", "suffix" => ""],
  "Pekerjaan" => ["label" => "Pekerjaan:", "suffix" => ""],
  "Nama_Orang_Tua" => ["label" => "Nama Orang Tua:", "suffix" => ""],
  "Nama_Pacar" => ["label" => "Nama Pacar:", "suffix" => " ❤️"],
  "Mntn" => ["label" => "Nama Mantan:", "suffix" => ""],
];
?>

<section id="about">
  <h2>Tentang Saya</h2>

  <?php if (!empty($biodata)): ?>
    <?= tampilkanBiodata($fieldConfig, $biodata); ?>
  <?php else: ?>
    <p><em>Belum ada data biodata.</em></p>
  <?php endif; ?>
</section>


    <section id="contact">
      <h2>Kontak Kami</h2>

      <?php if (!empty($flash_sukses)): ?>
        <div style="padding:10px; margin-bottom:10px; background:#d4edda; color:#155724; border-radius:6px;">
          <?= $flash_sukses; ?>
        </div>
      <?php endif; ?>

      <?php if (!empty($flash_error)): ?>
        <div style="padding:10px; margin-bottom:10px; background:#f8d7da; color:#721c24; border-radius:6px;">
          <?= $flash_error; ?>
        </div>
      <?php endif; ?>

      <form action="proses.php" method="POST">

        <label for="txtNama"><span>Nama:</span>
          <input type="text" id="txtNama" name="txtNama" placeholder="Masukkan nama"
            required autocomplete="name"
            value="<?= isset($old['nama']) ? htmlspecialchars($old['nama']) : '' ?>">
        </label>

        <label for="txtEmail"><span>Email:</span>
          <input type="email" id="txtEmail" name="txtEmail" placeholder="Masukkan email"
            required autocomplete="email"
            value="<?= isset($old['email']) ? htmlspecialchars($old['email']) : '' ?>">
        </label>

        <label for="txtPesan"><span>Pesan Anda:</span>
          <textarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tulis pesan anda..."
            required><?= isset($old['pesan']) ? htmlspecialchars($old['pesan']) : '' ?></textarea>
          <small id="charCount">0/200 karakter</small>
        </label>

        <label for="txtCaptcha"><span>Captcha 2 + 3 = ?</span>
          <input type="number" id="txtCaptcha" name="txtCaptcha" placeholder="Jawab Pertanyaan..."
            required
            value="<?= isset($old['captcha']) ? htmlspecialchars($old['captcha']) : '' ?>">
        </label>

        <button type=" submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>

      <br>
      <hr>
      <h2>Yang menghubungi kami</h2>
      <?php include 'read_inc.php'; ?>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 Yohanes Setiawan Japriadi [0344300002]</p>
  </footer>

  <script src="script.js"></script>
</body>

</html>
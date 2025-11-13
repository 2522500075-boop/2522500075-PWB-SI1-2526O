<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$sesemail = $_SESSION["txtEmail"] ?? "";
$sespesan = $_SESSION["txtPesan"] ?? "";
$sesnim = $_SESSION["sesnim"] ?? "";
$sesnama = $_SESSION["txtnamalengkap"] ?? "";  
$sestempatlahir = $_SESSION["txttempatlahir"] ?? "";
$sestanggallahir = $_SESSION["txttanggallahir"] ?? "";
$seshobi = $_SESSION["txthobi"] ?? "";
$sespasangan = $_SESSION["txtpasangan"] ?? "";
$sespekerjaan = $_SESSION["txtpekerjaan"] ?? "";
$sesnamaortu = $_SESSION["txtnamaortu"] ?? "";
$sesnamakakak = $_SESSION["txtnamakakak"] ?? "";
$sesnamaadik = $_SESSION["txtnamaadik"] ?? "";
?>

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

    <section id="about">
      <?php
          $nim = "2522500075;";
          $Nama_Lengkap = "Khairaan Yamani;";
          $Tempat_Lahir = "sungailiat;";
          $Tanggal_Lahir = "21-05-2006;";
          $hobi = "memancing paus";
          $Pasangan = "saya sudah punya ayang&hearts;";
          $Pekerjaan = "info loker;";
          $Nama_orang_tua ="Nama Ayah saya adalah abu maya Nama Ibu saya intan thersiani;";
          $Nama_kakak = "no name&hearts;";
          $Nama_adik = "lobow san paris;";
      ?>

      <h2>Biodata Sederhana Mahasiswa </h2>
      <p><strong>NIM:</strong><?php echo $sesnim?> </p>
      <p><strong>Nama Lengkap:</strong><?php echo $sesnama?></p>
      <p><strong>Tempat Lahir:</strong><?php echo $sestempatlahir?></p>
      <p><strong>Tanggal Lahir:</strong> <?php echo $sestanggallahir?></p>
      <p><strong>Hobi:</strong><?php echo $seshobi?></p>
      <p><strong>Pasangan:</strong> <?php echo $sespasangan ?></p>
      <p><strong>Pekerjaan:</strong><?php echo $sespekerjaan?></p>
      <p><strong>Nama Orang Tua:</strong> <?php echo $sesnamaortu?></p>
      <p><strong>Nama Kakak:</strong> <?php echo $sesnamakakak?></p>
      <p><strong>Nama Adik:</strong> <?php echo $sesnamaadik?></p>
    </section>


    <section id="contact">
      <br><h2>perbarui di sini</h2></br>
      <form action="ulangan.php" method="POST">

        <label for="txtnim"><span>NIM:</span>
          <input type="Nim" id="txtnim" name="txtnim" placeholder="Perbarui di sini.." required autocomplete="nim">
        </label>

        <label for="txtnamalengkap"><span>Nama Lengkap:</span>
          <input type="Nama" id="txtnamalengkap" name="txtnamalengkap" placeholder="Perbarui di sini.." required autocomplete="nama">
        </label>

        <label for="txttempatlahir"><span>Tempat Lahir:</span>
          <input type="Tempat lahir" id="txttempatlahir" name="txttempatlahir" placeholder="Perbarui di sini.." required autocomplete="email">
        </label>

        <label for="txttanggallahir"><span>Tanggal Lahir:</span>
          <input type="Tanggal lahir" id="txttanggallahir" name="txttanggallahir" placeholder="Perbarui di sini.." required autocomplete="email">
        </label>

        <label for="txthobi"><span>Hobi:</span>
          <input type="hobi" id="txthobi" name="txthobi" placeholder="Perbarui di sini.." required autocomplete="email">
        </label>

        <label for="txtpasangan"><span>Pasangan:</span>
          <input type="pasangan" id="txtpasangan" name="txtpasangan" placeholder="Perbarui di sini.." required autocomplete="email">
        </label>

        
        <label for="txtpekerjaan"><span>Pekerjaan:</span>
          <input type="pekerjaan" id="txtpekerjaan" name="txtpekerjaan" placeholder="Perbarui di sini.." required autocomplete="email">
        </label>

        <label for="txtnamaortu"><span>Nama Orang Tua:</span>
          <input type="nama orang tua" id="txtnamaortu" name="txtnamaortu" placeholder="Perbarui di sini.." required autocomplete="email">
        </label>

        <label for="txtnamakakak"><span>Nama Kakak:</span>
          <input type="nama kakak" id="txtnamakakak" name="txtnamakakak" placeholder="Perbarui di sini.." required autocomplete="email">
        </label>

        <label for="txtnamaadik"><span>Nama Adik:</span>
          <input type="nama adik" id="txtnamadik" name="txtnamaadik" placeholder="Perbarui di sini.." required autocomplete="email">
        </label>

  

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>





  <section id="contact">
      <h2>Kontak Kami</h2>
      <form action="  " method="POST">

        <label for="txtnama"><span>Nama:</span>
          <input type="text" id="txtnama" name="txtnama" placeholder="Masukkan nama" required autocomplete="name">
        </label>

        <label for="txtEmail"><span>Email:</span>
          <input type="email" id="txtEmail" name="txtEmail" placeholder="Masukkan email" required autocomplete="email">
        </label>

        <label for="txtPesan"><span>Pesan Anda:</span>
          <textarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tulis pesan anda..." required></textarea>
          <small id="charCount">0/200 karakter</small>
        </label>


        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>
</section>
      

    </section>
  </main>

  <footer>
    <p><>&copy; 2025 KHAIRAAN YAMANI[2522500075]</></p>
  </footer>

  <script src="script.js"></script>
</body>
  
</html>
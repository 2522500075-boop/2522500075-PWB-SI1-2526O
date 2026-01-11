<?php
require 'koneksi.php';
require_ONCE 'fungsi.php';

$fieldContact = [
    "nim" => ["label" => "Nama:", "suffix" => ""],
    "nama" => ["label" => "Email:", "suffix" => ""],
    "tempat" => ["label" => "Pesan Anda:", "suffix" => ""]
    "tanggal" => ["label" => "Pesan Anda:", "suffix" => ""]
    "hobi" => ["label" => "Pesan Anda:", "suffix" => ""]
    "pasangan" => ["label" => "Pesan Anda:", "suffix" => ""]
    "pekerjaan" => ["label" => "Pesan Anda:", "suffix" => ""]
    "ortu" => ["label" => "Pesan Anda:", "suffix" => ""]
    "kakak" => ["label" => "Pesan Anda:", "suffix" => ""]
    "adik" => ["label" => "Pesan Anda:", "suffix" => ""]
];

$sql = "SELECT * FROM tbl_tamu ORDER BY cid DESC";
$q = mysqli_query($conn, $sql);
if (!$q) {
    echo "<p>Gagal membaca data tamu: " . htmlspecialchars(mysqli_error($conn)) . "</p>";
} elseif (mysqli_num_rows($q) === 0) {
    echo "<p>Belum ada data tamu yang tersimpan.</p>";
} else {
    while ($row = mysqli_fetch_assoc($q)) {
        $arrContact = [
            "nim" => $row["cnim"],
            "nama" => $row["cnama_lengkap"],
            "tempat" => $row["ctempat_lahir"],
            "tanggal" => $row["ctanggal_lahir"],
            "hobi" => $row["chobi"],
            "pasangan" => $row["cpasangan"],
            "pekerjaan" => $row["cpekerjaan"],
            "ortu" => $row["cnama_orang_tua"],
            "kakak" => $row["cnama_kaka"],
            "adik" => $row["cnama_adik"],
        ];
        echo tampilkanBiodata($fieldContact, $arrContact);
    }
}
?>
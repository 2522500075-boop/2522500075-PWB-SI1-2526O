<?php
require 'koneksi.php';
require_ONCE 'fungsi.php';

$fieldContact = [
    "nim" => ["label" => "NIM:", "suffix" => ""],
    "nama" => ["label" => "nama:", "suffix" => ""],
    "tempat" => ["label" => "tempat lahir:", "suffix" => ""]
    "tanggal" => ["label" => "tanggal lahir:", "suffix" => ""]
    "hobi" => ["label" => "hobi:", "suffix" => ""]
    "pasangan" => ["label" => "pasangan:", "suffix" => ""]
    "pekerjaan" => ["label" => "Pekerjaan:", "suffix" => ""]
    "ortu" => ["label" => "nama orang tua:", "suffix" => ""]
    "kakak" => ["label" => "nama kaka:", "suffix" => ""]
    "adik" => ["label" => "nama adik:", "suffix" => ""]
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
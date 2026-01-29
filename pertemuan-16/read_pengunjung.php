<table border="1" cellpadding="8" cellspacing="0">
  <tr>
    <th>No</th>
    <th>Aksi</th>
    <th>ID</th>
    <th>Kode Pengunjung</th>
    <th>Nama Pengunjung</th>
    <th>Alamat Rumah</th>
    <th>Tanggal Kunjungan</th>
    <th>Hobi</th>
    <th>Asal SLTA</th>
    <th>Pekerjaan</th>
    <th>Nama Orang Tua</th>
    <th>Nama Pacar</th>
    <th>Nama Mantan</th>
  </tr>

  <?php $i = 1; ?>
  <?php while ($row = mysqli_fetch_assoc($q)): ?>
    <tr>
      <td><?= $i++ ?></td>
      <td>
        <a href="edit.php?cid=<?= (int)$row['cid']; ?>">Edit</a>
        <a onclick="return confirm('Hapus <?= htmlspecialchars($row['znama_pengunjung']); ?>?')"
           href="proses_delete.php?cid=<?= (int)$row['cid']; ?>">Delete</a>
      </td>
      <td><?= (int)$row['cid']; ?></td>
      <td><?= htmlspecialchars($row['zkode_pengunjung']); ?></td>
      <td><?= htmlspecialchars($row['znama_pengunjung']); ?></td>
      <td><?= htmlspecialchars($row['zalamat_rumah']); ?></td>
      <td><?= htmlspecialchars($row['ztanggal_kunjungan']); ?></td>
      <td><?= htmlspecialchars($row['zhobi']); ?></td>
      <td><?= htmlspecialchars($row['zasal_SLTA']); ?></td>
      <td><?= htmlspecialchars($row['zpekerjaan']); ?></td>
      <td><?= htmlspecialchars($row['znama_orang_tua']); ?></td>
      <td><?= htmlspecialchars($row['znama_pacar']); ?></td>
      <td><?= htmlspecialchars($row['znama_mantan']); ?></td>
    </tr>
  <?php endwhile; ?>
</table>

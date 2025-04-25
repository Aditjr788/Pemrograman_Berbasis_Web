<?php
include '../config.php';
$data = mysqli_query($koneksi, "SELECT * FROM matakuliah ORDER BY nama");
?>
<!DOCTYPE html>
<html><head><title>Data Matakuliah</title></head><body>
  <h1>Data Matakuliah</h1>
  <a href="create.php">+ Tambah Matakuliah</a>
  <table border="1" cellpadding="5" cellspacing="0">
    <tr>
      <th>No</th><th>Kode MK</th><th>Nama</th><th>SKS</th><th>Aksi</th>
    </tr>
    <?php $no=1; while($d = mysqli_fetch_array($data)): ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= htmlspecialchars($d['kodemk']) ?></td>
      <td><?= htmlspecialchars($d['nama']) ?></td>
      <td><?= htmlspecialchars($d['jumlah_sks']) ?></td>
      <td>
        <a href="edit.php?kodemk=<?= $d['kodemk'] ?>">Edit</a> |
        <a href="delete.php?kodemk=<?= $d['kodemk'] ?>" onclick="return confirm('Hapus?')">Hapus</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>
</body></html>
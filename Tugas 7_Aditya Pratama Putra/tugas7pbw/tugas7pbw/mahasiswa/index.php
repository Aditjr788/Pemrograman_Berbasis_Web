<?php
include '../config.php';
$data = mysqli_query($koneksi, "SELECT * FROM mahasiswa ORDER BY nama");
?>
<!DOCTYPE html>
<html><head><title>Data Mahasiswa</title></head><body>
  <h1>Data Mahasiswa</h1>
  <a href="create.php">+ Tambah Mahasiswa</a>
  <table border="1" cellpadding="5" cellspacing="0">
    <tr>
      <th>No</th><th>NPM</th><th>Nama</th><th>Jurusan</th><th>Alamat</th><th>Aksi</th>
    </tr>
    <?php $no=1; while($d = mysqli_fetch_array($data)): ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= htmlspecialchars($d['npm']) ?></td>
      <td><?= htmlspecialchars($d['nama']) ?></td>
      <td><?= htmlspecialchars($d['jurusan']) ?></td>
      <td><?= htmlspecialchars($d['alamat']) ?></td>
      <td>
        <a href="edit.php?npm=<?= $d['npm'] ?>">Edit</a> |
        <a href="delete.php?npm=<?= $d['npm'] ?>" onclick="return confirm('Hapus?')">Hapus</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>
</body></html>
<?php
include '../config.php';
$data = mysqli_query($koneksi, "
    SELECT krs.id, m.nama AS nama_mhs, mk.nama AS nama_mk, mk.jumlah_sks
    FROM krs
    JOIN mahasiswa m ON m.npm = krs.mahasiswa_npm
    JOIN matakuliah mk ON mk.kodemk = krs.matakuliah_kodemk
    ORDER BY krs.id
");
?>
<!DOCTYPE html><html><head><title>Data KRS</title></head><body>
  <h1>Data KRS</h1>
  <a href="create.php">+ Tambah KRS</a>
  <table border="1" cellpadding="5" cellspacing="0">
    <tr>
      <th>No</th><th>Nama Lengkap</th><th>Mata Kuliah</th><th>Keterangan</th><th>Aksi</th>
    </tr>
    <?php $no=1; while($d = mysqli_fetch_array($data)): ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= htmlspecialchars($d['nama_mhs']) ?></td>
      <td><?= htmlspecialchars($d['nama_mk']) ?></td>
      <td><b><?= htmlspecialchars($d['nama_mhs']) ?></b> Mengambil Mata Kuliah <b><?= htmlspecialchars($d['nama_mk']) ?></b> (<?= $d['jumlah_sks'] ?> SKS)</td>
      <td>
        <a href="edit.php?id=<?= $d['id'] ?>">Edit</a> |
        <a href="delete.php?id=<?= $d['id'] ?>" onclick="return confirm('Hapus?')">Hapus</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>
</body></html>
<?php
include '../config.php';
$npm = $_GET['npm'];
$d = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE npm='$npm'"));
if(isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];
    mysqli_query($koneksi, "UPDATE mahasiswa SET nama='$nama', jurusan='$jurusan', alamat='$alamat' WHERE npm='$npm'");
    header("Location: index.php");
}
?>
<!DOCTYPE html><html><head><title>Edit Mahasiswa</title></head><body>
  <h1>Edit Mahasiswa</h1>
  <form method="POST">
    Nama: <input type="text" name="nama" value="<?= htmlspecialchars($d['nama']) ?>" required><br>
    Jurusan:
    <select name="jurusan">
      <option value="Teknik Informatika" <?= $d['jurusan']=='Teknik Informatika'?'selected':''; ?>>Teknik Informatika</option>
      <option value="Sistem Operasi" <?= $d['jurusan']=='Sistem Operasi'?'selected':''; ?>>Sistem Operasi</option>
    </select><br>
    Alamat: <textarea name="alamat"><?= htmlspecialchars($d['alamat']) ?></textarea><br>
    <button type="submit" name="submit">Update</button>
  </form>
  <p><a href="index.php">« Kembali</a></p>
</body></html>
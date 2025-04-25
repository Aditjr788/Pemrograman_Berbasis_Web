<?php
include '../config.php';
if(isset($_POST['submit'])) {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];
    mysqli_query($koneksi, "INSERT INTO mahasiswa VALUES('$npm','$nama','$jurusan','$alamat')");
    header("Location: index.php");
}
?>
<!DOCTYPE html><html><head><title>Tambah Mahasiswa</title></head><body>
  <h1>Tambah Mahasiswa</h1>
  <form method="POST">
    NPM: <input type="text" name="npm" required><br>
    Nama: <input type="text" name="nama" required><br>
    Jurusan:
    <select name="jurusan">
      <option value="Teknik Informatika">Teknik Informatika</option>
      <option value="Sistem Operasi">Sistem Operasi</option>
    </select><br>
    Alamat: <textarea name="alamat"></textarea><br>
    <button type="submit" name="submit">Simpan</button>
  </form>
  <p><a href="index.php">« Kembali</a></p>
</body></html>
<?php
include '../config.php';
if(isset($_POST['submit'])) {
    $kodemk = $_POST['kodemk'];
    $nama = $_POST['nama'];
    $sks = $_POST['jumlah_sks'];
    mysqli_query($koneksi, "INSERT INTO matakuliah VALUES('$kodemk','$nama','$sks')");
    header("Location: index.php");
}
?>
<!DOCTYPE html><html><head><title>Tambah Matakuliah</title></head><body>
  <h1>Tambah Matakuliah</h1>
  <form method="POST">
    Kode MK: <input type="text" name="kodemk" required><br>
    Nama: <input type="text" name="nama" required><br>
    SKS: <input type="number" name="jumlah_sks" required><br>
    <button type="submit" name="submit">Simpan</button>
  </form>
  <p><a href="index.php">« Kembali</a></p>
</body></html>
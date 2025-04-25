<?php
include '../config.php';
$kodemk = $_GET['kodemk'];
$d = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM matakuliah WHERE kodemk='$kodemk'"));
if(isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $sks = $_POST['jumlah_sks'];
    mysqli_query($koneksi, "UPDATE matakuliah SET nama='$nama', jumlah_sks='$sks' WHERE kodemk='$kodemk'");
    header("Location: index.php");
}
?>
<!DOCTYPE html><html><head><title>Edit Matakuliah</title></head><body>
  <h1>Edit Matakuliah</h1>
  <form method="POST">
    Nama: <input type="text" name="nama" value="<?= htmlspecialchars($d['nama']) ?>" required><br>
    SKS: <input type="number" name="jumlah_sks" value="<?= htmlspecialchars($d['jumlah_sks']) ?>" required><br>
    <button type="submit" name="submit">Update</button>
  </form>
  <p><a href="index.php">« Kembali</a></p>
</body></html>
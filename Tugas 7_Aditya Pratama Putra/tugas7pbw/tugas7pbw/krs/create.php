<?php
include '../config.php';
$mhss = mysqli_query($koneksi, "SELECT npm,nama FROM mahasiswa ORDER BY nama");
$mks  = mysqli_query($koneksi, "SELECT kodemk,nama FROM matakuliah ORDER BY nama");
if(isset($_POST['submit'])) {
    $npm = $_POST['npm'];
    $kodemk = $_POST['kodemk'];
    mysqli_query($koneksi, "INSERT INTO krs(mahasiswa_npm,matakuliah_kodemk) VALUES('$npm','$kodemk')");
    header("Location: index.php");
}
?>
<!DOCTYPE html><html><head><title>Tambah KRS</title></head><body>
  <h1>Tambah KRS</h1>
  <form method="POST">
    Mahasiswa:
    <select name="npm" required>
      <?php while($m = mysqli_fetch_array($mhss)): ?>
      <option value="<?= $m['npm'] ?>"><?= htmlspecialchars($m['nama']) ?></option>
      <?php endwhile; ?>
    </select><br>
    Matakuliah:
    <select name="kodemk" required>
      <?php while($m = mysqli_fetch_array($mks)): ?>
      <option value="<?= $m['kodemk'] ?>"><?= htmlspecialchars($m['nama']) ?></option>
      <?php endwhile; ?>
    </select><br>
    <button type="submit" name="submit">Simpan</button>
  </form>
  <p><a href="index.php">« Kembali</a></p>
</body></html>
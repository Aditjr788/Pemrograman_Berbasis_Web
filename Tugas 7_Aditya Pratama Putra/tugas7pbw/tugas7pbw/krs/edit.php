<?php
include '../config.php';
$id = $_GET['id'];
$row = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM krs WHERE id='$id'"));
$mhss = mysqli_query($koneksi, "SELECT npm,nama FROM mahasiswa ORDER BY nama");
$mks  = mysqli_query($koneksi, "SELECT kodemk,nama FROM matakuliah ORDER BY nama");
if(isset($_POST['submit'])) {
    $npm = $_POST['npm'];
    $kodemk = $_POST['kodemk'];
    mysqli_query($koneksi, "UPDATE krs SET mahasiswa_npm='$npm', matakuliah_kodemk='$kodemk' WHERE id='$id'");
    header("Location: index.php");
}
?>
<!DOCTYPE html><html><head><title>Edit KRS</title></head><body>
  <h1>Edit KRS</h1>
  <form method="POST">
    Mahasiswa:
    <select name="npm" required>
      <?php while($m = mysqli_fetch_array($mhss)): ?>
      <option value="<?= $m['npm'] ?>" <?= $m['npm']==$row['mahasiswa_npm']?'selected':''; ?>><?= htmlspecialchars($m['nama']) ?></option>
      <?php endwhile; ?>
    </select><br>
    Matakuliah:
    <select name="kodemk" required>
      <?php while($m = mysqli_fetch_array($mks)): ?>
      <option value="<?= $m['kodemk'] ?>" <?= $m['kodemk']==$row['matakuliah_kodemk']?'selected':''; ?>><?= htmlspecialchars($m['nama']) ?></option>
      <?php endwhile; ?>
    </select><br>
    <button type="submit" name="submit">Update</button>
  </form>
  <p><a href="index.php">« Kembali</a></p>
</body></html>
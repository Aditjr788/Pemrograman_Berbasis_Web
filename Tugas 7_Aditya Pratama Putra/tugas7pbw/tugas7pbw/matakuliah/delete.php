<?php
include '../config.php';
$kodemk = $_GET['kodemk'];
mysqli_query($koneksi, "DELETE FROM matakuliah WHERE kodemk='$kodemk'");
header("Location: index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Rute Penerbangan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Pendaftaran Rute Penerbangan</h1>
        
        <?php
        $bandaraAsal = [
            "Soekarno Hatta" => 65000,
            "Husein Sastranegara" => 50000,
            "Abdul Rachman Saleh" => 40000,
            "Juanda" => 30000
        ];
        
        $bandaraTujuan = [
            "Ngurah Rai" => 85000,
            "Hasanuddin" => 70000,
            "Inanwatan" => 90000,
            "Sultan Iskandar Muda" => 60000
        ];

        ksort($bandaraAsal);
        ksort($bandaraTujuan);

        $nomor = "";
        $tanggal = "";
        $namaMaskapai = "";
        $asalPenerbangan = "";
        $tujuanPenerbangan = "";
        $hargaTiket = 0;
        $pajakAsal = 0;
        $pajakTujuan = 0;
        $totalPajak = 0;
        $totalHarga = 0;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $namaMaskapai = $_POST["nama_maskapai"];
            $asalPenerbangan = $_POST["bandara_asal"];
            $tujuanPenerbangan = $_POST["bandara_tujuan"];
            $hargaTiket = $_POST["harga_tiket"];

            $pajakAsal = $bandaraAsal[$asalPenerbangan];
            $pajakTujuan = $bandaraTujuan[$tujuanPenerbangan];
            $totalPajak = $pajakAsal + $pajakTujuan;

            $totalHarga = $hargaTiket + $totalPajak;

            $nomor = "PNB-" . date("YmdHis");
            $tanggal = date("Y-m-d H:i:s");
        }
        ?>
        
        <div class="form-container">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="nama_maskapai">Nama Maskapai:</label>
                    <input type="text" id="nama_maskapai" name="nama_maskapai" required>
                </div>
                
                <div class="form-group">
                    <label for="bandara_asal">Bandara Asal:</label>
                    <select id="bandara_asal" name="bandara_asal" required>
                        <option value="" disabled selected>-- Pilih Bandara Asal --</option>
                        <?php
                        foreach ($bandaraAsal as $bandara => $pajak) {
                            echo "<option value='$bandara'>$bandara</option>";
                        }
                        ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="bandara_tujuan">Bandara Tujuan:</label>
                    <select id="bandara_tujuan" name="bandara_tujuan" required>
                        <option value="" disabled selected>-- Pilih Bandara Tujuan --</option>
                        <?php
                        foreach ($bandaraTujuan as $bandara => $pajak) {
                            echo "<option value='$bandara'>$bandara</option>";
                        }
                        ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="harga_tiket">Harga Tiket:</label>
                    <input type="number" id="harga_tiket" name="harga_tiket" required>
                </div>
                
                <div class="form-group">
                    <button type="submit">Daftar Penerbangan</button>
                </div>
            </form>
        </div>
        
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <div class="result-container">
            <h2>Hasil Pendaftaran Penerbangan</h2>
            <table>
                <tr>
                    <td>Nomor</td>
                    <td>: <?php echo $nomor; ?></td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>: <?php echo $tanggal; ?></td>
                </tr>
                <tr>
                    <td>Nama Maskapai</td>
                    <td>: <?php echo $namaMaskapai; ?></td>
                </tr>
                <tr>
                    <td>Asal Penerbangan</td>
                    <td>: <?php echo $asalPenerbangan; ?></td>
                </tr>
                <tr>
                    <td>Tujuan Penerbangan</td>
                    <td>: <?php echo $tujuanPenerbangan; ?></td>
                </tr>
                <tr>
                    <td>Harga Tiket</td>
                    <td>: Rp <?php echo number_format($hargaTiket, 0, ",", "."); ?></td>
                </tr>
                <tr>
                    <td>Pajak</td>
                    <td>: Rp <?php echo number_format($totalPajak, 0, ",", "."); ?></td>
                </tr>
                <tr>
                    <td>Total Harga Tiket</td>
                    <td>: Rp <?php echo number_format($totalHarga, 0, ",", "."); ?></td>
                </tr>
            </table>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>

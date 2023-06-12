<?php
class Mahasiswa {
    private $nama;
    private $mtk;
    private $indo;
    private $pai;
    private $ipa;
    private $inggris;
    private $pkn;

    public function setNama($nama) {
        $this->nama = $nama;
    }

    public function setNilai($mtk, $indo, $pai, $ipa, $inggris, $pkn) {
        $this->mtk = $mtk;
        $this->indo = $indo;
        $this->pai = $pai;
        $this->ipa = $ipa;
        $this->inggris = $inggris;
        $this->pkn = $pkn;
    }

    public function getNama() {
        return $this->nama;
    }

    public function getTotalNilai() {
        return $this->mtk + $this->indo + $this->pai + $this->ipa + $this->inggris + $this->pkn;
    }

    public function getNilaiTertinggi() {
        return max($this->mtk, $this->indo, $this->pai, $this->ipa, $this->inggris, $this->pkn);
    }

    public function getNilaiTerendah() {
        return min($this->mtk, $this->indo, $this->pai, $this->ipa, $this->inggris, $this->pkn);
    }

    public function getRataRata() {
        return ($this->mtk + $this->indo + $this->pai + $this->ipa + $this->inggris + $this->pkn) / 6;
    }

    public function getGrade() {
        $rata = $this->getRataRata();
        if ($rata >= 90) {
            return "nilai A";
        } elseif ($rata > 80) {
            return "nilai B";
        } elseif ($rata > 70) {
            return "nilai C";
        } elseif ($rata > 0) {
            return "te lulus";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Nilai</title>
    <style>        
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #4CAF50; /* Ubah warna latar belakang navbar */
            color: #fff;
            padding: 10px;
        }

        .navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        .navbar li {
            float: left;
        }

        .navbar li a {
            display: block;
            color: #fff;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            transition: background-color 0.3s; /* Efek transisi saat hover */
        }

        .navbar li a:hover {
            background-color: #333; /* Ubah warna latar belakang saat hover */
        }

        .container {
            margin: 20px auto;
            max-width: 400px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            text-align: center;
            display: block;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        .result-container {
            margin-top: 20px;
            padding: 20px;
            border-radius: 5px;
            background-color: #f5f5f5;
            text-align: left;
        }

        .result-container h3 {
            margin-top: 0;
        }

        .result-container p {
            margin-bottom: 10px;
        }

        .result-container a {
            display: inline-block;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <?php include "solusi.php";?>
    <div class="navbar">
        <ul>
            <!-- <li><a href="#">Ora</a></li> -->
            <li><a href="#form-input">Input Nilai</a></li>
            <li><a href="tamble.php">Daftar Nilai</a></li>
        </ul>
    </div>

    <div class="container">
        <h2>Input Nilai</h2>
        <form id="form-input" action="#" method="get">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" required placeholder="Nama">
            </div>

            <div class="form-group">
                <label for="mtk">Matematika</label>
                <input type="number" id="mtk" name="mtk" required placeholder="Matematika">
            </div>

            <div class="form-group">
                <label for="indo">Bhs Indonesia</label>
                <input type="number" id="indo" name="indo" required placeholder="Bhs Indonesia">
            </div>

            <div class="form-group">
                <label for="pai">PAI</label>
                <input type="number" id="pai" name="pai" required placeholder="PAI">
            </div>

            <div class="form-group">
                <label for="ipa">IPA</label>
                <input type="number" id="ipa" name="ipa" required placeholder="IPA">
            </div>

            <div class="form-group">
                <label for="inggris">Inggris</label>
                <input type="number" id="inggris" name="inggris" required placeholder="Inggris">
            </div>

            <div class="form-group">
                <label for="pkn">PKN</label>
                <input type="number" id="pkn" name="pkn" required placeholder="PKN">
            </div>

            <div class="form-group">
                <input type="submit" value="Submit">
            </div>
        </form>

        <?php
        
        include "database_nilai.php";
        $database = new Database();
        $connection = $database->getConnection();

        if (isset($_GET['nama']) && isset($_GET['mtk']) && isset($_GET['indo']) && isset($_GET['pai']) && isset($_GET['ipa']) && isset($_GET['inggris']) && isset($_GET['pkn'])) {
            $nama = $_GET['nama'];
            $mtk = $_GET['mtk'];
            $indo = $_GET['indo'];
            $pai = $_GET['pai'];
            $ipa = $_GET['ipa'];
            $inggris = $_GET['inggris'];
            $pkn = $_GET['pkn'];

            $mahasiswa = new Mahasiswa();
            $mahasiswa->setNama($nama);
            $mahasiswa->setNilai($mtk, $indo, $pai, $ipa, $inggris, $pkn);

            $sql = "INSERT INTO `nilaisiswa`(`mtk`, `indo`, `pai`, `ipa`, `inggris`, `pkn`, `nama`) VALUES ('$mtk', '$indo', '$pai', '$ipa', '$inggris', '$pkn', '$nama')";
            $hasil = $connection->query($sql);

            if ($hasil) {
                echo "Berhasil";
                echo "<br>";
            } else {
                echo "Gagal";
                echo "<br>";
            }
            ?>

            <div class="result-container">
                <h3>Hasil</h3>
                <p>Nama Anda: <?php echo $mahasiswa->getNama(); ?></p>
                <p>NILAI TOTAL: <?php echo $mahasiswa->getTotalNilai(); ?></p>
                <p>NILAI TERTINGGI: <?php echo $mahasiswa->getNilaiTertinggi(); ?></p>
                <p>NILAI TERENDAH: <?php echo $mahasiswa->getNilaiTerendah(); ?></p>
                <p>NILAI RATA-RATA: <?php echo $mahasiswa->getRataRata(); ?></p>
                <p>GRADE NILAI: <?php echo $mahasiswa->getGrade(); ?></p>
                <a href="tamble.php">Lihat Data</a>
            </div>
        <?php } ?>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>

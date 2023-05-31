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
    <title>nilai</title>
    <link rel="stylesheet" href="nilai.css">
    
</head>
<body>
    <form action="#" method="get">
        <center>
            <div class="nama">
                <h2>NAMA</h2>
                <input type="text" name="nama" required placeholder="nama">
            </div>

            <div class="nila">
                <h2>NILAI</h2>

                <input type="number" name="mtk" required placeholder="Matematika"><br></br>
                <input type="number" name="indo" required placeholder="Bhs Indonesia"><br></br>
                <input type="number" name="pai" required placeholder="PAI"><br></br>
                <input type="number" name="ipa" required placeholder="IPA"><br></br>
                <input type="number" name="inggris" required placeholder="Inggris"><br></br>
                <input type="number" name="pkn" required placeholder="PKN"> <br></br>

                <input type="submit" value="Submit"><br>
            </div>
        </center>
    </form>

    <?php
    include "konek.php";
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

        echo "Nama Anda: " . $mahasiswa->getNama();
        echo "<br>";

        echo "NILAI TOTAL: " . $mahasiswa->getTotalNilai();
        echo "<br>";

        echo "NILAI TERTINGGI: " . $mahasiswa->getNilaiTertinggi();
        echo "<br>";

        echo "NILAI TERENDAH: " . $mahasiswa->getNilaiTerendah();
        echo "<br>";

        echo "NILAI RATA-RATA: " . $mahasiswa->getRataRata();
        echo "<br>";

        echo "GRADE NILAI ADALAH: " . $mahasiswa->getGrade();
        echo "<br>";
    }
    ?>
    <a href="tamble.php">lihat data</a> 
</body>
</html>



<?php
include "konek.php";
    $data = $_GET['id'];
    $database = new Database();
    $connection = $database->getConnection();
    $sql = "DELETE FROM nilaisiswa WHERE id = '$data'";
    $query = $connection->query($sql);
     if ($query) {
        echo "Data berhasil dihapus!";
        echo "<a href='tamble.php'> Tampilkan Data</a>";
    } else {
        echo "Penghapusan gagal sebab : <br>".$connection->error;
    }

  ?>  
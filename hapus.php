<?php
include "database_nilai.php";
    $data = $_GET['id'];
    $database = new Database();
    $connection = $database->getConnection();
    $sql = "DELETE FROM nilaisiswa WHERE id = '$data'";
    $query = $connection->query($sql);
if ($query) {
        echo "<script> alert('Data berhasil dihapus');
        document.location.href = 'tamble.php';
        </script>";
    } else {
        echo "Penghapusan gagal sebab : <br>".$connection->error;
    }

  ?>  
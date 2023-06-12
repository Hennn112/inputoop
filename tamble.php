<?php
include "connectnilai.php";
$database = new Database();
$connection = $database->getConnection();

$sql = "SELECT * FROM nilaisiswa";
$query = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Nilai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .table-container {
            margin-top: 20px;
        }
        .btn-container {
            margin-top: 20px;
            text-align: center;
        }
        .title {
            text-align: center;
            margin-bottom: 30px;
        }
        .btn {
            margin-right: 5px;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #555;
            color: #fff;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tbody tr:hover {
            background-color: #f5f5f5;
        }
        .btn-secondary {
            background-color: #ccc;
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            text-decoration: none;
        }
        .btn-secondary:hover {
            background-color: #b3b3b3;
        }
        .btn-danger {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 4px 8px;
            border-radius: 4px;
            text-decoration: none;
        }
        .btn-danger:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="title">DAFTAR NILAI</h2>
        
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>MTK</th>
                        <th>INDO</th>
                        <th>PAI</th>
                        <th>IPA</th>
                        <th>INGG</th>
                        <th>PKN</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($query->num_rows > 0) : ?>
                        <?php while($data = $query->fetch_assoc()): ?>
                            <tr>
                                <td><?= $data["nama"];?></td>
                                <td><?= $data["mtk"];?></td>
                                <td><?= $data["indo"];?></td>
                                <td><?= $data["pai"];?></td>
                                <td><?= $data["ipa"];?></td>
                                <td><?= $data["inggris"];?></td>
                                <td><?= $data["pkn"];?></td>
                                <td><a href="hapus.php?id=<?= $data['id'] ?>" class="btn-danger">Hapus</a></td>
                            </tr>
                        <?php endwhile;?>
                    <?php endif;?>
                </tbody>
            </table>
        </div>
        
        <div class="btn-container">
            <a href="index.php" class="btn-secondary">Kembali</a>

        </div>
    </div>
</body>
</html>

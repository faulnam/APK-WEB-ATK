<?php
include_once("../config.php");

$id_penjualan = $_GET['id'];
$hasil_detail_penjualan = mysqli_query(
    $koneksi,
    "SELECT dp.id_detail, dp.id_penjualan, dp.id_barang, dp.jumla_terjual, p.nama_pelanggan, b.nama_barang
    FROM detail_penjualan dp
    JOIN penjualan p ON dp.id_penjualan = p.id_penjualan
    JOIN barang b ON dp.id_barang = b.id_barang
    WHERE dp.id_penjualan = $id_penjualan"
);

if (!$hasil_detail_penjualan) {
    die("Query gagal: " . mysqli_error($koneksi));
}

$data_detail_penjualan = mysqli_fetch_assoc($hasil_detail_penjualan);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Penjualan</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ecf0f1;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: #3498db;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detail Penjualan</h1>
        <ul>
            <li><strong>Id Detail:</strong> <?php echo $data_detail_penjualan['id_detail']; ?></li>
            <li><strong>Id Penjualan:</strong> <?php echo $data_detail_penjualan['id_penjualan']; ?></li>
            <li><strong>Id Barang:</strong> <?php echo $data_detail_penjualan['id_barang']; ?></li>
            <li><strong>Nama Pelanggan:</strong> <?php echo $data_detail_penjualan['nama_pelanggan']; ?></li>
            <li><strong>Nama Barang:</strong> <?php echo $data_detail_penjualan['nama_barang']; ?></li>
            <li><strong>Jumlah Terjual:</strong> <?php echo $data_detail_penjualan['jumla_terjual']; ?></li>
        </ul>

        <!-- Menambahkan tombol kembali -->
        <a href="javascript:history.back()" class="btn">Kembali</a>
    </div>
</body>
</html>

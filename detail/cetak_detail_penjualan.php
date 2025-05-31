<?php
include_once("../config.php");

$hasil = mysqli_query(
    $koneksi,
    "SELECT * 
    FROM detail_penjualan
    ORDER BY id_detail"
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan - BacatulisApp</title>
    <style>
         body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #2c3e50;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar h3 {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 0px 16px;
            text-decoration: none;
            height: 30px;
        }

        .navbar a:hover {
            background-color: #34495e;
        }

        .container-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin: 20px;
        }

        .content-container {
            flex: 1;
            margin-left: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #ecf0f1;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: left;
            color: #333;
            margin-top: 0;
            margin-bottom: 20px;
        }

        .add-data-container {
            margin-top: 10px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin-bottom: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
            text-align: center;
            text-decoration: none;
            color: #fff;
        }

        .btn-primary {
            background-color: #3498db;
        }

        .btn-primary:hover {
            background-color: #2980b9;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #d5d8dc;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .img-container{
            display: flex;
        }
        .navbar {
            background-color: #2c3e50;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar h3 {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 0px 16px;
            text-decoration: none;
            height: 30px;
        }

        .navbar a:hover {
            background-color: #34495e;
        }
    </style>
</head>
<body>
<div class="navbar">
        <h3 href="#home">Bacatulis<i>App</i></h3>
    </div>
    <div class="content-container">
    <h1>Laporan Penjualan</h1>

    <table border="1px">
        <tr>
            <th>Id Detail</th>
            <th>Id Penjualan</th>
            <th>Id Barang</th>
            <th>Jumlah Terjual</th>
        </tr>
        <?php while ($data = mysqli_fetch_assoc($hasil)) { ?>
            <tr>
                <td><?php echo $data["id_detail"]; ?></td>
                <td><?php echo $data["id_penjualan"]; ?></td>
                <td><?php echo $data["id_barang"]; ?></td>
                <td><?php echo $data["jumla_terjual"]; ?></td>
            </tr>
        <?php } ?>
    </table>
<br><br>
    <button class="btn btn-primary" onclick="cetakLaporan()">Cetak Laporan</button>
</div>
    <script>
        function cetakLaporan() {
            window.print(); 
        }
    </script>
</body>
</html>

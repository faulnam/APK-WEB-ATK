<?php
include_once("../config.php");

$queryPenjualan = "SELECT id_penjualan FROM penjualan";
$resultPenjualan = mysqli_query($koneksi, $queryPenjualan);

$queryBarang = "SELECT id_barang, nama_barang FROM barang";
$resultBarang = mysqli_query($koneksi, $queryBarang);

?>

<!DOCTYPE html>
<html lang="en">
<head>
 
    <title>Tambah Detail Penjualan</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .navbar {
            background-color: #2c3e50;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            padding: 10px 20px;
            color: white;
        }

        .navbar h3 {
            margin: 0;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #34495e;
        }

        form {
            background-color: #ecf0f1;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            margin-top: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        select,
        button {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        button[type="submit"] {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button[type="submit"]:hover {
            background-color: #2980b9;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
<div class="navbar">
        <h3 href="#home">Bacatulis<i>App</i></h3>
    </div>
    <form method="post" action="proses_detail_penjualan.php">
    <h1>Tambah Detail Penjualan</h1>
        <label for="id_penjualan">ID Penjualan:</label>
        <select name="id_penjualan" required>
            <?php while ($rowPenjualan = mysqli_fetch_assoc($resultPenjualan)) { ?>
                <option value="<?php echo $rowPenjualan['id_penjualan']; ?>"><?php echo $rowPenjualan['id_penjualan']; ?></option>
            <?php } ?>
        </select>

        <label for="id_barang">ID Barang:</label>
        <select name="id_barang" required>
            <?php while ($rowBarang = mysqli_fetch_assoc($resultBarang)) { ?>
                <option value="<?php echo $rowBarang['id_barang']; ?>"><?php echo $rowBarang['nama_barang']; ?></option>
            <?php } ?>
        </select>

        <label for="jumla_terjual">Jumlah Terjual:</label>
        <input type="text" name="jumla_terjual" required>

        <button type="submit">Tambah Detail Penjualan</button>
    </form>
</body>
</html>

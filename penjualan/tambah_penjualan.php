<?php
include_once("../config.php");

$queryPelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Penjualan - Bacatulis<i>App</i></title>
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
    <form action="proses_tembah_penjualan.php" method="post">
    <h1>Tambah Data Penjualan</h1>
        <label for="id_pelanggan">Pelanggan:</label>
        <select name="id_pelanggan" id="id_pelanggan">
            <?php while ($pelanggan = mysqli_fetch_assoc($queryPelanggan)) { ?>
                <option value="<?php echo $pelanggan['id_pelanggan']; ?>"><?php echo $pelanggan['id_pelanggan']; ?></option>
            <?php } ?>
        </select>
        <br>

        <label for="tanggal_penjualan">Tanggal Penjualan:</label>
        <input type="date" name="tanggal_penjualan" required>
        <br>

        <input type="submit" value="Tambahkan">
    </form>
</body>
</html>

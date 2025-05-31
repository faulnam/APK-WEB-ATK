<?php
include("../config.php");

if(isset($_GET["tambah"])){
	$nama_barang = $_GET["nama_barang"];
	$kategori = $_GET["kategori"];
	$harga_satuan = $_GET["harga_satuan"];
    $stok = $_GET["stok"];
	
    $gambar_name = $_FILES["gambar"]["name"];
    $gambar_tmp = $_FILES["gambar"]["tmp_name"];
    $gambar_dest = "file/" . $gambar;

    move_uploaded_file($gambar_tmp, $gambar_dest);

    
    $hasil = mysqli_query(
        $koneksi,
        "INSERT INTO barang
        (nama_barang, kategori, harga_satuan, stok,  gambar)
        
        VALUE 
        ('$nama_barang', '$kategori', '$harga_satuan', '$stok',  '$gambar')"
    );

    if ($hasil) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "ada yang salah " . $koneksi->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Tambah Pemasok Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            margin: auto;
            margin-top:20px;
            width: 600px;
            height: auto;
            border: 1px;
            border-radius: 10px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color:  black;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            font-weight: bold;
            margin-bottom: 10px;
            display: block;
        }

        input[type="text"] {
            width: 97%;
            padding: 8px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            background-color: #3498db;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
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
        <h3 href="index.php">Bacatulis<i>App</i></h3>
    </div>
    <div class="container">
        <table border="">
        <h1>Tambah Pemasok<br>Barang</h1>
        <form method="post" action="uploud.php" enctype="multipart/form-data">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" name="nama_barang" required>
            
            <label for="kategori">Kategori</label>
            <input type="text" name="kategori" required>
            
            <label for="harga_satuan">Harga Satuan</label>
            <input type="text" name="harga_satuan" required>

            <label for="stok">Stok</label>
            <input type="text" name="stok" required>

            <label for="gambar">Gambar</label>
            <input type="file" name="gambar" required>
            
            <input type="submit" value="Tambah" name="tambah">
        </form>
        </table>
    </div>
</body>
</html>

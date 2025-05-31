<?php
include_once("../config.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM barang WHERE id_barang = $id";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        $nama_barang = $row['nama_barang'];
        $kategori = $row['kategori'];
        $harga_satuan = $row['harga_satuan'];
        $stok = $row['stok'];
        $gambar = $row['gambar'];

    } else {
        echo "Data tidak ditemukan.";
    }

    mysqli_close($koneksi);
} else {
    echo "ID tidak ditemukan.";
}
?>
<html>
<head>
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
            color: black;
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
            width: 100%;
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

        img {
            max-width: 200px;
            margin-bottom: 10px;
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
    <div class="container">
        <table border="">
            <h1>Ubah Pemasok<br>Barang</h1>
            <form action="proses_ubah.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_barang" value="<?php echo $id; ?>">

                <label for="nama_barang">Nama Barang</label>
                <input type="text" name="nama_barang" value="<?php echo $nama_barang; ?>" required><br>

                <label for="kategori">Kategori</label>
                <input type="text" name="kategori" value="<?php echo $kategori; ?>" required><br>

                <label for="harga_satuan">Harga Satuan</label>
                <input type="text" name="harga_satuan" value="<?php echo $harga_satuan; ?>" required><br>

                <label for="stok">Stok</label>
                <input type="text" name="stok" value="<?php echo $stok; ?>" required><br>

                <label for="gambar">Gambar Saat Ini</label>
                <img src="file/<?php echo $gambar; ?>" alt="gambar">

                <label for="gambar_baru">Gambar Baru</label>
                <input type="file" name="gambar_baru"><br>

                <input type="submit" value="Simpan Perubahan">
            </form>
        </table>
    </div>
</body>
</html>

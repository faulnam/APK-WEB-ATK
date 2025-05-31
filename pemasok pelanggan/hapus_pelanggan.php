<?php
include_once("../config.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM pelanggan WHERE id_pelanggan = $id";

    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] === 'yes') {
            if (mysqli_query($koneksi, $query)) {
                $pesan = "Data berhasil dihapus.";
            } else {
                $pesan = "Error: " . $query . "<br>" . mysqli_error($koneksi);
            }
        } else {
            $pesan = "Penghapusan dibatalkan.";
        }
    }

    mysqli_close($koneksi);
} else {
    $pesan = "ID tidak ditemukan.";
}


?>

<html>
<head>
<title>Hasil Penghapusan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .message-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        h3 {
            color: #333;
        }

        a {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 15px;
            text-decoration: none;
            background-color: #3498db;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        a:hover {
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
        <h3 href="#home">Bacatulis<i>App</i></h3>
    </div>
<div class="message-container">
    <h3><?php echo $pesan; ?></h3>
    <br>
    <a href="../pelanggan.php">Kembali ke Halaman Awal</a>
</body>
</html>

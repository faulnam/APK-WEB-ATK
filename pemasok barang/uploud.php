<?php

include_once("../config.php");

$gambar= $_FILES['gambar']['name'];
$nama_barang = $_POST['nama_barang'];
$kategori = $_POST['kategori'];
$harga_satuan = $_POST['harga_satuan'];
$stok = $_POST['stok'];

// Pindahkan file yang diunggah ke direktori yang diinginkan
move_uploaded_file($_FILES['gambar']['tmp_name'], 'file/' . $gambar);

$query = "INSERT INTO barang SET
            nama_barang = '$nama_barang',
            kategori = '$kategori',
            harga_satuan = '$harga_satuan',
            stok = '$stok',
            gambar = '$gambar'";

mysqli_query($koneksi, $query) or die("SQL Error: " . mysqli_error($koneksi));

header('location: ../index.php');
?>

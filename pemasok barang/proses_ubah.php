<?php
session_start();
include_once("../config.php");

if (isset($_POST['id_barang'])) {
    $id = $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];
    $kategori = $_POST['kategori'];
    $harga_satuan = $_POST['harga_satuan'];
    $stok = $_POST['stok'];

    if (!empty($_FILES['gambar_baru']['name'])) {
        $gambar_baru_filename = $_FILES['gambar_baru']['name'];
        move_uploaded_file($_FILES['gambar_baru']['tmp_name'], 'file/' . $gambar_baru_filename);

        $update_query = "UPDATE barang SET
                           nama_barang = '$nama_barang',
                           kategori = '$kategori',
                           harga_satuan = '$harga_satuan',
                           stok = '$stok',
                           gambar_filename = '$gambar_baru_filename'
                        WHERE gambar_pelanggan = $id";
    } else {
        $update_query = "UPDATE barang SET
                           nama_barang = '$nama_barang',
                           kategori = '$kategori',
                           harga_satuan = '$harga_satuan'
                           stok = '$stok'
                        WHERE id_barang = $id";
    }

    mysqli_query($koneksi, $update_query) or die("SQL Error: " . mysqli_error($koneksi));
    
    header('location: ../index.php');
} else {
    echo "ID tidak ditemukan.";
}
?>

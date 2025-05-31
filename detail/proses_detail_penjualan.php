<?php
include_once("../config.php");

$queryPenjualan = "SELECT id_penjualan FROM penjualan";
$resultPenjualan = mysqli_query($koneksi, $queryPenjualan);

$queryBarang = "SELECT id_barang, nama_barang FROM barang";
$resultBarang = mysqli_query($koneksi, $queryBarang);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_penjualan = $_POST["id_penjualan"];
    $id_barang = $_POST["id_barang"];
    $jumlah_terjual = $_POST["jumla_terjual"];

    $query = "INSERT INTO detail_penjualan (id_penjualan, id_barang, jumla_terjual) VALUES ('$id_penjualan', '$id_barang', '$jumlah_terjual')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header("Location: ../detail_penjualan.php"); 
        exit();
    } else {
        echo "Gagal menambahkan detail penjualan.";
    }
}
?>

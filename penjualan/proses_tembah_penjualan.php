<?php
include_once("../config.php");


if (isset($_POST['id_pelanggan']) && isset($_POST['tanggal_penjualan'])) {
    $id_pelanggan = mysqli_real_escape_string($koneksi, $_POST['id_pelanggan']);
    $tanggal_penjualan = mysqli_real_escape_string($koneksi, $_POST['tanggal_penjualan']);

 
    $queryTambahPenjualan = mysqli_prepare(
        $koneksi,
        "INSERT INTO penjualan (id_pelanggan, tanggal_penjualan) VALUES (?, ?)"
    );

    mysqli_stmt_bind_param($queryTambahPenjualan, 'ss', $id_pelanggan, $tanggal_penjualan);

    if (mysqli_stmt_execute($queryTambahPenjualan)) {
        header("Location: ../penjualan.php");
        exit();
    } else {
        
        echo "Gagal menambahkan data penjualan. Pesan kesalahan: " . mysqli_stmt_error($queryTambahPenjualan);
    }

    mysqli_stmt_close($queryTambahPenjualan);   
} else {
    echo "Data yang dikirim tidak valid.";
}   
?>

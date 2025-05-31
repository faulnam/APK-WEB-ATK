<?php
include_once("../config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pelanggan = $_POST['id_pelanggan'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $nomor_telepon = $_POST['nomor_telepon'];

    $query = "UPDATE pelanggan 
              SET 
              nama_pelanggan = '$nama_pelanggan', 
              alamat = '$alamat', 
              nomor_telepon = '$nomor_telepon' 
              WHERE id_pelanggan = $id_pelanggan";

    if (mysqli_query($koneksi, $query)) {
        header("Location: ../pelanggan.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}
?>

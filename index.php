<?php
include_once("config.php");

$hasil = mysqli_query(
    $koneksi,
    "SELECT * 
    FROM barang
    ORDER BY nama_barang"
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Master - Pemasok Barang</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
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

        .container-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin: 20px;
            border-radius: 10px;
        }

        .menu-container {
            width: 20%;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #ecf0f1;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .menu-container a{
            text-decoration: none;
            color: black;
            border-radius: 5px;
        }

        .menu-item {
            margin-bottom: 10px;
            padding: 10px;
            background-color: #d5d8dc;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .content-container {
            flex: 1;
            margin-left: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #ecf0f1;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: left;
            color: #333;
            margin-top: 0;
            margin-bottom: 20px;
        }

        .add-data-container {
            margin-top: 10px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin-bottom: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
            text-align: center;
            text-decoration: none;
            color: #fff;
        }

        .btn-primary {
            background-color: #3498db;
        }

        .btn-primary:hover {
            background-color: #2980b9;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #d5d8dc;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .img-container{
            display: flex;
        }

       

    </style>
</head>
<script>
    function konfirmasiHapus(id) {
        var konfirmasi = confirm('Anda yakin ingin menghapus data ini?');
        if (konfirmasi) {
            window.location.href = 'pemasok barang/hapus.php?id=' + id + '&confirm=yes';
        } else {
            alert('Penghapusan dibatalkan.');
           
        }
    }
</script>
<body>
    <div class="navbar">
        <h3 href="#home">Bacatulis<i>App</i></h3>
    </div>
    <div class="container-wrapper">
        <div class="menu-container">
            <div class="img-container">
            <img style="width: 100px;" src="profil.jpg" alt="Logo" class="logo">
            <h5 style="margin-left:10px; margin-top:50px;">M Syifaul Anam <br><a style="color:green;">Online</a></h5>
            </div>
            <hr>
            <h2>Daftar Menu</h2>
            <div class="menu-item"><a href="index.php">Barang</a></div>
            <div class="menu-item"><a href="detail_penjualan.php">Detail Penjualan</a></div>
            <div class="menu-item"> <a href="pelanggan.php">Pelanggan</a></div>
            <div class="menu-item"><a href="penjualan.php">Penjualan</a></div>
            <p>Apa yang kamu ketahui tentang Bacatulis<i>App</i> ? <br>
                .....</p><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br><br>
            <form method="post" action="logout.php">
            <button>Logout</button>
            </form>
        
        </div>
        <div class="content-container">
            <h1>Data Barang</h1>
            <div class="add-data-container">
                <a class="btn btn-primary" href="pemasok barang/tambah.php">Tambah Data</a>
            </div>
            <table border="1px">
                <tr>
                    <th>Gambar</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Harga Satuan</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
                <?php while ($data = mysqli_fetch_assoc($hasil)) { ?>
                    <tr>
                    <td><img src="pemasok barang/file/<?php echo $data["gambar"]; ?>" alt="gambar" style="max-width: 50px;"></td>
                        <td><?php echo $data["nama_barang"]; ?></td>
                        <td><?php echo $data["kategori"]; ?></td>
                        <td><?php echo $data["harga_satuan"]; ?></td>
                        <td><?php echo $data["stok"]; ?></td>
                        <td>
                            <a class="btn btn-primary" href="pemasok barang/ubah.php?id=<?php echo $data['id_barang']; ?>">Ubah</a>
                            <a class="btn btn-primary" href="javascript:void(0);" onclick="konfirmasiHapus(<?php echo $data['id_barang']; ?>)">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>


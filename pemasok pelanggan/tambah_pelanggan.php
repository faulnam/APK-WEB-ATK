<?php
include("../config.php");

if(isset($_GET["tambah"])){
	$nama_pelanggan = $_GET["nama_pelanggan"];
	$alamat = $_GET["alamat"];
	$nomor_pelanggan = $_GET["nomor_telepon"];
	
	$hasil = mysqli_query(
		$koneksi,
		"INSERT INTO pelanggan
		(nama_pelanggan, alamat, nomor_telepon)
		
		VALUE 
		('$nama_pelanggan', '$alamat', '$nomor_telepon')
		"
	);
	
	if($hasil){
	?>
		<script>
		window.location.href = "../pelanggan.php";
		</script>
	<?php
	}else{
		echo "ada yang salah " . $koneksi->error;
	}
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Tambah Pemasok Pelanggan</title>
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
        <h3 href="#home">Bacatulis<i>App</i></h3>
    </div>
    <div class="container">
        <table border="">
        <h1>Tambah Pemasok<br>Pelanggan</h1>
        <form method="get" action="" >
      
            <label for="nama_pelanggan">Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" required>
            
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" required>
            
            <label for="nomor_telepon">Nomor Telepon</label>
            <input type="text" name="nomor_telepon" required>

            <input type="submit" value="Tambah" name="tambah">
        </form>
        </table>
    </div>
</body>
</html>

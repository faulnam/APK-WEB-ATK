<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $username = $_POST["username"];
    $password = $_POST["password"];
    $nama = $_POST["nama"];

 
    if ($nama === "faul" && $username === "admin" && $password === "123456" ) {
       
        header("Location: index.php");
        exit();
    }
    else {
        
        $_SESSION['login_error'] = "Username atau password salah!";
        header("Location: eror.php"); 
        exit();
    }
    
}


if (isset($_SESSION['login_error'])) {
    echo '<input type="hidden" id="loginError" value="' . $_SESSION['login_error'] . '">';
    unset($_SESSION['login_error']); 
}
?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var loginError = document.getElementById('loginError');
        if (loginError && loginError.value !== '') {
           
            alert(loginError.value);
        }
    });
</script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* Styling untuk halaman login */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    width: 300px;
    margin: 100px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    margin-bottom: 10px;
}

.input-container {
    margin-bottom: 10px;
}

button {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

button {
    background-color:yellowgreen;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color:yellowgreen;
}
.container-box {
    width: 300px; 
    height: 300px; 
    border: 1px solid #ccc; 
    overflow: auto; 
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
        <div class="login-box">
            <img style="width: 50px;" src="kuning.png" alt="Logo" class="logo">
            <h2>Selamat datang di <br>Baca Tulis</h2>
            <form action="loginn.php" method="post">
                <label for="username" style="font-size: 15px; font-family: roboto;">Nama:</label>
                <input type="text" id="nama" name="nama" placeholder="Masukkan nama"
                    style="width: 277px; height: 27px;  font-size: 13px;padding-left: 10px;">
                <br><br>
                <label for="username" style="font-size: 15px; font-family: roboto;">Username:</label>
                <input type="text" id="username" name="username" placeholder="Masukkan username"
                    style="width: 277px; height: 27px; font-size: 13px;padding-left: 10px;">
                <br><br>
                <label for="password" style="font-size: 15px; font-family: roboto;">Password:</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password"
                    style="width: 277px; height: 27px;  font-size: 13px;padding-left: 10px;">
                <br><br>
                <button style="background-color:#3498db;" type="submit">Login</button>
            </form>
            <p>Jangan Lupa Makan! <b>Hehe</b> </a></p>
        </div>
    </div>

</body>

</html>
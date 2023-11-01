<?php

require 'koneksi.php';

if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $username = $_POST['username'];
    $password = $_POST['password'];


    $password = password_hash($password, PASSWORD_DEFAULT);
    $result = mysqli_query($conn, "SELECT email, username FROM reglog WHERE email = '$email' OR username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Username atau email duah terpakai. Silakan pilih username lain!!!');
                location.href = 'registrasi.php';
                </script>";
    } else {
        $sql = "INSERT INTO reglog (email, no_hp, username, password) VALUES ('$email', '$no_hp', '$username', '$password')";

        $result = mysqli_query($conn, $sql);

        if (mysqli_affected_rows($conn) > 0) {
            echo "<script>
                alert('Registrasi berhasil!');
                location.href = 'login.php';
            </script>";
        } else {
            echo "<script>
                alert('Registrasi gagal. Silakan coba lagi.');
                location.href = 'registrasi.php';
                </script>";
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>
        <div class="nav-button">
            <img src="image/logo.png">
            <button onclick="showMenu()" id="burgerbar">
                <svg id="show" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
                    <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
                </svg>
                <svg id="close" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
                    <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
                </svg>
            </button>
        </div>
        <div class="nav" id="nav">
            <a href="index.php#about-me">Tentang Admin</a>
            <div class="mid-nav">
                <a href="index.php#hero">Home</a>
                <a href="index.php#galeri">Galeri</a>
                <a href="laporan.php">Laporan</a>
            </div>
            <a href="login.php">Login</a>
        </div>
    </nav>
    <div id="mode" class="mode">
        <svg id="dark" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
            <path d="M480-120q-150 0-255-105T120-480q0-150 105-255t255-105q14 0 27.5 1t26.5 3q-41 29-65.5 75.5T444-660q0 90 63 153t153 63q55 0 101-24.5t75-65.5q2 13 3 26.5t1 27.5q0 150-105 255T480-120Zm0-80q88 0 158-48.5T740-375q-20 5-40 8t-40 3q-123 0-209.5-86.5T364-660q0-20 3-40t8-40q-78 32-126.5 102T200-480q0 116 82 198t198 82Zm-10-270Z" />
        </svg>
        <svg id="light" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
            <path d="M480-360q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Zm0 80q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480q0 83-58.5 141.5T480-280ZM80-440q-17 0-28.5-11.5T40-480q0-17 11.5-28.5T80-520h80q17 0 28.5 11.5T200-480q0 17-11.5 28.5T160-440H80Zm720 0q-17 0-28.5-11.5T760-480q0-17 11.5-28.5T800-520h80q17 0 28.5 11.5T920-480q0 17-11.5 28.5T880-440h-80ZM480-760q-17 0-28.5-11.5T440-800v-80q0-17 11.5-28.5T480-920q17 0 28.5 11.5T520-880v80q0 17-11.5 28.5T480-760Zm0 720q-17 0-28.5-11.5T440-80v-80q0-17 11.5-28.5T480-200q17 0 28.5 11.5T520-160v80q0 17-11.5 28.5T480-40ZM226-678l-43-42q-12-11-11.5-28t11.5-29q12-12 29-12t28 12l42 43q11 12 11 28t-11 28q-11 12-27.5 11.5T226-678Zm494 495-42-43q-11-12-11-28.5t11-27.5q11-12 27.5-11.5T734-282l43 42q12 11 11.5 28T777-183q-12 12-29 12t-28-12Zm-42-495q-12-11-11.5-27.5T678-734l42-43q11-12 28-11.5t29 11.5q12 12 12 29t-12 28l-43 42q-12 11-28 11t-28-11ZM183-183q-12-12-12-29t12-28l43-42q12-11 28.5-11t27.5 11q12 11 11.5 27.5T282-226l-42 43q-11 12-28 11.5T183-183Zm297-297Z" />
        </svg>
    </div>
    <section class="hero" id="hero">
        <div class="box-input">
            <h2>Registrasi</h2>
            <form action="" method="POST">
                <label for="email">Email</label>
                <input type="text" name="email" placeholder="Email" required>

                <label for="no_hp">Nomor Telepon</label>
                <input type="number" name="no_hp" placeholder="Nomor Telepon" required>

                <label for="username">Username</label>
                <input type="text" name="username" placeholder="Username" required>

                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="register" class="register-button">Register</button>
                <p class="login-link">Sudah punya akun? <a href="login.php">Log in</a></p>
            </form>
        </div>
    </section>
</body>

</html>
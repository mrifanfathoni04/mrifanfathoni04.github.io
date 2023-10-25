<?php
require 'koneksi.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $nkk = $_POST['nkk'];
    $jenis_kelamin = $_POST['jenis_kelamin'];

    if($_FILES["foto"]["name"] != ""){
        $foto = $_FILES['foto']['name'];

        $tanggal = date('Y-m-d');
        $x = explode('.', $foto);
        $ekstensi = strtolower(end($x));

        $new_foto = "$tanggal.$nama.$ekstensi";
        $tmp = $_FILES['foto']['tmp_name'];

        if (move_uploaded_file($tmp, "" . $new_foto)) {
            $result = mysqli_query($conn, "UPDATE karang_taruna set nama='$nama',nik='$nik',nkk='$nkk',jenis_kelamin='$jenis_kelamin', foto = '$new_foto' WHERE id='$id'");

            if ($result) {
                echo "<script>
                    alert('data berhasil dirubah');
                    document.location.href = 'karang-taruna.php'
                </script>";
            } else {
                echo "<script>
                    alert('data gagal dirubah');
                    document.location.href = 'karang-taruna.php'
                </script>";
            }
        } else {
            echo "
            <script>
                alert('Data gagal ditambahkan!');
            </script>";
        }
    } else {
        $result = mysqli_query($conn, "UPDATE karang_taruna set nama='$nama',nik='$nik',nkk='$nkk',jenis_kelamin='$jenis_kelamin' WHERE id='$id'");
        if ($result) {
            echo "<script>
                alert('data berhasil dirubah');
                document.location.href = 'karang-taruna.php'
            </script>";
        } else {
            echo "<script>
                alert('data gagal dirubah');
                document.location.href = 'karang-taruna.php'
            </script>";
        }
    }

}
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM karang_taruna where id=$id");
$karang_taruna = [];
while ($row = mysqli_fetch_array($result)) {
    $karang_taruna[] = $row;
}
$karang_taruna = $karang_taruna[0];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <a href="index.html#about-me">Tentang Admin</a>
            <div class="mid-nav">
                <a href="index.html#hero">Home</a>
                <a href="index.html#galeri">Galeri</a>
                <a href="#">Laporan</a>
            </div>
            <a href="karang-taruna.php">Karang Taruna</a>
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
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" id="id" name="id" value="<?= $id ?>">
                <p>Tambah Anggota Karang Taruna</p>
                <hr>
                <label for="nama">
                    <p>Nama</p>
                </label>
                <input type="text" name="nama" id="nama" value="<?= $karang_taruna['nama'] ?>" required>
                <label for="nik">
                    <p>NIK</p>
                </label>
                <input type="number" name="nik" id="nik" value="<?= $karang_taruna['nik'] ?>" required>
                <label for="nkk">
                    <p>NKK</p>
                </label>
                <input type="number" name="nkk" id="nkk" value="<?= $karang_taruna['nkk'] ?>" required>
                <label for="jenis_kelamin">
                    <p>Jenis Kelamin</p>
                </label>
                <input type="text" name="jenis_kelamin" id="jenis_kelamin" value="<?= $karang_taruna['jenis_kelamin'] ?>" required>
                <label for="foto"><p>Foto</p></label>
                <div class="file"><input type="file" name="foto" id="foto"></div>
                <div class="sub"><input type="submit" name="submit" value="submit"></div>
            </form>
        </div>

    </section>
</body>

</html>
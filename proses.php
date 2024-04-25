<?php
session_start();

include('koneksi.php');

$hal = $_GET['hal'];

// login
if ($hal == "proses_login") {


    // menangkap data yang di kirim dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($koneksi, $sql);
    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;           
        $_SESSION['password'] = $password;
        echo "<script>alert('Berhasil Login.'); window.location='admin.php';</script>";
    } else {
        echo "<script>alert('Maaf! Username atau password Anda salah.'); window.location='login.php';</script>";
    }
}

// form tambah data
if (isset($_POST['simpan'])) {
$judul_artikel = $_POST['judul_artikel'];
$tanggal = time();
$deskripsi1 = $_POST['deskripsi1'];
$deskripsi2 = $_POST['deskripsi2'];
$deskripsi3 = $_POST['deskripsi3'];
$deskripsi4 = $_POST['deskripsi4'];
$foto = $_FILES['foto']['name'];
$file_tmp = $_FILES['foto']['tmp_name'];
move_uploaded_file($file_tmp, 'assets/' . $foto);

$insert = mysqli_query($koneksi, "insert into artikel(j_artikel, date_created, artikel1, artikel2, artikel3, artikel4, foto) values('$judul_artikel','$tanggal','$deskripsi1','$deskripsi2','$deskripsi3','$deskripsi4','$foto')");

if ($insert) {
    echo "<script>alert('Simpan data berhasil');location='artikel.php';</script>";
}
}
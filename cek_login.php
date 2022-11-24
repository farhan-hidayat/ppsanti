<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
require 'koneksi.php';

// menangkap data yang dikirim dari form login
$email = $_POST['email'];
$password = md5($_POST['password']);


// menyeleksi data user dengan email dan password yang sesuai
$login = mysqli_query($koneksi, "select * from tb_user where email_user='$email' and password_user='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah email dan password di temukan pada database
if ($cek > 0) {

    $data = mysqli_fetch_array($login);
    $level = $data['level_user'];

    // cek jika user login sebagai admin
    if ($level == "admin") {

        // buat session login dan email
        $_SESSION['email'] = $email;
        $_SESSION['level'] = "Admin";
        $_SESSION['id'] = $data['id_user'];
        $_SESSION['nama'] = $data['nama_lengkap'];
        // alihkan ke halaman dashboard admin
        header("location:admin/dashboard.php");

        // cek jika user login sebagai siswa
    } elseif ($level == "siswa") {
        // buat session login dan email
        $_SESSION['email'] = $email;
        $_SESSION['level'] = "Siswa";
        $_SESSION['id'] = $data['id_user'];
        $_SESSION['nama'] = $data['nama_user'];
        // alihkan ke halaman dashboard siswa
        header("location:siswa/dashboard.php");
    } else {

        // alihkan ke halaman login kembali
        header("location:index.php?pesan=gagal");
    }
} else {
    header("location:index.php?pesan=gagal");
}

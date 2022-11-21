<?php
session_start();
require '../koneksi.php';
// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level'] == "") {
  header("location:../index.php?pesan=belum_login");
} elseif ($_SESSION['level'] != "Siswa") {
  header("location:../error_page/403.php");
}

$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Blank Page &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css">
  <link rel="stylesheet" href="../node_modules/bootstrap-daterangepicker/daterangepicker.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/admin/css/style.css">
  <link rel="stylesheet" href="../assets/admin/css/components.css">

  <!-- Custom CSS -->
  <style>
    .container {
      position: relative;
      width: 100%;
      overflow: hidden;
      padding-top: 56.25%;
      /* 16:9 Aspect Ratio */
    }

    .responsive-iframe {
      position: absolute;
      top: 0;
      left: 0;
      bottom: 0;
      right: 0;
      width: 100%;
      height: 100%;
      border: none;
    }
  </style>
</head>
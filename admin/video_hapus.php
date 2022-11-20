<?php
require '../koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM tb_video WHERE id_video='$id'");
header("location:video.php");

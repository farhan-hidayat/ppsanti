<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Register &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="node_modules/selectric/public/selectric.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="login-brand">
                            <img src="assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <div class="section-header-back">
                                    <a href="index.php" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                                </div>
                                <h4>Register</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="">
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label for="first_name">Nama Lengkap</label>
                                            <input id="first_name" type="text" name="nama" class="form-control" name="first_name" autofocus required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" name="email" class="form-control" name="email" required>
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="password" class="d-block">Katasandi</label>
                                            <input id="password" type="password" name="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" required>
                                            <div id="pwindicator" class="pwindicator">
                                                <div class="bar"></div>
                                                <div class="label"></div>
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="password2" class="d-block">Ulangi Katasandi</label>
                                            <input id="password2" type="password" class="form-control" name="password-confirm" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label>Nomor HP</label>
                                            <input type="number" name="hp" class="form-control" required>
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Alamat</label>
                                            <input type="text" name="alamat" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" name="regis" class="btn btn-primary btn-lg btn-block">
                                            Register
                                        </button>
                                    </div>
                                </form>
                                <?php
                                require 'koneksi.php';
                                if (isset($_POST['regis'])) {
                                    $nama = $_POST['nama'];
                                    $email = $_POST['email'];
                                    $password = md5($_POST['password']);
                                    $password_confirm = md5($_POST['password-confirm']);
                                    $level = "siswa";
                                    $alamat = $_POST['alamat'];
                                    $hp = $_POST['hp'];

                                    $ambil = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE email_user='$email'");
                                    $yangcocok = $ambil->num_rows;
                                    if ($password_confirm != $password) {
                                        echo "<script>alert('Katasandi tidak sama');</script>";
                                        echo "<script>location='daftar.php';</script>";
                                    } elseif ($yangcocok == 1) {
                                        echo "<script>alert('Pendaftaran Gagal, Email Sudah Terdaftar');</script>";
                                        echo "<script>location='daftar.php';</script>";
                                    } else {
                                        $query = mysqli_query($koneksi, "INSERT INTO tb_user VALUES (null,'$nama','$email','$password','$level','$alamat','$hp')");
                                        echo "<script>alert('Pendaftaran Berhasil, Silahkan Login');</script>";
                                        echo "<script>location='index.php';</script>";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; Stisla 2018
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="node_modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
    <script src="node_modules/selectric/public/jquery.selectric.min.js"></script>

    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
    <script src="assets/js/page/auth-register.js"></script>
</body>

</html>
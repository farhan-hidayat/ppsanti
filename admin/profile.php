<?php

include('template/header.php');
include('template/navbar.php');
include('template/sidebar.php');

$id = $_SESSION['id'];
if (isset($_POST['ubah'])) {
    $id = $_SESSION['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    
    $query = mysqli_query($koneksi, "UPDATE tb_USER SET nama_lengkap = '$nama', email_user = '$email', alamat = '$alamat', no_hp = '$no_hp' WHERE id_user = '$id'");

    if ($query) {
        echo "<script>alert('Data berhasil diubah');window.location='profile.php'</script>";
    } else {
        echo "<script>alert('Data gagal diubah');window.location='profile.php'</script>";
    }
}

if (isset($_POST['pass'])) {
    $id = $_SESSION['id'];
    $pass = md5($_POST['pass_lama']);
    $pass_baru = md5($_POST['pass_baru']);
    $pass_confirm = md5($_POST['pass_confirm']);
    
    $cek = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_user = '$id'");
    $data_cek = mysqli_fetch_array($cek);

    if ($pass != $data_cek['password_user']) {
        echo "<script>alert('Katasandi lama salah');window.location='profile.php'</script>";
    } else if ($pass_baru != $pass_confirm) {
        echo "<script>alert('Katasandi baru tidak sama');window.location='profile.php'</script>";
    } else {
        $query = mysqli_query($koneksi, "UPDATE tb_USER SET password_user = '$pass_baru' WHERE id_user = '$id'");
        echo "<script>alert('Katasandi berhasil diubah');window.location='profile.php'</script>";
    }
}

?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Profile</h1>
        </div>

        <div class="section-body">
        <h2 class="section-title">Ubah Profile</h2>
            <p class="section-lead">
                On this page you can create a new post and fill in all fields.
            </p>

            <div class="row">
                <div class="col-12 col-sm-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Profile</h4>
                        </div>
                            <form action="" method="POST">
                                <?php
                                $query = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_user = '$id'");
                                while ($data = mysqli_fetch_array($query)) {
                                ?>
                                    <div class="card-body">
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Lengkap</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" name="nama" value="<?= $data['nama_lengkap'] ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" name="email" value="<?= $data['email_user'] ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" name="alamat" value="<?= $data['alamat'] ?>" class="form-control">
                                            </div>
                                        </div><div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No HP</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="number" name="no_hp" value="<?= $data['no_hp'] ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                            <div class="col-sm-12 col-md-7">
                                                <button class="btn btn-primary" type="submit" name="ubah">Ubah</button>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </form>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                                <h4>Data Password</h4>
                        </div>
                        <form action="" method="POST">
                                <div class="card-body">
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password Lama</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="password" name="pass_lama" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password Baru</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="password" name="pass_baru" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Ulangi Password</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="password" name="pass_confirm" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button class="btn btn-primary" type="submit" name="pass">Ubah Password</button>
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php

include('template/footer.php');

?>
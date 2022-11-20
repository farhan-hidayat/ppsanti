<?php

include('template/header.php');
include('template/navbar.php');
include('template/sidebar.php');

?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="video.php" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Ubah Video</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Create New Post</h2>
            <p class="section-lead">
                On this page you can create a new post and fill in all fields.
            </p>

            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Ubah Data Video</h4>
                        </div>
                        <form action="" method="POST">
                            <?php
                            $id = $_GET['id'];
                            $query = mysqli_query($koneksi, "SELECT * FROM tb_video WHERE id_video = '$id'");
                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                                <div class="card-body">
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul Video</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="judul" value="<?= $data['judul_video'] ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="tanggal" value="<?= $data['tanggal'] ?>" class="form-control datepicker">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Link Video</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="link" value="<?= $data['link_video'] ?>" class="form-control">
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
                        <?php
                        if (isset($_POST['ubah'])) {
                            $id = $_GET['id'];
                            $judul = $_POST['judul'];
                            $tanggal = $_POST['tanggal'];
                            $link = $_POST['link'];

                            $query = mysqli_query($koneksi, "UPDATE tb_video SET judul_video = '$judul', tanggal = '$tanggal', link_video = '$link' WHERE id_video = '$id'");

                            if ($query) {
                                echo "<script>alert('Data berhasil diubah');window.location='video.php'</script>";
                            } else {
                                echo "<script>alert('Data gagal diubah');window.location='video.php'</script>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php

include('template/footer.php');

?>
<?php
include('template/header.php');
include('template/navbar.php');
include('template/sidebar.php');
?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Video</h1>
            <div class="section-header-button">
                <a href="video_tambah.php" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah
                </a>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Data Video</h2>
            <p class="section-lead">
                We use 'DataTables' made by @SpryMedia. You can check the full documentation <a href="https://datatables.net/">here</a>.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Basic DataTables</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Judul Video</th>
                                            <th>Tanggal</th>
                                            <th>Link</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $video = mysqli_query($koneksi, "select * from tb_video order by id_video desc");
                                        while ($data = mysqli_fetch_array($video)) {
                                        ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?= $no++; ?>
                                                </td>
                                                <td><?= $data['judul_video']; ?></td>
                                                <td><?= $data['tanggal'] ?></td>
                                                <td><?= $data['link_video'] ?></td>
                                                <td class="text-center">
                                                    <a href="video_edit.php?id=<?= $data['id_video'] ?>" class="btn btn-success btn-hapus"><i class="fas fa-edit"></i> Ubah</a>
                                                    <a href="video_hapus.php?id=<?= $data['id_video'] ?>" class="btn btn-danger btn-hapus"><i class="fas fa-trash"></i> Hapus</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
include('template/footer.php');
?>
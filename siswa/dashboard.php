<?php

include('template/header.php');
include('template/navbar.php');
include('template/sidebar.php');

?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard Siswa</h1>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Pilih Metode Belajar</h4>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs justify-content-center" id="myTab6" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active text-center" id="home-tab6" data-toggle="tab" href="#home6" role="tab" aria-controls="home" aria-selected="true">
                                <span><i class="fas fa-film"></i></span> Video</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center" id="profile-tab6" data-toggle="tab" href="#profile6" role="tab" aria-controls="profile" aria-selected="false">
                                <span><i class="fas fa-music"></i></span> Lagu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center" id="contact-tab6" data-toggle="tab" href="#contact6" role="tab" aria-controls="contact" aria-selected="false">
                                <span><i class="fas fa-edit"></i></span> Kuis</a>
                        </li>
                    </ul>
                    <div class="tab-content tab-bordered" id="myTabContent6">
                        <div class="tab-pane fade show active" id="home6" role="tabpanel" aria-labelledby="home-tab6">

                            <div class="row">
                                <?php
                                $video = mysqli_query($koneksi, "select * from tb_video order by id_video desc");
                                while ($data = mysqli_fetch_array($video)) {
                                ?>
                                    <div class="col-12 col-md-4 col-lg-4">
                                        <article class="article article-style-c">
                                            <div class="article-header">
                                                <iframe class="article-image" src="<?= $data['link_video']; ?>" title="Last Child - Bernafas Tanpamu (Official Lyric Video)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            </div>
                                            <div class="article-details">
                                                <div class="article-category"><a href="#">News</a>
                                                    <div class="bullet"></div> <a href="#"><?= $data['tanggal']; ?></a>
                                                </div>
                                                <div class="article-title">
                                                    <h2><a href="#"><?= $data['judul_video']; ?></a></h2>
                                                </div>
                                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                    cillum dolore eu fugiat nulla pariatur. </p>
                                            </div>
                                        </article>
                                    </div>
                                <?php } ?>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="profile6" role="tabpanel" aria-labelledby="profile-tab6">
                            Sed sed metus vel lacus hendrerit tempus. Sed efficitur velit tortor, ac efficitur est lobortis quis. Nullam lacinia metus erat, sed fermentum justo rutrum ultrices. Proin quis iaculis tellus. Etiam ac vehicula eros, pharetra consectetur dui.
                        </div>
                        <div class="tab-pane fade" id="contact6" role="tabpanel" aria-labelledby="contact-tab6">
                            Vestibulum imperdiet odio sed neque ultricies, ut dapibus mi maximus. Proin ligula massa, gravida in lacinia efficitur, hendrerit eget mauris. Pellentesque fermentum, sem interdum molestie finibus, nulla diam varius leo, nec varius lectus elit id dolor.
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-body">
            </div>
    </section>
</div>

<?php

include('template/footer.php');

?>
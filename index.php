<?php
$title = "Sona Wisata | Tempat Wisata";
require 'su/function.php';

$jumdatph = 12;
$jumalldat = count(data("SELECT * FROM artikel"));
$jumhal = ceil($jumalldat / $jumdatph);
$aktpage = (isset($_GET["page"])) ? $_GET["page"] : 1;
$dtawl = ($jumdatph * $aktpage) - $jumdatph;

$artikel = data("SELECT * FROM artikel WHERE sts = 'approved' LIMIT $dtawl, $jumdatph");

if (isset($_POST["cari"])) {
    $artikel = searchArt($_POST["katakunci"]);
    echo "
    <script>
      document.location.href = 'index.php#artikel';
    </script>
    ";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title ?></title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/agency.min.css" rel="stylesheet">
    <link href="assets/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <script src="http://localhost/sonawisata/assets/ckeditor/ckeditor.js"></script>

</head>

<body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" style="height: 100px;">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger text-tebal" href="#page-top">Home</a>


            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger align-content-center" href="#artikel">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="buatArtikel.php">Buat Artikel</a>
                    </li>
                </ul>
            </div>
            <form action="" method="post" class=" pt-1 d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search....." aria-label="Search" aria-describedby="basic-addon2" name="katakunci">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" name="cari">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>

    <!-- Header -->
    <header class="masthead" style="height: 900px;">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in pt-5 mt-5">Temukan Tempat Liburan Faforit Keluarga Anda</div>
            </div>
        </div>
    </header>

    <section class="bg-secondary page-section" id="artikel">
        <div class="container">
            <div class="row mb-3">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase text-white">Artikel Tebaru</h2>
                    <hr>
                </div>
            </div>
            <div class="row">
                <?php $no = 1; ?>
                <?php foreach ($artikel as $brs) : ?>

                    <div class="col-md-3 col-sm-6 my-1" ">
                        <a class=" portfolio-link card">
                        <img class="card-img-top" height="150px" src="su/tempat/foto/<?= $brs['foto']; ?>" alt="">
                        </a>
                        <div class="card-body bg-white" style="height: 310px;">
                            <h5 class="card-title"><?= $brs["tempat"]; ?></h5>
                            <strong><?= $brs["lokasi"]; ?></strong>
                            <p></p>
                            <p class="card-text"><?= substr(html_entity_decode($brs["isi"]), 0, 100); ?>
                            </p>
                            <div class="card-footer bg-white">
                                <a href="isiartikel.php?id=<?= $brs["id"]; ?>" class="ml-0 btn btn-sm btn-primary">Lanjutkan Membaca</a>
                            </div>

                        </div>
                    </div>

                    <?php $no++; ?>
                <?php endforeach; ?>

            </div>
        </div>
    </section>

    <footer class="footer bg-dark">
        <div class="container">
            <div class="text-center">
                <span class="copyright text-white">Copyright &copy; Semry <?= date('Y'); ?></span>
            </div>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="assets/jquery/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="assets/jquery-easing/jquery.easing.min.js"></script>

    <script src="assets/js/agency.min.js"></script>

</body>

</html>
<?php
require 'su/function.php';


$idArtikel = $_GET["id"];

$point = data("SELECT * FROM artikel WHERE id='$idArtikel'")[0];
$title = "Sona Wisata | " . $point['tempat'];
$artikel = data("SELECT * FROM artikel WHERE id='$idArtikel'");

if (isset($_POST["kirim"])) {
    if (tambahLike($_POST) > 0) {
        echo "
      <script>
        alert('Tanggapan Anda Telah Terkirim');
        document.location.href = 'isiartikel.php?id=$idArtikel';
      </script>
      ";
        exit();
    } else {
        echo "
      <script>
        alert('Error. Silahkan Coba Lagi');
      </script>
      ";
        exit();
    }
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
    <link rel="stylesheet" href="http://localhost/utsweb2/assets/fontawesome-free/css/all.min.css">
    <link href="assets/css/style.css" rel="stylesheet">
    <script src="assets/jquery/jquery-3.4.1.min.js"></script>
</head>

<body id="page-top">

    <!-- Navigation -->
    <nav class="navbar bg-dark navbar-expand-lg navbar-dark mb-5 fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger text-tebal" href="index.php">Home</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="index.php?#artikel">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="buatArtikel.php">Buat Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="index.html">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="page-section mt-5">
        <div class="container">

            <?php
            foreach ($artikel as $brs) : ?>
                <div class="row ml-1 mr-1 mb-1">
                    <div class="col-sm-3">
                        <a href="index.php?#artikel" class="btn btn-primary shadow-lg btn-md active mb-1" role="button">
                            <i class="fas fa-arrow-left" style="margin-right: 10px;"></i>Kembali
                        </a>
                    </div>
                </div>

                <div class="row ml-1 mr-1 mb-3">
                    <div class="col-sm-3">
                        <div class="card card-primary border shadow-lg">
                            <div class="card-header bg-primary">
                                <h3 class="card-title text-white">Detail</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong><i class="fas fa-user mr-1"></i>Author</strong>
                                <p class="text-muted"><?= $brs['author']; ?></p>
                                <hr>
                                <strong><i class="fas fa-map-marker-alt mr-1"></i>Location</strong>
                                <p class="text-muted"><?= $brs['lokasi']; ?></p>
                                <hr>
                                <strong><i class="fas fa-share-alt mr-1"></i>Posted</strong>
                                <p class="text-muted">
                                    <span class="tag tag-danger"><?= $brs['date_create']; ?>, <?= $brs['time_create']; ?></span>
                                </p>
                                <hr>
                                <strong><i class="fas fa-calendar-plus mr-1"></i>Update</strong>
                                <p class="text-muted">
                                    <span class="tag tag-danger"><?= $brs['date_update']; ?>, <?= $brs['time_update']; ?></span>
                                </p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="card mb-3 border shadow-lg">
                            <div class="card-header bg-primary">
                                <h3 class="card-title text-white"><?= $brs['tempat']; ?></h3>
                            </div>
                            <div class="card-body p-0">
                                <div class="mailbox-read-message p-3">
                                    <img src="su/tempat/foto/<?= $brs['foto']; ?>" style="width: 100%; height:400px;" alt="" class="mb-3">
                                    <p><?= html_entity_decode($brs['isi']); ?></p>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            <?php
            endforeach;

            ?>

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
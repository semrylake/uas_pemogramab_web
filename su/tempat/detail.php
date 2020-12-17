<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location: ../../login.php");
    exit;
}
require '../function.php';
$idArtikel = $_GET["id"];
$point = data("SELECT * FROM artikel WHERE id='$idArtikel'")[0];
$title = "Sona Wisata | " . $point['tempat'];
$artikel = data("SELECT * FROM artikel WHERE id='$idArtikel'");
if (isset($_POST["editArtikel"])) {
    if (editArtikel($_POST) > 0) {
        echo "
      <script>
        alert('Data berhasil diupdate');
        document.location.href = 'index.php';
      </script>
      ";
    } else {
        echo "
      <script>
        alert('Data gagal diupdate');
        document.location.href = 'index.php';
      </script>
      ";
    }
}
include '../templateAdmin/header.php';
?>
<script src="http://localhost/utsweb2/assets/ckeditor/ckeditor.js"></script>
<link rel="stylesheet" href="http://localhost/utsweb2/assets/fontawesome-free/css/all.min.css">
<?php
include '../templateAdmin/sidebar.php';
include '../templateAdmin/navigation.php';
foreach ($artikel as $brs) : ?>

    <div class="modal fade" id="artikelEditModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Edit Tempat Wisata</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id" value="<?= $brs['id']; ?>" class="form-control">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" value="<?= $brs['author']; ?>" readonly name="author" id="author" class="form-control" autofocus="true" autocomplete="off" placeholder="Author" required>
                            </div>
                            <div class="form-group">
                                <input type="text" value="<?= $brs['tempat']; ?>" readonly name="nam" id="nam" class="form-control" autofocus="true" autocomplete="off" placeholder="Nama Tempat Wisata" required>
                            </div>
                            <div class="form-group">
                                <input value="<?= $brs['lokasi']; ?>" readonly placeholder="Lokasi Tempat Wisata ( Desa/Kecamatan/Kabupaten )" type="text" name="lok" id="lok" class="form-control" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="foto">Foto</label><br>
                                <img src="foto/<?= $brs['foto']; ?>" style="width: 100px; height:100px;" alt="" class="mb-3">
                            </div>
                            <div class="form-group">
                                <label for="sts">Status</label>
                                <select class="custom-select" name="sts" id="sts" required>
                                    <?php
                                    if ($brs['sts'] ==  'approved') {
                                        echo "<option value='approved'>Approved</option>";
                                        echo "<option value='no yet approved'>no yet approved</option>";
                                    } else {

                                        echo "<option value='no yet approved'>no yet approved</option>";
                                        echo "<option value='approved'>Approved</option>";
                                    }
                                    ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <textarea name="isiArtikel" readonly id="isiArtikel" rows="10" cols="100" required autocomplete="off">
                                <?= html_entity_decode($brs['isi']); ?>
                            </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="editArtikel" class="btn btn-success">
                            <i class="fas fa-save" style="margin-right: 10px;"></i>Update</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <a href="index.php" class="btn btn-primary shadow-lg btn-md active ml-3" role="button" style="margin-bottom: 5px;">
        <i class="fas fa-arrow-left" style="margin-right: 10px;"></i>Kembali
    </a>
    <a class="btn btn-warning editArtikel shadow-lg btn-md active ml-3" role="button" style="margin-bottom: 5px;">
        <i class="fas fa-edit" style="margin-right: 10px;"></i>Edit
    </a>
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
                    <strong><i class="fas fa-calendar-day mr-1"></i>Shared</strong>
                    <p class="text-muted">
                        <span class="tag tag-danger"><?= $brs['date_create']; ?>, <?= $brs['time_create']; ?></span>
                    </p>
                    <hr>
                    <strong><i class="fas fa-calendar-plus mr-1"></i>Last Update</strong>
                    <p class="text-muted">
                        <span class="tag tag-danger"><?= $brs['date_update']; ?>, <?= $brs['time_update']; ?></span>
                    </p>
                    <hr>
                    <strong><i class="far fa-thumbs-up mr-1"><i class="fas fa-comment-alt mr-1"></i></i>Response</strong>
                    <p class="text-muted">
                        <span class="tag tag-danger">45 likes - 2 comments</span>
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
                        <img src="foto/<?= $brs['foto']; ?>" style="width: 100%; height:400px;" alt="" class="mb-3">
                        <p><?= html_entity_decode($brs['isi']); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
endforeach;
include '../templateAdmin/footer2.php';
?>
<script>
    CKEDITOR.replace('isiArtikel');
</script>

<script>
    $(document).ready(function() {
        $('.editArtikel').on('click', function() {
            $('#artikelEditModal').modal('show');

        });
    });
</script>
<?php
include '../templateAdmin/footer.php';
?>
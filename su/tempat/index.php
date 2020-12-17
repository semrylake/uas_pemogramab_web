<?php
$title = "Sona Wisata | Tempat Wisata";
session_start();
require '../function.php';
if (!isset($_SESSION["login"])) {
    header("location: ../../login.php");
    exit;
}
if (isset($_POST["artikelEditModal"])) {
    var_dump("Tombol edit ditekan");
    die;
}
$jumdatph = 10;
$jumalldat = count(data("SELECT * FROM artikel"));
$jumhal = ceil($jumalldat / $jumdatph);
$aktpage = (isset($_GET["page"])) ? $_GET["page"] : 1;
$dtawl = ($jumdatph * $aktpage) - $jumdatph;

$artikel = data("SELECT * FROM artikel ORDER BY date_update DESC LIMIT $dtawl, $jumdatph");
include '../templateAdmin/header.php';
?>
<script src="http://localhost/utsweb2/assets/ckeditor/ckeditor.js"></script>
<?php
include '../templateAdmin/sidebar.php';
include '../templateAdmin/navigation.php';
include 'modalAdd.php';

?>
<div class=" container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Lokasi Wisata</h6>
        </div>
        <div class="card-body">
            <!-- Button trigger modal -->
            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#artikelAddModal" data-whatever="@mdo">
                <i class="fas fa-plus"></i> Tambah
            </button>
            <a class="btn" href="" style="border-color: black; margin-bottom: 1px;">
                <i class="fas fa-fw fa-retweet"></i> Refresh
            </a>

            </button>
            <div class="float-right">

            </div>
            <br>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <th>Foto</th>
                            <th>Author</th>
                            <th>Nama Tempat</th>
                            <th>Lokasi</th>
                            <th>Date Create</th>
                            <th>Time Create</th>
                            <th>Date Update</th>
                            <th>Time Update</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($artikel as $brs) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><img src="foto/<?= $brs['foto']; ?>" alt="" style="width: 100px;"></td>
                                <td><?= $brs["author"]; ?></td>
                                <td><?= $brs["tempat"]; ?></td>
                                <td><?= $brs["lokasi"]; ?></td>
                                <td><?= $brs["date_create"]; ?></td>
                                <td><?= $brs["time_create"]; ?></td>
                                <td><?= $brs["date_update"]; ?></td>
                                <td><?= $brs["time_update"]; ?></td>
                                <td><?= $brs["sts"]; ?></td>
                                <td>
                                    <a type="button" title="Detail" class='btn m-1 btn-success' href="detail.php?id=<?= $brs["id"]; ?>">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a type="button" title="Hapus" class='btn m-1 btn-danger' href="delete.php?id=<?= $brs["id"]; ?>" onclick="return confirm('Anda yakin ingin menghapus data ini');"><i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php $no++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <div class="text-center">
                    <span class="btn btn-primary">Halaman</span>
                    <div class="btn-group">
                        <?php if ($aktpage > 1) : ?>
                            <a href="?page=<?= $aktpage - 1; ?>" class="btn" style="border-color: black;"><i class="fas fa-angle-left"></i></a>
                        <?php endif; ?>
                        <?php for ($a = 1; $a <= $jumhal; $a++) : ?>
                            <?php if ($a == $aktpage) : ?>
                                <a href="?page=<?= $a; ?>" class="btn btn-success" style="font-weight: bold; border-color: black;"><?= $a; ?>
                                </a>
                            <?php else : ?>
                                <a href="?page=<?= $a; ?>" class="btn" style="border-color: black;"><?= $a; ?></a>
                            <?php endif; ?>
                        <?php endfor; ?>

                        <?php if ($aktpage < $jumhal) : ?>
                            <a href="?page=<?= $aktpage + 1; ?>" class="btn" style="border-color: black;"><i class="fas fa-angle-right"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include '../templateAdmin/footer2.php';
?>
<script>
    // Replace the <textarea id="isiBerita"> with a CKEditor 4
    // instance, using default configuration.
    CKEDITOR.replace('isiArtikel');
</script>

<?php
include '../templateAdmin/footer.php';
?>
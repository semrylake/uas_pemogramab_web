<?php
if (isset($_POST["saveArtikel"])) {

    if (addArtikel($_POST) > 0) {
        echo "
      <script>
        alert('Data berhasil disimpan');
        document.location.href = 'index.php';
      </script>
      ";
    } else {
        echo "
      <script>
        alert('Data gagal disimpan. Cek Primary key tidak boleh sama atau unik');
        document.location.href = 'index.php';
      </script>
      ";
    }
}
?>

<div class="modal fade" id="artikelAddModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Tambah Tempat Wisata</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" name="nama" id="nama" class="form-control" autofocus="true" autocomplete="off" placeholder="Nama Tempat Wisata" required>
                        </div>
                        <div class="form-group">
                            <input placeholder="Lokasi Tempat Wisata ( Desa/Kecamatan/Kabupaten )" type="text" name="lokasi" id="lokasi" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label><br>
                            <input type="file" name="foto" id="foto" required=""></div>
                        <div class="form-group">
                            <textarea name="isiArtikel" id="isiArtikel" rows="10" cols="100" required autocomplete="off"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" name="saveArtikel" class="btn btn-success">
                        <i class="fas fa-save" style="margin-right: 10px;"></i>Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
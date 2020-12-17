<?php
$knk = mysqli_connect("localhost", "root", "", "wisataweb");

//artikel wisata

function data($query)
{
    global $knk; //artinya variabel knk adalah variabel global/sama dengan variabel koneksi
    $result = mysqli_query($knk, $query);
    $rows   = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function upload()
{
    $filename = $_FILES['foto']['name'];
    $ukuran = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpname = $_FILES['foto']['tmp_name'];
    //cek adanya gambar
    if ($error === 4) {
        echo "<script>
                alert('Silahkan Upload Foto Terlebih Dulu');
                document.location.href = 'index.php';
                </script>";
        return false;
    }
    //cek tipe gambar
    $extnvld = ['jpg', 'png', 'jpeg', 'gif', 'bmp', 'ico'];
    $ekstfoto = explode('.', $filename);
    $ekstfoto = strtolower(end($ekstfoto));
    if (!in_array($ekstfoto, $extnvld)) {
        echo "<script>
                alert('Yang diupload bukan gambar');
                document.location.href = 'index.php';
                </script>";
        return false;
    }
    if ($ukuran > 5000000) {
        echo "<script>
                alert('Ukuran gambar terlalu besar');
                document.location.href = 'index.php';
                </script>";
        return false;
    }
    //generate nama baru
    $newfilename = uniqid();
    $newfilename .= '.';
    $newfilename .= $ekstfoto;
    $pindah = move_uploaded_file($tmpname, 'foto/' . $newfilename);
    if (!$pindah) {
        echo "<script>
                alert('Gambar gagal dipindahkan ke folder sistem');
                document.location.href = 'index.php';
                </script>";
        return false;
    }
    return $newfilename;
}
function addArtikel($a)
{
    global $knk;
    date_default_timezone_set("Asia/Jakarta");
    $nama  = htmlspecialchars($a["nama"]);
    $lokasi = htmlspecialchars($a["lokasi"]);
    $berita = htmlspecialchars($a["isiArtikel"]);
    $dateCreated =  date("Y-m-d");
    $timeCreated = date("H:i");
    $dateupdate =  date("Y-m-d");
    $timeUpdate = date("H:i");
    $foto  = upload();
    $sts = "no yet approved";
    $insert = "INSERT INTO artikel(id,tempat,lokasi,isi,foto,date_create,time_create,date_update,time_update,sts)
     VALUES ('','$nama','$lokasi','$berita','$foto','$dateCreated','$timeCreated','$dateupdate','$timeUpdate','$sts')";
    // var_dump($insert);    die;
    mysqli_query($knk, $insert);
    return mysqli_affected_rows($knk);
}
function deleteTempat($a)
{
    global $knk;
    $del = "DELETE FROM artikel WHERE id = '$a'";
    mysqli_query($knk, $del);
    return mysqli_affected_rows($knk);
}
function editArtikel($a)
{
    global $knk;
    $id = htmlspecialchars($a["id"]);
    $sts = htmlspecialchars($a["sts"]);
    $edit  = "UPDATE artikel SET 
                sts = '$sts'
                WHERE 
                id  = '$id'";
    //var_dump($edit);    die;
    mysqli_query($knk, $edit);
    return mysqli_affected_rows($knk);
}
function tambahLike($a)
{
    global $knk;
    $idArtikel = htmlspecialchars($a["idArt"]);
    $suka = htmlspecialchars($a["suka"]);
    $suka = $suka + 1;
    $edit  = "UPDATE artikel SET suka = '$suka' WHERE id  = '$idArtikel'";
    mysqli_query($knk, $edit);
    return mysqli_affected_rows($knk);
}
function uploadArtikel()
{
    $filename = $_FILES['foto']['name'];
    $ukuran = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpname = $_FILES['foto']['tmp_name'];
    //cek adanya gambar
    if ($error === 4) {
        echo "<script>
                alert('Silahkan Upload Foto Terlebih Dulu');
                document.location.href = 'index.php';
                </script>";
        return false;
    }
    //cek tipe gambar
    $extnvld = ['jpg', 'png', 'jpeg', 'gif', 'bmp', 'ico'];
    $ekstfoto = explode('.', $filename);
    $ekstfoto = strtolower(end($ekstfoto));
    if (!in_array($ekstfoto, $extnvld)) {
        echo "<script>
                alert('Yang diupload bukan gambar');
                document.location.href = 'index.php';
                </script>";
        return false;
    }
    if ($ukuran > 5000000) {
        echo "<script>
                alert('Ukuran gambar terlalu besar');
                document.location.href = 'index.php';
                </script>";
        return false;
    }
    //generate nama baru
    $newfilename = uniqid();
    $newfilename .= '.';
    $newfilename .= $ekstfoto;
    $pindah = move_uploaded_file($tmpname, 'su/tempat/foto/' . $newfilename);
    if (!$pindah) {
        echo "<script>
                alert('Gambar gagal dipindahkan ke folder sistem');
                document.location.href = 'index.php';
                </script>";
        return false;
    }
    return $newfilename;
}
function addArtikelUS($a)
{
    global $knk;
    date_default_timezone_set("Asia/Jakarta");
    $author = htmlspecialchars($a["author"]);
    $nama  = htmlspecialchars($a["nama"]);
    $lokasi = htmlspecialchars($a["lokasi"]);
    $berita = htmlspecialchars($a["isiArtikel"]);
    $dateCreated =  date("Y-m-d");
    $timeCreated = date("H:i");
    $dateupdate =  date("Y-m-d");
    $timeUpdate = date("H:i");
    $foto  = uploadArtikel();
    $insert = "INSERT INTO artikel(id,author,tempat,lokasi,isi,foto,date_create,time_create,date_update,time_update)
     VALUES ('','$author','$nama','$lokasi','$berita','$foto','$dateCreated','$timeCreated','$dateupdate','$timeUpdate')";
    // var_dump($insert);    die;
    mysqli_query($knk, $insert);
    return mysqli_affected_rows($knk);
}

function searchArt($aa)
{
    $cari = "SELECT * FROM artikel WHERE
        author LIKE '%$aa%' OR
        tempat LIKE '%$aa%' OR
        lokasi LIKE '%$aa%' OR
        isi LIKE '%$aa%' OR
        date_create LIKE '%$aa%' OR
        date_update LIKE '%$aa%'
        ";
    return data($cari);
}

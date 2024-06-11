<?php
if (!isset($_SESSION['level']) || $_SESSION['level'] == 'user') {
    echo '<script>window.location = "index.php";</script>';
}
require_once('./class/class.Workshop.php');
$objWorkshop = new Workshop();
if (isset($_POST['btnSubmit'])) {
    $objWorkshop->nama_workshop = $_POST['nama_workshop'];
    $objWorkshop->nama_kategori = $_POST['kategori'];
    $objWorkshop->deskripsi = $_POST['des_workshop'];
    $objWorkshop->benefit = $_POST['benefit_workshop'];
    $objWorkshop->tanggal_pelaksanaan = $_POST['tgl'];
    $objWorkshop->waktu = $_POST['waktu'];
    $objWorkshop->tempat_pelaksanaan = $_POST['tempat'];
    $objWorkshop->nama_provinsi = $_POST['provinsi'];

    $tipe_file = $_FILES['fupload']['type'];
    $lokasi_file = $_FILES['fupload']['tmp_name'];
    $nama_file = $_FILES['fupload']['name'];
    $ukuran_file = $_FILES['fupload']['size'];
    $folder = './upload/';
    if ($tipe_file != "image/jpg" and $tipe_file != "image/jpeg" and $tipe_file != "image/png") {
        // echo "<script>window.location = 'index.php?p=form_workshop'</script>";
    } else {
        $isSuccessUpload = move_uploaded_file($lokasi_file, $folder . $nama_file);
        $objWorkshop->gambar = $nama_file;
        if ($isSuccessUpload) {
            // echo "Nama File : $nama_file sukses diupload<br/>";
            // echo "Ukuran File : $ukuran_file bytes";
        }
    }

    if (isset($_GET['id_workshop'])) {
        $objWorkshop->id_workshop = $_GET['id_workshop'];
        $objWorkshop->UpdateWorkshop();
    } else {
        $objWorkshop->AddWorkshop();
    }
    echo "<script> alert('$objWorkshop->message'); </script>";
    if ($objWorkshop->hasil) {
        // echo '<script> window.location = "index.php?p=dashboard_admin";</script>';
    }
} else if (isset($_GET['id_workshop'])) {
    $objWorkshop->id_workshop = $_GET['id_workshop'];
    $objWorkshop->SelectOneWorkshop();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="card shadow rounded-3 my-5 bg-white border-0 p-5">
            <h1 class="fw-bold fs-1 text-center">Unggah Workshop</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama Workshop <span
                            style="color: red;">*</span></label>
                    <input type="text" name="nama_workshop" value="<?= $objWorkshop->nama_workshop ?>"
                        class="form-control" id="exampleFormControlInput1" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Kategori <span
                            style="color: red;">*</span></label>
                    <select name="kategori" class="form-select" aria-label="Default select example">
                        <option selected disabled>Pilih kategori</option>
                        <?php
                        require_once('./class/class.Kategori.php');
                        $objKategori = new Kategori();
                        $arrayResult = $objKategori->SelectAllKategori();

                        if (count($arrayResult) == 0) {
                            echo '<tr><td colspan="5">Tidak Ada Data!</td></tr>';
                        } else {
                            $no = 1;
                            foreach ($arrayResult as $dataKategori) {
                                if($dataKategori->id_kategori == $objWorkshop->nama_kategori) {
                                    echo '<option value=' . $dataKategori->id_kategori . ' selected>' . $dataKategori->nama_kategori . '</option>';
                                } else {
                                    echo '<option value=' . $dataKategori->id_kategori . '>' . $dataKategori->nama_kategori . '</option>';
                                }
                                $no++;
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Gambar Flyer Workshop <span
                            style="color: red;">*</span></label>
                    <input class="form-control" type="file" name="fupload" value="<?= $objWorkshop->gambar ?>"
                        id="formFile">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi <span
                            style="color: red;">*</span></label>
                    <textarea name="des_workshop" class="form-control" id="exampleFormControlTextarea1"
                        rows="3"><?= $objWorkshop->deskripsi ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea2" class="form-label">Benefit <span
                            style="color: red;">*</span></label>
                    <textarea name="benefit_workshop" class="form-control" id="exampleFormControlTextarea2"
                        rows="3"><?= $objWorkshop->benefit ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tanggal Pelaksanaan <span
                            style="color: red;">*</span></label>
                    <input type="date" name="tgl" value="<?= $objWorkshop->tanggal_pelaksanaan ?>" class="form-control"
                        id="exampleFormControlInput1" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Waktu Pelaksanaan <span
                            style="color: red;">*</span></label>
                    <input type="text" name="waktu" value="<?= $objWorkshop->waktu ?>" class="form-control"
                        id="exampleFormControlInput1" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tempat Pelaksanaan <span
                            style="color: red;">*</span></label>
                    <input type="text" name="tempat" value="<?= $objWorkshop->tempat_pelaksanaan ?>"
                        class="form-control" id="exampleFormControlInput1" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Provinsi <span
                            style="color: red;">*</span></label>
                    <select name="provinsi" class="form-select" aria-label="Default select example">
                        <option selected disabled>Pilih provinsi</option>
                        <?php
                        require_once('./class/class.Provinsi.php');
                        $objProvinsi = new Provinsi();
                        $arrayResult = $objProvinsi->SelectAllProvinsi();

                        if (count($arrayResult) == 0) {
                            echo '<tr><td colspan="5">Tidak Ada Data!</td></tr>';
                        } else {
                            $no = 1;
                            foreach ($arrayResult as $dataProvinsi) {
                                if($dataProvinsi->id_provinsi == $objWorkshop->nama_provinsi) {
                                    echo '<option value=' . $dataProvinsi->id_provinsi . ' selected>' . $dataProvinsi->nama_provinsi . '</option>';
                                } else {
                                    echo '<option value=' . $dataProvinsi->id_provinsi . '>' . $dataProvinsi->nama_provinsi . '</option>';
                                }
                                $no++;
                            }
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" name="btnSubmit" class="btn"
                    style="background-color: #D61C4E; color: white; width: 100%;">Simpan</button>
                <a href="index.php?p=form_workshop" class="btn border border-dark mt-2" style="width: 100%;">Reset</a>
            </form>
        </div>
    </div>
</body>

</html>
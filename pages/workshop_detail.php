<?php
require_once('./class/class.Workshop.php');
$objWorkshop = new Workshop();
if (isset($_GET['id_workshop'])) {
    $objWorkshop->id_workshop = $_GET['id_workshop'];
    $objWorkshop->SelectOneWorkshop();
}

require_once('./class/class.Pendaftar.php');
$objPendaftar = new Pendaftar();
if (isset($_POST['btnSubmit'])) {
    $objPendaftar->id_user = $_SESSION["id_user"];
    $objPendaftar->id_workshop = $objWorkshop->id_workshop;
    $objPendaftar->status = 'pending';
    $objPendaftar->AddPendaftar();
    echo "<script> alert('$objPendaftar->message'); </script>";
    if ($objPendaftar->hasil) {
        echo '<script> window.location = "index.php";</script>';
    }
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
    <div class="container my-5">
        <h3>Judul Workshop</h3>
        <img src="./upload/<?= $objWorkshop->gambar ?>" class="d-flex" style="margin: auto;" width="500" />
        <h3>Deskripsi</h3>
        <p><?= $objWorkshop->deskripsi ?></p>
        <h3>Benefit</h3>
        <p><?= $objWorkshop->benefit ?></p>
        <h3>Pelaksanaan</h3>
        <ul style="list-style-type: none; padding: 0; margin: 0;">
            <li>Hari, Tanggal : <?= $objWorkshop->tanggal_pelaksanaan ?></li>
            <li>Pukul : <?= $objWorkshop->waktu ?></li>
            <li>Tempat : <?= $objWorkshop->tempat ?></li>
        </ul>
        <form class="mt-5" action="" method="post">
            <?php
            if (!isset($_SESSION['level']) || $_SESSION['level'] == 'admin') {
                echo '<button type="button" class="btn" disabled
                        style="background-color: #D61C4E; color: white; width: 100%;">Daftar
                        Sekarang!</button>';
            } else {
                echo '<button type="submit" name="btnSubmit" class="btn"
                style="background-color: #D61C4E; color: white; width: 100%;">Daftar
                Sekarang!</button>';
            }
            ?>
            <!-- <button type="button" class="btn" disabled
                style="background-color: #D61C4E; color: white; width: 100%;">Daftar
                Sekarang!</button> -->
        </form>
    </div>
</body>

</html>
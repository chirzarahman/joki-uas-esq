<?php
if (!isset($_SESSION['level']) || $_SESSION['level'] == 'user') {
    echo '<script>window.location = "index.php";</script>';
}
require_once('./class/class.Pendaftar.php');
$objPendaftar = new Pendaftar();
if (isset($_GET['no_id'])) {
    $objPendaftar->no_id = $_GET['no_id'];
    $objPendaftar->SelectOnePendaftar();
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
        <h3>Detail Pendaftar</h3>
        <ul style="list-style-type: none; padding: 0; margin: 0;">
            <li>Nama : <?= $objPendaftar->username ?></li>
            <li>Email : <?= $objPendaftar->email ?></li>
            <li>Nama Pendaftar : <?= $objPendaftar->nama_workshop ?></li>
            <li>Tanggal Pelaksanaan : <?= $objPendaftar->tanggal_pelaksanaan ?></li>
            <li>Status : <?= $objPendaftar->status ?></li>
        </ul>
    </div>
</body>

</html>
<?php
require_once('./class/class.Pendaftar.php');
$objPendaftar = new Pendaftar();
$objPendaftar->status = 'ditolak';
if (isset($_GET['no_id'])) {
    $objPendaftar->no_id = $_GET['no_id'];
    $objPendaftar->UpdatePendaftar();
} else {
    echo "<script> alert('$objPendaftar->message'); </script>";
}
echo "<script> alert('$objPendaftar->message'); </script>";
if ($objPendaftar->hasil) {
    echo '<script> window.location = "index.php?p=admin_pendaftarlist";</script>';
}
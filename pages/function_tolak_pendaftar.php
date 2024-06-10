<?php
if (!isset($_SESSION['level']) || $_SESSION['level'] == 'user') {
    echo '<script>window.location = "index.php";</script>';
}
require_once ('./class/class.Pendaftar.php');

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tls";
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->Username = "kinantykusuma@students.esqbs.ac.id";
$mail->Password = "Kinkusuma215";
$mail->From = "kinantykusuma@students.esqbs.ac.id";
$mail->FromName = "Kinanty Kusuma";
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->WordWrap = 50;
$mail->IsHTML(true);

$mail->AddAddress($_GET['email'], 'paijo');
$mail->Subject = 'test';
$mail->Body = 'test';
$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
$mail->SMTP = 0;
if (!$mail->Send()) {
    echo "Message could not be sent";
    echo "Mailer Error: " . $mail->ErrorInfo;
    exit;
}
exit;
// echo '<script> window.location = "index.php?p=admin_pendaftarlist";</script>';
// $objPendaftar = new Pendaftar();
// $objPendaftar->status = 'ditolak';
// if (isset($_GET['no_id'])) {
//     $objPendaftar->no_id = $_GET['no_id'];
//     $objPendaftar->UpdatePendaftar();
// } else {
//     echo "<script> alert('$objPendaftar->message'); </script>";
// }
// echo "<script> alert('$objPendaftar->message'); </script>";
// if ($objPendaftar->hasil) {
//     echo '<script> window.location = "index.php?p=admin_pendaftarlist";</script>';
// }
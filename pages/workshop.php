<?php
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <h4 class="title"><span class="text"><strong>Workshop</strong></span></h4>
        <form action="">
            <table class="table">
                <tr>
                    <td>Nama Workshop</td>
                    <td>:</td>
                    <td><textarea class="form-control" readonly cols="19"
                            rows="3"><?= $objPendaftar->nama_workshop; ?></textarea></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td><input type="text" class="form-control" readonly value="<?= $objPendaftar->status; ?>" />
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td>
                        <a href="index.php?p=workshoplist" class="btn btn-warning">Kembali</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
</script>

</html>
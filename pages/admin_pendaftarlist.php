<?php
if (!isset($_SESSION['level']) || $_SESSION['level'] == 'user') {
    echo '<script>window.location = "index.php";</script>';
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
        <h4 class="title">
            <div class="text d-flex gap-4">
                <a href="index.php?p=dashboard_admin" style="text-decoration: none;">Workshop List</a>
                <a href="index.php?p=admin_pendaftarlist">Pendaftar</a>
            </div>
        </h4>
        <table class="table table-bordered mt-5">
            <tr>
                <th>No.</th>
                <th>Nama Pendaftar</th>
                <th>Email</th>
                <th>Nama Workshop</th>
                <th>Tanggal Pelaksanaan</th>
                <th>Status</th>
                <th class="text-center">Aksi</th>
            </tr>
            <?php
            require_once('./class/class.Pendaftar.php');
            $objPendaftar = new Pendaftar();
            $arrayResult = $objPendaftar->SelectAllPendaftar();

            if (count($arrayResult) == 0) {
                echo '<tr><td colspan="7">Tidak Ada Data!</td></tr>';
            } else {
                $no = 1;
                foreach ($arrayResult as $dataPendaftar) {
                    echo '<tr>';
                    echo '<td>' . $no . '</td>';
                    echo '<td>' . $dataPendaftar->username . '</td>';
                    echo '<td>' . $dataPendaftar->email . '</td>';
                    echo '<td>' . $dataPendaftar->nama_workshop . '</td>';
                    echo '<td>' . $dataPendaftar->tanggal_pelaksanaan . '</td>';
                    echo '<td>' . $dataPendaftar->status . '</td>';
                    echo '<td class="text-center"><a class="btn btn-warning me-2" href="index.php?p=admin_pendaftar_detail&no_id=' . $dataPendaftar->no_id . '">Lihat</a>';
                    if ($dataPendaftar->status == 'diterima') {
                        echo '';
                    } else {
                        echo '<a class="btn btn-success me-2" href="index.php?p=function_terima_pendaftar&no_id=' . $dataPendaftar->no_id . '&email=' . $dataPendaftar->email . '" on click="return confirm(\'Apakah yakin ingin terima tiket ini?\')">Terima</a>';
                    }
                    // echo '<a class="btn btn-danger" href="index.php?p=function_tolak_pendaftar&no_id=' . $dataPendaftar->no_id . '&email=' . $dataPendaftar->email . '" on click="return confirm(\'Apakah yakin ingin tolak tiket ini?\')">Tolak</a></td>';
                    // if($dataPendaftar->status == 'pending'){
                    //     echo "masih pending";
                    // } else if($dataPendaftar->status == 'diterima'){
                    //     echo "sudah diterima";
                    // } else {
                    //     echo "sudah ditolak";
                    // }
                    echo '</tr>';
                    $no++;
                }
            }
            ?>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>
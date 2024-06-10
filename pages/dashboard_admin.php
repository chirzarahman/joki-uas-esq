<?php
if (!isset($_SESSION['level'])) {
    echo '<script>window.location = "index.php";</script>';
}
require_once ('./class/class.Workshop.php');
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
                <a href="index.php?p=dashboard_admin">Workshop List</a>
                <a href="index.php?p=admin_pendaftarlist" style="text-decoration: none;">Pendaftar</a>
            </div>
        </h4>
        <a class=" btn btn-primary my-3" href="index.php?p=form_workshop" style="background-color: #293462;">Unggah
            Workshop</a>
        <table class="table table-bordered">
            <tr>
                <th>No.</th>
                <th>Nama Workshop</th>
                <th>Kategori</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Tempat</th>
                <th class="text-center">Aksi</th>
            </tr>
            <?php
                    require_once('./class/class.Workshop.php');
                    $objWorkshop = new Workshop();
                    $arrayResult = $objWorkshop->SelectAllWorkshop();

                    if (count($arrayResult) == 0) {
                        echo '<tr><td colspan="7">Tidak Ada Data!</td></tr>';
                    } else {
                        $no = 1;
                        foreach ($arrayResult as $dataWorkshop) {
                            echo '<tr>';
                            echo '<td>' . $no . '</td>';
                            echo '<td>' . $dataWorkshop->nama_workshop . '</td>';
                            echo '<td>' . $dataWorkshop->kategori . '</td>';
                            echo '<td>' . $dataWorkshop->tanggal_pelaksanaan . '</td>';
                            echo '<td>' . $dataWorkshop->waktu . '</td>';
                            echo '<td>' . $dataWorkshop->tempat_pelaksanaan . '</td>';
                            echo '<td class="text-center"><a class="btn btn-warning me-2" href="index.php?p=form_workshop&id_workshop=' . $dataWorkshop->id_workshop . '">Edit</a><a class="btn btn-danger" href="index.php?p=deleteworkshop&id_workshop=' . $dataWorkshop->id_workshop . '" on click="return confirm(\'Apakah yakin ingin menghapus?\')">Delete</a></td>';
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
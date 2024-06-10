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
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Launch demo modal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content p-5 text-center">
                    <h3>Workshop Berhasil Di Unggah!</h3>
                    <p>Workshop mu akan diproses maksimal 3 x 24 jam
                        oleh tim GrowUp! Tunggu email konfirmasinya:)</p>
                    <button type="button" class="btn my-3" style="background-color: #FEB139;"
                        data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
        <h4 class="title">
            <span class="text">
                <strong>Workshop List</strong>
            </span>
        </h4>
        <table class="table table-bordered">
            <tr>
                <th>No.</th>
                <th>Nama Workshop</th>
                <th>Status</th>
                <th></th>
            </tr>
            <?php
            require_once('./class/class.Pendaftar.php');
            $objPendaftar = new Pendaftar();
            $arrayResult = $objPendaftar->SelectAllPendaftar();

            if (count($arrayResult) == 0) {
                echo '<tr><td colspan="5">Tidak Ada Data!</td></tr>';
            } else {
                $no = 1;
                foreach ($arrayResult as $dataPendaftar) {
                    echo '<tr>';
                    echo '<td>' . $no . '</td>';
                    echo '<td>' . $dataPendaftar->nama_workshop . '</td>';
                    echo '<td>' . $dataPendaftar->status . '</td>';
                    echo '<td class="text-center"><a class="btn btn-warning me-2" href="index.php?p=workshop&no_id=' . $dataPendaftar->no_id . '">Lihat</a></td>';
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
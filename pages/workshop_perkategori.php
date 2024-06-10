<?php
require_once('./class/class.Workshop.php');
$objWorkshop = new Workshop();
if (isset($_GET['id_kategori'])) {
    $arrayResult = $objWorkshop->SelectWorkshopByKategori($_GET['id_kategori']);
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
    <div class="container mb-5">
        <div class="row g-0">
            <div class="col-md-6 py-5 d-flex align-items-center">
                <h1 class="fw-bold fs-1">TEMUKAN WORKSHOP
                    SESUAI PASSIONMU!</h1>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <img src="./assets/workshop1.png" alt="Image 1" height="450">
            </div>
        </div>

        <div>
            <div>
                <div class="d-flex justify-content-between">
                    <h3 class="mb-3 fw-semibold">Public Speaking</h3>
                    <a href="#">Lihat Semuanya</a>
                </div>
                <div>
                    <?php
                    if (count($arrayResult) == 0) {
                        echo '<p>Tidak Ada Data!</p>';
                    } else {
                        $no = 1;
                        foreach ($arrayResult as $dataWorkshop) {
                            echo '<div class="d-flex justify-content-center">
                                    <div class="card mb-3 shadow-sm" style="max-width: 70%;">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <p>Image</p>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title">'. $dataWorkshop->nama_workshop . '</h5>
                                                    <p class="card-text">'. $dataWorkshop->deskripsi . '</p>
                                                    <a href="index.php?p=workshop_detail&id_workshop='. $dataWorkshop->id_workshop . '" class="btn btn-warning"
                                                        style="color: white;">Lihat Detail</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                            $no++;
                        }
                    }
                    ?>
                    <!-- <div class="d-flex justify-content-center">
                        <div class="card mb-3 shadow-sm" style="max-width: 70%;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <p>Image</p>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a wider card with supporting text below
                                            as a
                                            natural
                                            lead-in to additional content. This content is a little bit
                                            longer.</p>
                                        <a href="index.php?p=workshop_detail" class="btn btn-warning"
                                            style="color: white;">Lihat Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="card mb-3 shadow-sm" style="max-width: 70%;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <p>Image</p>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a wider card with supporting text below
                                            as a
                                            natural
                                            lead-in to additional content. This content is a little bit
                                            longer.</p>
                                        <a href="#" class="btn btn-warning" style="color: white;">Lihat
                                            Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>
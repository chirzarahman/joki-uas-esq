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
            <div class="row gap-2">
                <?php
                require_once ('./class/class.Workshop.php');
                $objWorkshop = new Workshop();
                $arrayResult = $objWorkshop->SelectAllWorkshop();

                if (count($arrayResult) == 0) {
                    echo '<p>Tidak Ada Data!</p>';
                } else {
                    foreach ($arrayResult as $dataWorkshop) {
                        echo '<div class="col">
                    <div class="card shadow-sm text-center" style="width: 18rem;">
                        <img src="./upload/' . $dataWorkshop->gambar . '"/>
                        <div class="card-body">
                            <h5 class="card-title mb-3">'. $dataWorkshop->nama_workshop . '</h5>
                            <a href="index.php?p=workshop_detail&id_workshop='. $dataWorkshop->id_workshop. '"class="btn btn-primary" style="color: white;">Selengkapnya</a>
                        </div>
                    </div>
                </div>';
                    }
                }
                ?>
                <!-- <div class="col">
                    <div class="card shadow-sm text-center" style="width: 18rem;">
                        <p>Image</p>
                        <div class="card-body">
                            <h5 class="card-title mb-3">Card title</h5>
                            <a href="#" class="btn btn-primary" style="color: white;">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm text-center" style="width: 18rem;">
                        <p>Image</p>
                        <div class="card-body">
                            <h5 class="card-title mb-3">Card title</h5>
                            <a href="#" class="btn btn-primary" style="color: white;">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm text-center" style="width: 18rem;">
                        <p>Image</p>
                        <div class="card-body">
                            <h5 class="card-title mb-3">Card title</h5>
                            <a href="#" class="btn btn-primary" style="color: white;">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm text-center" style="width: 18rem;">
                        <p>Image</p>
                        <div class="card-body">
                            <h5 class="card-title mb-3">Card title</h5>
                            <a href="#" class="btn btn-primary" style="color: white;">Selengkapnya</a>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</body>

</html>
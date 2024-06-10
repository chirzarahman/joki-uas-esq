<?php
require "inc.koneksi.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GrowUp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-light px-5">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="./assets/logo.jpg" alt="Logo" width="103">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item pe-4">
                            <a class="nav-link active fw-medium" aria-current="page" href="index.php">Beranda</a>
                        </li>
                        <!-- <li class="nav-item pe-4">
                            <a class="nav-link fw-medium" href="index.php?p=tentang_kami">Tentang Kami</a>
                        </li> -->
                        <li class="nav-item pe-4">
                            <a class="nav-link fw-medium" href="index.php?p=workshop_page">Workshop</a>
                        </li>
                        <?php
                        if (!isset($_SESSION['level'])) {
                        ?>
                        <li class="nav-item pe-4 d-flex">
                            <a class="nav-link fw-medium" href="index.php?p=register">Daftar/</a>
                            <a href="index.php?p=login" class="nav-link btn rounded-5"
                                style="background-color: #FEB139; text-decoration: none;">Masuk</a>
                        </li>
                        <?php
                        } else {
                        ?>
                        <li class="nav-item pe-4">
                            <div class="d-flex align-items-center">
                                <?php
                                    if (isset($_SESSION['level'])) {
                                        switch ($_SESSION['level']) {
                                            case 'admin':
                                    ?>
                                <a href="index.php?p=dashboard_admin" class="d-flex nav-link gap-2">
                                    <label style="color: black;"><?= $_SESSION['nama_admin'] ?></label>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#8D8D8D">
                                        <path
                                            d="M234-276q51-39 114-61.5T480-360q69 0 132 22.5T726-276q35-41 54.5-93T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 59 19.5 111t54.5 93Zm246-164q-59 0-99.5-40.5T340-580q0-59 40.5-99.5T480-720q59 0 99.5 40.5T620-580q0 59-40.5 99.5T480-440Zm0 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q53 0 100-15.5t86-44.5q-39-29-86-44.5T480-280q-53 0-100 15.5T294-220q39 29 86 44.5T480-160Zm0-360q26 0 43-17t17-43q0-26-17-43t-43-17q-26 0-43 17t-17 43q0 26 17 43t43 17Zm0-60Zm0 360Z" />
                                    </svg>
                                </a>
                                <?php
                                                break;

                                            case 'user':
                                            ?>
                                <a href="index.php?p=profile" class="d-flex nav-link gap-2">
                                    <label style="color: black;"><?= $_SESSION['username'] ?></label>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#8D8D8D">
                                        <path
                                            d="M234-276q51-39 114-61.5T480-360q69 0 132 22.5T726-276q35-41 54.5-93T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 59 19.5 111t54.5 93Zm246-164q-59 0-99.5-40.5T340-580q0-59 40.5-99.5T480-720q59 0 99.5 40.5T620-580q0 59-40.5 99.5T480-440Zm0 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q53 0 100-15.5t86-44.5q-39-29-86-44.5T480-280q-53 0-100 15.5T294-220q39 29 86 44.5T480-160Zm0-360q26 0 43-17t17-43q0-26-17-43t-43-17q-26 0-43 17t-17 43q0 26 17 43t43 17Zm0-60Zm0 360Z" />
                                    </svg>
                                </a>
                                <?php
                                                break;
                                        }
                                    }
                                    ?>
                                <a href="index.php?p=logout" class="btn btn-danger ms-2"
                                    style="color: white;">Logout</a>
                                <!-- <form action="index.php?p=logout">
                                                <button type="submit" class="btn btn-danger ms-2"
                                                    style="color: white;">Logout</button>
                                            </form> -->
                            </div>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <?php
        $pages_dir = 'pages';
        if (!empty($_GET['p'])) {
            $pages = scandir($pages_dir, 0);
            unset($pages[0], $pages[1]);

            $p = $_GET['p'];
            if (in_array($p . '.php', $pages)) {
                include($pages_dir . '/' . $p . '.php');
            } else {
                echo 'Halaman tidak ditemukan!:(';
            }
        } else {
            include($pages_dir . '/beranda.php');
        }
        ?>
    </main>
    <footer>
        <div class="container-fluid text-light py-5 mt-auto" style="background-color: #293462;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-4">
                        <ul style="list-style-type: none;">
                            <li>
                                <h4>GrowUp</h4>
                            </li>
                            <li>About Us</li>
                            <li>Program</li>
                            <li>Partnership</li>
                            <li>Privacy Policy</li>
                        </ul>
                    </div>
                    <div class="col-4">
                        <ul style="list-style-type: none;">
                            <li>
                                <h4>Contact Us</h4>
                                <p>Monday - Sunday @ 08.00 - 17.00</p>
                            </li>
                            <li>+62 878-2423-0628</li>
                            <li>growup@gmail.com</li>
                            <li>@grow_up</li>
                        </ul>
                    </div>
                    <div class="col-4">
                        <h4>Office</h4>
                        <span class="fs-4">Menara 165</span>
                        <p>Jl. TB Simatupang, RT.3/RW.3, Cilandak Tim., Ps. Minggu, Kota Jakarta Selatan, Daerah Khusus
                            Ibukota Jakarta 12560</p>
                    </div>
                </div>
            </div>
            <div class="text-center mt-3">
                <h3>Copyright&copy; 2024</h3>
                <p class="fw-light">Kelompok KNKR</p>
            </div>
        </div>
    </footer>
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
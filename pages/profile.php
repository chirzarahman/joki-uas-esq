<?php
if (!isset($_SESSION['level'])) {
    echo '<script>window.location = "index.php";</script>';
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
    <div class="container">
        <div class="d-flex justify-content-center">
            <a href="index.php?p=edit_profile&id_user=<?= $_SESSION["id_user"] ?>"
                class="card my-5 bg-white border-1 pe-5"
                style="min-width: 52%; border: solid #D61C4E; text-decoration: none;">
                <div class="d-flex align-items-center">
                    <img src="./assets/profile1.png" alt="Image 1" height="250">
                    <h1 class="fw-bold fs-1 text-center">Profil</h1>
                </div>
            </a>
        </div>

        <div class="d-flex justify-content-center">
            <a href="index.php?p=workshoplist" class="card mb-5 bg-white border-1 pe-5"
                style="max-width: 70%; border: solid #D61C4E; text-decoration: none;">
                <div class="d-flex align-items-center">
                    <img src="./assets/profile1.png" alt="Image 1" height="250">
                    <h1 class="fw-bold fs-1">Atur Workshopmu</h1>
                </div>
            </a>
        </div>
    </div>
</body>

</html>
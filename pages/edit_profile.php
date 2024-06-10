<?php
if (!isset($_SESSION['level'])) {
    echo '<script>window.location = "index.php";</script>';
}
require_once('./class/class.Users.php');
$objUsers = new Users();
if (isset($_POST['btnSubmit'])) {
    $objUsers->username = $_POST["username"];
    $objUsers->email = $_POST["email"];
    $objUsers->dob = $_POST["dob"];
    $objUsers->no_wa = $_POST["no_wa"];
    $objUsers->jenjang_pendidikan = $_POST["jenjang_pendidikan"];
    $objUsers->provinsi = $_POST["provinsi"];
    $objUsers->institusi = $_POST["institusi"];

    if (isset($_GET['id_user'])) {
        $objUsers->id_user = $_GET['id_user'];
        $objUsers->UpdateProfile();
    }
    echo "<script> alert('$objUsers->message'); </script>";
    if ($objUsers->hasil) {
        echo '<script> window.location = "index.php?p=profile";</script>';
    }
} else if (isset($_GET['id_user'])) {
    $objUsers->id_user = $_GET['id_user'];
    $objUsers->SelectOneProfile();
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
        <div class="card shadow rounded-3 my-5 bg-white border-0 p-5">
            <h1 class="fw-bold fs-1 text-center mb-5">Profil</h1>
            <form action="" method="post">
                <div class="row">
                    <div class="col">
                        <label for="exampleFormControlInput1" class="form-label">Email <span
                                style="color: red;">*</span></label>
                        <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                            placeholder="" value="<?= $objUsers->email ?>">
                    </div>
                    <div class="col">
                        <label for="exampleFormControlInput1" class="form-label">Provinsi <span
                                style="color: red;">*</span></label>
                        <select class="form-select" name="provinsi" aria-label="Default select example">
                            <option selected disabled>Pilih provinsi</option>
                            <?php
                            require_once('./class/class.Provinsi.php');
                            $objProvinsi = new Provinsi();
                            $arrayResult = $objProvinsi->SelectAllProvinsi();

                            if (count($arrayResult) == 0) {
                                echo '<tr><td colspan="5">Tidak Ada Data!</td></tr>';
                            } else {
                                foreach ($arrayResult as $dataProvinsi) {
                                    if($dataProvinsi->id_provinsi == $objUsers->provinsi) {
                                        echo '<option value=' . $dataProvinsi->id_provinsi . ' selected>' . $dataProvinsi->nama_provinsi . '</option>';
                                        
                                    } else {
                                        echo '<option value=' . $dataProvinsi->id_provinsi . '>' . $dataProvinsi->nama_provinsi . '</option>';
                                    }
                                    // if(!$objUsers->provinsi){
                                    // } else {
                                    //     echo '<option value=' . $dataProvinsi->id_provinsi . ' selected>' . $dataProvinsi->nama_provinsi . '</option>';
                                    // }
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Username <span
                            style="color: red;">*</span></label>
                    <input type="text" name="username" class="form-control" id="exampleFormControlInput1" placeholder=""
                        value="<?= $objUsers->username ?>">
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label for="exampleFormControlInput1" class="form-label">Institusi <span
                                style="color: red;">*</span></label>
                        <input type="text" name="institusi" class="form-control" id="exampleFormControlInput1"
                            placeholder="" value="<?= $objUsers->institusi ?>">
                    </div>
                    <div class="col">
                        <label for="exampleFormControlInput1" class="form-label">Birth Date <span
                                style="color: red;">*</span></label>
                        <input type="date" name="dob" class="form-control" id="exampleFormControlInput1" placeholder=""
                            value="<?= $objUsers->dob ?>">
                    </div>
                </div>
                <div class="row mt-3 mb-5">
                    <div class="col">
                        <label for="exampleFormControlInput1" class="form-label">Jenjang Pendidikan <span
                                style="color: red;">*</span></label>
                        <select name="jenjang_pendidikan" class="form-select" aria-label="Default select example">
                            <option selected disabled>Pilih jenjang pendidikan</option>
                            <?php
                            require_once('./class/class.JenjangPendidikan.php');
                            $objJenjangPendidikan = new JenjangPendidikan();
                            $arrayResult = $objJenjangPendidikan->SelectAllJenjangPendidikan();

                            if (count($arrayResult) == 0) {
                                echo '<tr><td colspan="5">Tidak Ada Data!</td></tr>';
                            } else {
                                foreach ($arrayResult as $dataJenjangPendidikan) {
                                    if($dataJenjangPendidikan->id_jp == $objUsers->jenjang_pendidikan) {
                                        echo '<option value=' . $dataJenjangPendidikan->id_jp . ' selected>' . $dataJenjangPendidikan->nama_jp . '</option>';
                                    } else {
                                        echo '<option value=' . $dataJenjangPendidikan->id_jp . '>' . $dataJenjangPendidikan->nama_jp . '</option>';
                                    }
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="exampleFormControlInput1" class="form-label">No. WA <span
                                style="color: red;">*</span></label>
                        <input type="text" name="no_wa" class="form-control" id="exampleFormControlInput1"
                            placeholder="" value="<?= $objUsers->no_wa ?>">
                    </div>
                </div>
                <button type="submit" name="btnSubmit" class="btn"
                    style="background-color: #D61C4E; color: white; width: 100%;">Simpan</button>
                <a href="index.php?p=edit_profile" class="btn border border-dark mt-2" style="width: 100%;">Reset</a>
            </form>
        </div>
    </div>
</body>

</html>
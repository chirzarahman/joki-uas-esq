<?php
require_once('./class/class.Users.php');
if (isset($_POST['btnSubmit'])) {
    $inputemail = $_POST["email"];
    $objUsers = new Users();
    $objUsers->ValidateEmail($inputemail);
    if ($objUsers->hasil) {
        echo "<script>alert('Email sudah terdaftar'); </script>";
    } else {
        $objUsers->username = $_POST["username"];
        $objUsers->email = $_POST["email"];
        // $inputpassword = $_POST["password"];
        $objUsers->password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $objUsers->dob = $_POST["dob"];
        $objUsers->no_wa = $_POST["no_wa"];
        $objUsers->jenjang_pendidikan = $_POST["jenjang_pendidikan"];
        $objUsers->provinsi = $_POST["provinsi"];
        $objUsers->institusi = $_POST["institusi"];
        $objUsers->AddUsers();
        if ($objUsers->hasil) {
            echo "<script> alert('Registrasi berhasil'); </script>";
            echo '<script> window.location="index.php?p=login"; </script>';
        }
    }
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
            <h1 class="fw-bold fs-1 text-center mb-5">Register</h1>
            <form action="" method="post">
                <div class="row">
                    <div class="col">
                        <label for="exampleFormControlInput1" class="form-label">Email <span
                                style="color: red;">*</span></label>
                        <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                            placeholder="">
                    </div>
                    <div class="col">
                        <label for="exampleFormControlInput1" class="form-label">Provinsi <span
                                style="color: red;">*</span></label>
                        <select name="provinsi" class="form-select" aria-label="Default select example">
                            <option selected disabled>Pilih provinsi</option>
                            <?php
                            require_once('./class/class.Provinsi.php');
                            $objProvinsi = new Provinsi();
                            $arrayResult = $objProvinsi->SelectAllProvinsi();

                            if (count($arrayResult) == 0) {
                                echo '<tr><td colspan="5">Tidak Ada Data!</td></tr>';
                            } else {
                                $no = 1;
                                foreach ($arrayResult as $dataProvinsi) {
                                    echo '<option value=' . $dataProvinsi->id_provinsi . '>' . $dataProvinsi->nama_provinsi . '</option>';
                                    $no++;
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label for="exampleFormControlInput1" class="form-label">Username <span
                                style="color: red;">*</span></label>
                        <input type="text" name="username" class="form-control" id="exampleFormControlInput1"
                            placeholder="">
                    </div>
                    <div class="col">
                        <label for="exampleFormControlInput1" class="form-label">Password <span
                                style="color: red;">*</span></label>
                        <input type="password" name="password" class="form-control" id="exampleFormControlInput1"
                            placeholder="">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label for="exampleFormControlInput1" class="form-label">Institusi <span
                                style="color: red;">*</span></label>
                        <input type="text" name="institusi" class="form-control" id="exampleFormControlInput1"
                            placeholder="">
                    </div>
                    <div class="col">
                        <label for="exampleFormControlInput1" class="form-label">Birth Date <span
                                style="color: red;">*</span></label>
                        <input type="date" name="dob" class="form-control" id="exampleFormControlInput1" placeholder="">
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
                                $no = 1;
                                foreach ($arrayResult as $dataJenjangPendidikan) {
                                    echo '<option value=' . $dataJenjangPendidikan->id_jp . '>' . $dataJenjangPendidikan->nama_jp . '</option>';
                                    $no++;
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="exampleFormControlInput1" class="form-label">No. WA <span
                                style="color: red;">*</span></label>
                        <input type="text" name="no_wa" class="form-control" id="exampleFormControlInput1"
                            placeholder="">
                    </div>
                </div>
                <button type="submit" name="btnSubmit" class="btn"
                    style="background-color: #D61C4E; color: white; width: 100%;">Register</button>
                <a href="index.php?p=register" class="btn border border-dark mt-2" style="width: 100%;">Reset</a>
            </form>
        </div>
    </div>
</body>

</html>
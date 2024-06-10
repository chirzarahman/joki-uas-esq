<?php
require_once('./class/class.Users.php');
if(isset($_SESSION['level'])) {
    switch ($_SESSION['level']) {
        case 'admin':
            echo '<script>window.location = "index.php?p=dashboard_admin";</script>';
            break;

        case 'user':
            echo '<script>window.location = "index.php";</script>';
            break;
    }
}
if (isset($_POST['btnLogin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $objUsers = new Users();
    $objUsers->hasil = true;
    $objUsers->ValidateEmail($email);
    if ($objUsers->hasil) {
        $ismatch = password_verify($password, $objUsers->password);
        if ($ismatch) {
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION["id_user"] = $objUsers->id_user;
            $_SESSION["username"] = $objUsers->username;
            $_SESSION["email"] = $objUsers->email;
            $_SESSION["password"] = $objUsers->password;
            $_SESSION["dob"] = $objUsers->dob;
            $_SESSION["no_wa"] = $objUsers->no_wa;
            $_SESSION["jenjang_pendidikan"] = $objUsers->jenjang_pendidikan;
            $_SESSION["provinsi"] = $objUsers->provinsi;
            $_SESSION["institusi"] = $objUsers->institusi;
            $_SESSION["level"] = 'user';
            echo "<script>alert('Login sukses');</script>";
            echo '<script>window.location = "index.php";</script>';
            // if ($objUser->role == 'employee')
            // else if ($objUser->role == 'manager')
            //     echo '<script>window.location = "dashboardmanager.php";</script>';
            // else if ($objUser->role == 'admin')
            //     echo '<script>window.location = "dashboardadmin.php";</script>';
        } else {
            $objUsers->hasil = false;
            $checkadmin = $objUsers->CheckAdmin($email, $password);
            if($objUsers->hasil) {
                $_SESSION["id_user"] = $objUsers->id_user;
                $_SESSION["nama_admin"] = $objUsers->nama_admin;
                $_SESSION["level"] = 'admin';
                echo "<script>alert('Login sukses');</script>";
                echo '<script>window.location = "index.php?p=dashboard_admin";</script>';
            } else {
                echo "<script>alert('Password tidak match');</script>";
            }
        }
    } else {
        echo "<script>alert('Email tidak terdaftar');</script>";
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
        <div class="card shadow rounded-3 my-5 bg-white border-0">
            <div class="row g-0">
                <div class="col-md-6 p-5">
                    <h1 class="fw-bold fs-1 text-center">Login</h1>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" id="exampleFormControlInput1"
                                placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleFormControlInput1"
                                placeholder="">
                        </div>
                        <p class="text-end">Forgot Password?</p>
                        <br />
                        <button type="submit" name="btnLogin" class="btn"
                            style="background-color: #D61C4E; color: white; width: 100%;">Login</button>
                    </form>
                </div>
                <div class="col-md-6 rounded-3" style="background-color: #FEB139;">
                    <div class="card-body d-flex justify-content-center">
                        <img src=" ./assets/login.png" alt="Image 1" width="350" height="350">
                    </div>
                    <p class="text-center fw-bold fs-3" style="color: white;">Login to Start Your Journey</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
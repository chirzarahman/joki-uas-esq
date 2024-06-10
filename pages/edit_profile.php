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
            <form>
                <div class="row">
                    <div class="col">
                        <label for="exampleFormControlInput1" class="form-label">Email <span
                                style="color: red;">*</span></label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="">
                    </div>
                    <div class="col">
                        <label for="exampleFormControlInput1" class="form-label">Provinsi <span
                                style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label for="exampleFormControlInput1" class="form-label">Username <span
                                style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
                    </div>
                    <div class="col">
                        <label for="exampleFormControlInput1" class="form-label">Password <span
                                style="color: red;">*</span></label>
                        <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label for="exampleFormControlInput1" class="form-label">Institusi <span
                                style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
                    </div>
                    <div class="col">
                        <label for="exampleFormControlInput1" class="form-label">Birth Date <span
                                style="color: red;">*</span></label>
                        <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="">
                    </div>
                </div>
                <div class="row mt-3 mb-5">
                    <div class="col">
                        <label for="exampleFormControlInput1" class="form-label">Jenjang Pendidikan <span
                                style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
                    </div>
                    <div class="col">
                        <label for="exampleFormControlInput1" class="form-label">No. WA <span
                                style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
                    </div>
                </div>
                <button type="button" class="btn"
                    style="background-color: #D61C4E; color: white; width: 100%;">Simpan</button>
                <a href="index.php?p=edit_profile" class="btn border border-dark mt-2" style="width: 100%;">Reset</a>
            </form>
        </div>
    </div>
</body>

</html>
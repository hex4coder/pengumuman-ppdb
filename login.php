<?php
include 'core/db.php';
include 'core/router.php';


// check jika sudah submit
$message = '';
if (isset($_POST['submit'])) {
    $nomor = $_POST['nomor'];

    if (strlen($nomor) != strlen('000/PPDB/2023')) {
        $message = 'Format nomor tidak valid';
    } else {
        // cari didatabase
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login | PPDB SMKN Campalagian 2023</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css" />
</head>

<!-- content -->

<body>
    <div class="content-full-center bg-light">
        <form action="login.php" method="post" class="form p-5 bg-white">
            <label>Form</label>
            <h2>Autentikasi</h2>

            <div class="mt-4"></div>

            <hr />

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nomor Pendaftaran</label>
                <input type="text" name="nomor" class="form-control" placeholder="Contoh : 000/PPDB/2023" />
            </div>
            <div class="mt-2">
                <button name="submit" id="btnLogin" type="submit" class="btn btn-primary">
                    Login
                </button>
            </div>
        </form>
    </div>
</body>

</html>
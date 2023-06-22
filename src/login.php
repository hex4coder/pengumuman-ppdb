<?php
include_once 'core/router.php';
include_once 'core/ppdb.php';

// check jika sudah submit
$message = '';
if (isset($_POST['submit'])) {
    $nomor = $_POST['nomor'];

    if (strlen($nomor) != strlen('000/PPDB/2023')) {
        $message = 'Format nomor tidak valid';
    } else {
        // cari didatabase
        $data = UA_Core::getDataByNomor($nomor);
        if ($data == null) {
            // tidak ada data
            $message  = 'Maaf, kami tidak menemukan data dengan nomor ' . $nomor;
        } else {
            // data ada
            // buat session
            UA_Router::setSession($nomor, $data);
            // arahkan ke home
            UA_Router::checkForDashboard();
        }
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

    <?php include 'ui/header.php' ?>
</head>

<!-- content -->

<body>
    <div class="content-full-center bg-light">


        <form action="login.php" method="post" class="form p-5 bg-white">

            <!-- tampilkan pesan jika ada -->
            <?php if (strlen($message) > 0) { ?>
                <!-- check jika ada message -->
                <div class="alert alert-danger" role="alert">
                    <?php echo ($message) ?>
                </div>
            <?php } ?>

            <label>Form</label>
            <h2>Autentikasi</h2>

            <div class="mt-4"></div>

            <hr />

            <div class="mb-3">
                <label class="form-label">Nomor Pendaftaran</label>
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
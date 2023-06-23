<?php
include_once 'core/router.php';
include_once 'core/db.php';
UA_Router::checkForLogin();
$data = UA_Router::getDataFromSession();
?>


<!-- AWAL -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Pengumuman PPDB SMKN Campalagian 2023</title>

    <?php include_once 'ui/header.php' ?>
</head>

<body>
    <main>
        <div class="container py-4">
            <header class="pb-3 mb-4 border-bottom d-flex">
                <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                    <img src="assets/img/logo.png" alt="logo sekolah" height="50rem">
                    <span class="fs-4 px-4">Pengumuman PPDB SMKN Campalagian</span>
                </a>
            </header>

            <div class="p-5 mb-4 bg-light rounded-3">
                <div class="container-fluid py-5">
                    <h1 class="display-5 fw-bold"><?php echo ($data["nama"]) ?></h1>
                    <p class="col-md-8 fs-4">Tinggal di <?php echo ('Dusun ' . $data['dusun'] . ' Desa ' . $data['desa']) ?></p>
                    <button class="btn btn-primary btn-lg" type="button">Dinyatakan <?php echo ($data['keterangan'] . ' di Program Keahlian <strong>' . $data['lulus_di'] . '</strong>') ?></button>
                    <br />
                    <br />
                    <br />
                    <a href="logout.php" class="btn btn-outline-danger">Logout</a>
                </div>
            </div>

            <div class="row align-items-md-stretch">
                <div class="col-md-6">
                    <div class="h-100 p-5 text-white bg-dark rounded-3">
                        <h2>Nilai Rata-Rata Rapor</h2>
                        <p>Setelah dilakukan pengolahan data nilai rata-rata Rapor anda di <?php echo ($data['asal_sekolah'] . ' adalah ' . $data['nilai_rapor']) ?>.</p>
                        <h2 class="mt-5">Nilai Tes Bakat Minat</h2>
                        <p>Setelah melalui tes bakat minat anda mendapatkan nilai <?php echo ($data['nilai_bakat_minat']) ?>.</p>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="h-100 p-5 bg-light border rounded-3">
                        <h2>Nilai Akhir</h2>
                        <p>Setelah memproses semua nilai anda mendapatkan nilai total : <?php echo ($data['nilai_akhir']) ?></p>

                    </div>
                </div>
            </div>

            <footer class="pt-3 mt-4 text-muted border-top">
                Copyright &copy; 2023 <strong>Information and Communication Technology (ICT TJKT)</strong> SMKN Campalagian
            </footer>
        </div>
    </main>
</body>

</html>

<!-- AKHIR -->
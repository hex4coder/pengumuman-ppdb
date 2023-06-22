<?php
include_once 'core/router.php';
UA_Router::checkForDashboard();
include_once 'core/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumuman PPDB SMKN Campalagian Tahun 2023</title>

    <?php include_once 'ui/header.php' ?>
</head>

<body class="background">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="http://smkncampalagian.sch.id">Web SMKN Campalagian</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="http://smkncampalagian.sch.id">Beranda</a>
                    <a class="nav-link" href="index.php">Informasi</a>
                    <a class="nav-link p-auto" href="login.php">Login</a>
                </div>
            </div>
        </div>
    </nav>

    <?php include 'ui/footer.php' ?>
</body>

</html>
<?php 
include_once(__DIR__ . "/../config.php"); 
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../main/img/favicon.ico" type="image/x-icon">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <title>DayNot</title>
</head>
<body>

    <div id="headerMain" class="container-fluid">
        <div class="row align-items-center">
            <div class="col d-flex align-items-center">
                <a href="index.php" class="text-decoration-none">
                    <h1 id="headerBrandName">Day Not</h1>
                </a>
            </div>

            <div id="colHide" class="col d-flex justify-content-center align-items-center">
                <ul id="headerMenu" class="list-unstyled d-flex justify-content-center align-items-center gap-5 text-white mb-0">
                    <li>Hakkımızda</li>
                    <li>İletişim</li>
                </ul>
            </div>

            <div class="col d-flex justify-content-end align-items-center gap-3">
                <a id="headerLogin" href="login.php">Giriş Yap</a>
                <a id="headerRegister" class="btn btn-primary" href="register.php">Hemen Başla</a>
            </div>
        </div>
    </div>

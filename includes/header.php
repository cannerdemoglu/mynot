<?php 
include("config.php"); 
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <title>MyNot</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid w-75">

            <a href="index.php" class="navbar-brand">MyNot</a>

            <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarMenu"
                aria-controls="navbarMenu"
                aria-expanded="false"
                aria-label="Menüyü aç">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">

                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link active">Ana Sayfa</a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">Bize Ulaşın</a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="register.php" class="nav-link">
                            <i data-lucide="user"></i> Kayıt Ol
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="login.php" class="nav-link">
                            <i data-lucide="key-round"></i> Giriş Yap
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <script>
        lucide.createIcons();
    </script>

</body>
</html>
<?php include("includes/header.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap</title>
</head>
<body>
    <div class="container-fluit bg-light min-vh-100 d-flex align-items-center justify-content-center">
        <div class="container p-3 border-0 rounded-4 d-flex justify-content-center align-items-center">

        <form action="system/login_system.php" method="POST">

            <h1 class="display-6 m-4 text-center">Giriş Yap</h1>

            <div class="row">
                <div class="col container">
                    <label for="mail">E-Posta</label>
                    <input type="email" name="mail" class="form-control" id="" autocomplete="on" required>
                </div>
            </div>

            <div class="row">
                <div class="container">
                    <label for="password">Şifre</label>
                    <input type="password" name="password" class="form-control" id="" autocomplete="on" required>
                </div>

                <div class="container pt-2 ms-1">
                    <input type="checkbox" name="remberme" id="">
                    <label for="remberbe"> Beni Hatırla</label>
                </div>
            </div>

                <input type="submit" class="btn btn-primary p-2 m-2 w-100" value="Giriş Yap">
                <p class="pt-2 text-center">Bir hesabınız yok mu <a href="register.php">Hemen Kayıt Olun.</a></p>
        </form>

       

        </div>
    </div>
    
</body>
</html>
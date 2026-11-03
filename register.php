<?php include("includes/header.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Ol</title>
</head>
<body>
    <div class="container-fluit bg-light min-vh-100 d-flex align-items-center justify-content-center">

        <div class="container p-3 border-0 rounded-4 d-flex justify-content-center align-items-center">

        <form action="system/register_system.php" method="POST">

            <h1 class="display-6 m-4 text-center">Kayıt Ol</h1>

            <div class="row">
            
                <div class="col container">
                    <label for="username">Kullanıcı Adı</label>
                    <input type="text" name="username" class="form-control" id="" required>
                </div>

                <div class="col container">
                    <label for="mail">E-Posta</label>
                    <input type="email" name="mail" class="form-control" id="" required>
                </div>

            </div>

            <div class="row pt-3">

                <div class="col container">
                    <label for="password">Şifre</label>
                    <input type="password" name="password" class="form-control" id="" required>
                </div>

                <div class="col container">
                    <label for="passwordconfirm">Tekrar Şifre</label>
                    <input type="password" name="passwordconfirm" class="form-control" id="" required>
                </div>

            </div>
        
            <input type="submit" class="btn btn-primary mt-3 w-100" value="Kayıt Ol">

            <p class="pt-2 text-center">Hesabınız varsa <a href="login.php">Giriş Yapın.</a></p>

        </form>

        </div>
    </div>
</body>
</html>
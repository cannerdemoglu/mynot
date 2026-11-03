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

            <div class="container">
                <label for="username">Kullanıcı Adı</label>
                <input type="text" name="username" class="form-control" id="" required>
            </div>

            <div class="container">
                <label for="mail">E-Posta</label>
                <input type="email" name="mail" class="form-control" id="" required>
            </div>
        
            <div class="container">
                <label for="password">Şifre</label>
                <input type="password" name="password" class="form-control" id="" required>
            </div>

            <div class="container">
                <label for="passwordconfirm">Tekrar Şifre</label>
                <input type="password" name="passwordconfirm" class="form-control" id="" required>
            </div>
            <!--- NOT YET DATABASE --->
            <div class="container pt-2">
                <input type="checkbox" name="rember" class="form-check-input" id="rember">
                <label for="rember" class="form-check-label"> Beni Hatırla</label>
            </div>

            <div class="container pt-2">
                <label for="age">Yaş</label>
                <input type="number" maxlength="3" name="age" id="age">
            </div>

            <div class="container pt-2">
                <select name="select" id="">
                    <option value="Erkek">Erkek</option>
                    <option value="Kadın">Kadın</option>
                </select>
            </div>
        
            <input type="submit" class="btn btn-primary p-2 m-2 w-100" value="Kayıt Ol">

            <p class="pt-2 text-center">Hesabınız varsa <a href="login.php">Giriş Yapın.</a></p>

        </form>

        </div>
    </div>
</body>
</html>
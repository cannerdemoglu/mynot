<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="main/css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <title>MyNot - Giriş Yap</title>
</head>
<body>
    <div class="container-fluid d-grid m-auto align-items-center text-center" id="loginDiv">
        <div class="container" id="loginBox">
            <img class="rounded" src="https://placehold.co/80x80" alt="logo">
            <h1 class="display-6 pt-2">My Not</h1>
            <span class="badge">All in one always</span> 
            <div class="row pt-3 m-auto" style="gap: 20px;" id="loginBtns">
                <div class="col" id="loginBtn" style="background-color: black;"><a href="login.php">Giriş Yap</a></div>
                <div class="col" id="loginBtn"><a href="register.php">Kayıt Ol</a></div>
            </div>           
        
            <div class="container pt-3" id="loginFormBox">
                <form action="system/login_system.php" method="POST">
                    <label for="mail">E-posta veya Kullanıcı Adı</label>
                    <input type="text" class="form-control" name="mail" id="mail" placeholder="mymail@gmail.com" required>

                    <label for="password">Şifre</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="********" required>

                    <div class="row">
                        <div class="col d-flex mt-2">
                            <input type="checkbox" class="form-check-input" name="remberme" id="remberme">
                            <label for="remberme" class="ms-1 p-0">Beni Hatırla</label>
                        </div>
                        <div id="passwordForgot" class="col mt-2">
                            <a href="#">Şifremi Unuttum</a>
                        </div>
                    </div>
                    <input class="form-control mt-3" type="submit" value="Giriş Yap" id="loginSubmit">
                </form>
            </div>
            
            <hr>
            
            <div class="container" style="display:flex; justify-content: center;">
                <a id="loginBtn" href="#" style="width: 90%;" class="form-control">Google ile Giriş Yap</a>
            </div>
        </div>
    </div>
</body>
</html>


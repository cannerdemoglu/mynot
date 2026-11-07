<?php include("includes/header.php"); ?>
<link rel="stylesheet" href="main/css/main.css">

    <div class="container-fluid" id="loginDiv">
        <div class="container text-center" id="loginBox">
            <div class="login-brand">
                <h1 class="login-brand-title">Day Not</h1>
                <span class="login-brand-tag">.app</span>
            </div>

            <div class="row" id="loginBtns">
                <a href="login.php" class="col login-tab-btn" id="loginBtn">Giriş Yap</a>
                <a href="register.php" class="col login-tab-btn active" id="loginBtn">Kayıt Ol</a>
            </div>           
        
            <div id="loginFormBox">
                <form action="system/register_system.php" method="POST">
                    <label for="username">Kullanıcı Adı</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="myusername" required>

                    <label for="mail">E-posta</label>
                    <input type="email" class="form-control" name="mail" id="mail" placeholder="mymail@gmail.com" required>

                    <label for="password">Şifre</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="********" required>

                    <div class="row align-items-center mt-2">
                        <div class="col d-flex align-items-center">
                            <input type="checkbox" class="form-check-input me-2" name="remberme" id="remberme">
                            <label for="remberme" class="remember-label text-white">Beni Hatırla</label>
                        </div>
                        <div id="passwordForgot" class="col">
                            <a href="#" class="text-white">Şifremi Unuttum</a>
                        </div>
                    </div>
                    <input class="form-control" type="submit" value="Kayıt Ol" id="loginSubmit">
                </form>
            </div>
            
            <hr class="my-4" style="border-color: rgba(255, 255, 255, 0.1);">
            
            <div>
                <a href="#" class="google-btn">
                    <img src="main/img/google.png" alt="Google" width="18" height="18">
                    Google ile Kayıt Ol
                </a>
            </div>
        </div>
    </div>
</body>
</html>

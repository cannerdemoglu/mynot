<?php
include("includes/header.php");
?>
<link rel="stylesheet" href="main/css/main.css">

<div class="container-fluid" id="homepageDiv">

    <div class="brand">
        <h1 class="daynot" style="font-size: 90px;"><span id="daynotText" style="font-size: 90px;"></span></h1>
        <span class="app-tag">.app</span>
    </div>

    <div class="buttons">
        <a href="register.php" class="btn-start">Hemen Başla</a>
        <a href="login.php" class="btn-login">Giriş Yap</a>
    </div>

</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const titleText = "Day Not";
        const target = document.getElementById("daynotText");
        let i = 0;

        function typeHello() {
            if (i < titleText.length) {
                target.textContent += titleText.charAt(i);
                i++;
                setTimeout(typeHello, 140);
            }
        }

        setTimeout(typeHello, 250);
    });
</script>
</body>
</html>

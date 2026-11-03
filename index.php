<?php
include("includes/header.php");
?>

<div class="container mt-3">

    <div class="mt-4 p-5 bg-dark text-center text-white rounded">

        <h1 class="display-6">MyNot</h1>
        <span>Hemen sınırlarınızı zorlayın</span>

        <div class="container mt-4">
            <div class="row">

                <div class="col">
                    <a class="btn btn-light" href="login.php">
                        <i data-lucide="log-in"></i>
                        Giriş Yap
                    </a>
                </div>

                <div class="col">
                    <a class="btn btn-light" href="register.php">
                        <i data-lucide="user-plus"></i>
                        Kayıt Ol
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <div class="card bg-dark text-primary mt-3">
                <div class="card-body">
                    <a href="task.php">
                        <i data-lucide="circle-check-big"></i> Görevlerim</a>
                </div>
            </div>
        </div>
        
        <div class="col">
            <div class="card bg-dark text-primary mt-3">
                <div class="card-body">
                    <a href="task.php">
                        <i data-lucide="pencil"></i> Notlarım</a>
                </div>
            </div>
        </div>
    </div>

<style>
    .card-body a {
        color: white;
        text-decoration: none;
        font-weight: 400;
    }
    .lucide {
        width: 18px;
        height: 18px;
        stroke-width: 2;
    }
</style>


</div>
    <script>lucide.createIcons();</script>
</body>
</html>
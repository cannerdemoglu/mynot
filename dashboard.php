<?php
$pageTitle = "Kontrol Paneli";
include_once(__DIR__ . "../includes/header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="container-fluid p-3">
        <div class="container">
            
            <div class="row">
                <div class="col">
                
                    <div id="btns-row" class="row">
                        <div class="col"><h3>Görevler</h3></div>
                        <div class="col-auto"><a class="btn btn-primary" href="#">+ Görev Ekle</a></div>
                    </div>

                    <hr>

                    <ul id="dashboardli" class="list-group">
                        <li class="list-group-item"><a href="#">Not 1</a></li>
                        <li class="list-group-item"><a href="#">Not 2</a></li>
                        <li class="list-group-item"><a href="#">Not 3</a></li>
                    </ul>
                </div>
                <div class="col">

                    <div id="btns-row" class="row">
                        <div class="col"><h4>Notlar</h4></div>
                        <div class="col-auto"><a class="btn btn-primary" href="#">+ Not Ekle</a></div>
                    </div>
                    <hr>

                    <ul id="dashboardli" class="list-group">
                        <li class="list-group-item"><a href="#">Not 1</a></li>
                        <li class="list-group-item"><a href="#">Not 2</a></li>
                        <li class="list-group-item"><a href="#">Not 3</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php include("includes/footer.php"); ?>
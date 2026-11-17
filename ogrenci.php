
<?php
session_start();

if (!isset($_SESSION['urunler'])) {
    $_SESSION['urunler'] = [];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $urunAdi = $_POST['urunAdi'];
    $_SESSION['urunler'][] = $urunAdi;

    if ($urunAdi == ""){
    echo "Ürün Adı Girin";
    exit();
}
}



?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alışveriş Listesi</title>
</head>
<body>

    <form action="ogrenci.php" method="POST">
        <input type="text" name="urunAdi" placeholder="Ürün Adı">
        <input type="submit" value="Gönder">
    </form>

    <ul>
        <?php
        foreach ($_SESSION['urunler'] as $urun) {
            echo "<li>$urun</li>";
        }
        ?>
    </ul>

</body>
</html>

<?php include("../config.php"); ?>

<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST"){

$u_name = htmlspecialchars($_POST["username"]);
$u_mail = htmlspecialchars($_POST["mail"]);
$u_password = password_hash($_POST["password"], PASSWORD_DEFAULT);

}

$sql = "INSERT INTO users (u_name,  u_mail, u_pass)
VALUES ('$u_name', '$u_mail' , '$u_password')";

if ($conn->query($sql) === TRUE) {
    header("Refresh: 4; url=../login.php");
    echo "Kayıt Olundu, E-Posta Adresinizi Onaylayın";
    echo"<br>";
    echo"Giriş Sayfasına Yönlendiriliyor...";
    exit();
} else {
    echo "BAŞARISIZ: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
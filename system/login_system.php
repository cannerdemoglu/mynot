<?php 
session_start();
include("../config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u_mail = $_POST["mail"];
    $u_pass = $_POST["password"];

    $sql = "SELECT * FROM users WHERE u_mail = '$u_mail' OR u_name = '$u_mail'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {   
        $user = $result->fetch_assoc();

        if (password_verify($u_pass, $user["u_pass"])) {
            $_SESSION["u_ID"] = $user["u_ID"];
            $_SESSION["u_name"] = $user["u_name"];

            header("Location: ../index.php");
            exit();
        } else {
            echo "Şifre Yanlış !";
        }
    } else {
        echo "Kullanıcı Bulunamadı";
    }
}

$conn->close();
?>

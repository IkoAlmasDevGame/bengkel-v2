<?php 
require_once("../../database/koneksi.php");
session_start();
if(isset($_POST["submited"])){
    $userEmail = htmlspecialchars($_POST["userEmail"]);
    $passEmail = htmlspecialchars($_POST["password"]);
    password_verify($passEmail, PASSWORD_DEFAULT);

    if($userEmail == "" || $passEmail == ""){
        header("location:index.php");
    }

    $sql = "SELECT * FROM db_pengguna WHERE email = '$userEmail' and password='$passEmail' || 
    username = '$userEmail' and password='$passEmail'";
    $row = $conn->query($sql);

    if($row->num_rows > 0){
        $response["db_pengguna"] = array($userEmail,$passEmail);
        if($db = $row->fetch_assoc()){
            if($db["user_level"]== "admin"){
                $_SESSION["id"] = $db["id"];
                $_SESSION["email_pengguna"] = $db["email"];
                $_SESSION["username"] = $db["username"];
                $_SESSION["nama_pengguna"] = $db["nama"];
                $_SESSION["user_level"] = "admin";
                header("location:dashboard/index.php");
            }
            $_SESSION["status"] = true;
            json_encode($response["db_pengguna"]);
            array_push($response["db_pengguna"], $db);
        }
    }else{
        header("location:index.php");
    }
}
?>
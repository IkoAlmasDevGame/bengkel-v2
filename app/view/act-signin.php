<?php 
require_once("../database/koneksi.php");
session_start();
if(isset($_POST["submits"])){
    $userEmail = htmlspecialchars($_POST["userEmail"]);
    $passEmail = htmlspecialchars($_POST["password"]);
    password_verify($passEmail, PASSWORD_DEFAULT);

    if($userEmail == "" || $passEmail == ""){
        header("location:index.php");
    }

    $sql = "SELECT db_account.*, db_profile.nama FROM db_account join db_profile on db_account.nama = db_profile.nama WHERE email = '$userEmail' and password='$passEmail' || username = '$userEmail' and password='$passEmail'";
    $row = $conn->query($sql);

    if($row->num_rows > 0){
        $response["db_account"] = array($userEmail,$passEmail);
        if($db = $row->fetch_assoc()){
            if($db["user_level"]== "konsumen"){
                $_SESSION["id"] = $db["id"];
                $_SESSION["email"] = $db["email"];
                $_SESSION["username"] = $db["username"];
                $_SESSION["nama"] = $db["nama"];
                $_SESSION["user_level"] = "konsumen";
                header("location:dashboard/index.php");
            }
            $_SESSION["status"] = true;
            json_encode($response["db_account"]);
            array_push($response["db_account"], $db);
        }
    }else{
        header("location:index.php");
    }
}
?>
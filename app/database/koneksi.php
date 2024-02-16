<?php 

error_reporting(0);
date_default_timezone_set("Asia/Jakarta");

$dbname = "bengkeldb_2";
$user = "root";
$pass = "";
$host = "localhost";

$conn = new mysqli("localhost", "root", "", "bengkeldb_2");

try{
    $configs = new PDO("mysql:host=$host;dbname=$dbname;", $user,$pass);
    //echo 'sukses';
}catch(PDOException $e){
    echo 'KONEKSI GAGAL' .$e -> getMessage();
}

$view = "../model/view.php";
$controller = "../controller/controllerView.php";
?>
<?php 
namespace koneksi;

// error_reporting(0);
date_default_timezone_set("Asia/Jakarta");
$conn = mysqli_connect("localhost", "root", "", "bengkeldb_2") or die("Connection database : ".mysqli_connect_errno());

$view = "../model/view.php";
$controller = "../controller/controllerView.php";
?>
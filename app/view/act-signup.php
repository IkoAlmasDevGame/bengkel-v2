<?php 
require_once("../database/koneksi.php");

switch (connection_status()){
    case CONNECTION_NORMAL:
      $txt = 'Connection is in a normal state';
      break;
    case CONNECTION_ABORTED:
      $txt = 'Connection aborted';
      break;
    case CONNECTION_TIMEOUT:
      $txt = 'Connection timed out';
      break;
    case (CONNECTION_ABORTED & CONNECTION_TIMEOUT):
      $txt = 'Connection aborted and timed out';
      break;
    default:
      $txt = 'Unknown';
      break;
}
    if(isset($_POST["submited"])){
        /* Data Table */ 
        // $table3 = "db_account";
        // $table4 = "db_profile";
        /* Data Register */ 
        $email = htmlspecialchars($_POST["email"]);
        $username = htmlspecialchars($_POST["username"]);
        $password = htmlspecialchars($_POST["password"]);
        $nama = htmlspecialchars($_POST["nama"]);
        $alamat = htmlspecialchars($_POST["alamat"]);
        $tanggal = htmlspecialchars($_POST["tanggal_lahir"]);
        $telepon = htmlspecialchars($_POST["telepon"]);
        
        $sql_register = "INSERT INTO db_account (id,email,username,password,nama,user_level)
         VALUES ('','$email','$username','$password','$nama','konsumen')";
        $row_register = $conn->query($sql_register);
        $conn->query("INSERT INTO db_profile (id,nama,alamat,tanggal_lahir,telepon) VALUES ('','$nama','$alamat','$tanggal','$telepon')");
        $responses["db_account"] = array($email,$username,$password,$nama,"user_level" => $_POST["user_level"]);
        $responsess["db_profile"] = array($nama,$alamat,$tanggal,$telepon);
        if($row_register){
            array_push($responses["db_account"], $responses);
            array_push($responsess["db_profile"], $responsess);
            echo $txt;
            header("location:index.php");
            exit(0);
        }else{
            header("location:index.php");
            echo $txt;
            exit(0); 
        }
    }
?>
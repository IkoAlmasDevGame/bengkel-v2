<?php 
if(isset($_SESSION["status"])){
    if(isset($_SESSION["id_pengguna"])){
        if(isset($_SESSION["email_pengguna"])){
            if(isset($_SESSION["username_pengguna"])){
                if(isset($_SESSION["name_pengguna"])){
                    if(isset($_SESSION["user_level"])){
                        
                    }
                }
            }
        }
    }
}else{
    echo "<script lang='javascript'>
    window.setTimeout(() => {
        alert('Maaf anda gagal masuk ke halaman utama ...'),
        window.location.href='index.blade.php'
    }, 1000);
    </script>
    ";
    exit(0);
}
?>
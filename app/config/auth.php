<?php 
if(isset($_SESSION["status"])){
    if(isset($_SESSION["id"])){
        if(isset($_SESSION["email"])){
            if(isset($_SESSION["username"])){
                if(isset($_SESSION["nama"])){
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
        window.location.href='../index.php'
    }, 1000);
    </script>
    ";
    exit(0);
}
?>
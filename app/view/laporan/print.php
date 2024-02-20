<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Print</title>
    <?php 
        require_once("../ui/header.php");
        require_once("../ui/footer.php");
    ?>
</head>

<body>
    <script>
    window.print();
    </script>
    <div class="container-md">
        <div class="row">
            <div class="col-sm-4 col-md-4"></div>
            <div class="col-sm-4 col-md-4">
                <center>
                    <p>
                        <?php echo "Sistem Aplikasi Bengkel";?>
                    </p>
                    <p>
                        <?php echo "Jl. Pegangsaan Dua No.68, RT.8/RW.3, Pegangsaan Dua, Kec. Klp. Gading, Jkt Utara, Daerah Khusus Ibukota Jakarta 14250";?>
                    </p>
                </center>
                <table class="table table-striped" style="width:100%;">
                    <tbody>
                        <?php 
                            if(isset($_GET['print'])){
                            $email = $_SESSION['email_pengguna'];
                            $print = htmlspecialchars($_GET['print']);
                            $row = "SELECT * FROM db_reservasi WHERE email = '$email' and id='$print'";
                            $rowTable = $conn->query($row);
                            foreach ($rowTable as $isi) {
                        ?>
                        <tr>
                            <td>
                                <p class="fs-4 text-center">
                                    <?php echo $email ?>
                                </p>
                                <br>
                                <p class="fs-4 text-center">
                                    <?php echo $isi["tanggal_input"]." : ".$isi["waktu_input"]; ?>
                                </p>
                            </td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <br />
                <center>
                    <p class="text-center">Terima kasih sudah service di bengkel kami !</p>
                </center>
            </div>
        </div>
    </div>
</body>

</html>
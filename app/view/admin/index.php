<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
    require_once("../../database/koneksi.php");

    $table = "db_sistem";
    $sql = "SELECT * FROM $table WHERE flags = '1'";
    $row = $conn->query($sql);
    $hasil = $row->fetch_assoc();
    // Data Perusahaan
    $_SESSION["perusahaan"] = $hasil["nama_perusahaan"];
    $_SESSION["jenis_perusahaan"] = $hasil["jenis"];
    $_SESSION["alamat_perusahaan"] = $hasil["alamat"];
    $_SESSION["hari"] = $hasil["hari_operasional"];
    $_SESSION["jam"] = $hasil["jam_operasional"];
    ?>
    <meta charset="UTF-8">
    <meta content='text/html; charset=iso-8859-1' http-equiv='Content-type' />
    <meta content='width=330, height=400, initial-scale=1' name='viewport' />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title><?php echo $_SESSION["perusahaan"]; ?></title>
    <!--  -->
    <link rel="shortcut icon" href="../../../assets/icon/Logo SMB.png" type="image/x-icon">
    <!--  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../../../dist/css/glyphicon.css">
    <!--  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        // Add smooth scrolling to all links
        $("a").on('click', function(event) {

            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();

                // Store hash
                var hash = this.hash;

                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 800, function() {

                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
            } // End if
        });
    });
    </script>
</head>

<body class="bg-secondary">
    <header id="beranda">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid py-2 p-2 navbar-nav-scroll">
                <a href="index.php" class="navbar-brand">
                    <img src="../../../assets/icon/Logo SMB.png" alt="Logo" width="32" height="32">
                    <?php echo $_SESSION["perusahaan"]; ?>
                </a>
            </div>
        </nav>
    </header>

    <div class="d-flex justify-content-center align-items-center mt-5 mb-5 pb-5">
        <div class="card col-md-5 col-lg-5">
            <div class="card-body">
                <div class="card-header">
                    <h3 class="fs-4 display-4 text-center">
                        <img src="../../../assets/icon/Logo SMB.png" alt="Logo" width="32" height="32">
                        Login account
                    </h3>
                </div>
                <div class="card-group">
                    <div class="modal-body">
                        <form action="act-signin.php" method="post">
                            <table class="table table-striped">
                                <div class="card-group">
                                    <tr>
                                        <td class="fs-5">Username / Email</td>
                                        <td>
                                            <input type="text" name="userEmail" class="form-control"
                                                placeholder="masukkan username / email anda" require>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-5">Password</td>
                                        <td>
                                            <input type="password" name="password" class="form-control"
                                                placeholder="masukkan password anda" require>
                                        </td>
                                    </tr>
                                </div>
                            </table>
                            <div class="modal-footer d-flex justify-content-center align-items-center">
                                <button type="submit" name="submited" class="btn btn-outline-dark">
                                    <i class="fa fa-sign-in-alt"></i>
                                    <span>Sign In</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section>
        <div class="container-md container-lg text-white">
            <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-1 my-1 border-top border-dark">
                <div class="col mb-3">
                    <img src="../../../assets/icon/Logo SMB.png" alt="Logo" width="128" height="128">
                    <h6><?php echo $_SESSION["alamat_perusahaan"] ?></h6>
                </div>

                <div class="col-md-2 mb-3">

                </div>

                <div class="col-md-2 mb-3">

                </div>

                <div class="col-md-2 mb-3">

                </div>

                <div class="col-md-3 col-lg-3 mb-3">
                    <h5>Maps Sahabat Motor Bengkel</h5>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31735.507438231725!2d106.89356583476564!3d-6.138974099999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698aab73077acf%3A0x276b22a7a799c001!2sBengkel%20Sahabat%20Motor%20(SM)!5e0!3m2!1sid!2sid!4v1704691591698!5m2!1sid!2sid"
                        width="390" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                    <p class="text-body-secondary">© <?=$_SESSION["perusahaan"]?>, 2024</p>
                </div>
            </footer>
        </div>
    </section>
</body>
<!-- Register dan Login -->

</html>
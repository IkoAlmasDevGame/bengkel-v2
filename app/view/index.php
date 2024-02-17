<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
    require_once("../database/koneksi.php");

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
    <link rel="shortcut icon" href="../../assets/icon/Logo SMB.png" type="image/x-icon">
    <!--  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../../dist/css/glyphicon.css">
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
                    <img src="../../assets/icon/Logo SMB.png" alt="Logo" width="32" height="32">
                    <?php echo $_SESSION["perusahaan"]; ?>
                </a>
                <div style="position: relative; left: 0; top:0; bottom:0;">
                    <li class="navbar-nav dropdown">
                        <a href="" role="button" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown"
                            aria-expanded="false">Operasional</a>
                        <ul class="dropdown-menu">
                            <li>
                                <span class="dropdown-item">Hari Operasional :
                                    <?php echo $_SESSION["hari"]; ?></span>
                            </li>
                            <li>
                                <span class="dropdown-item">Jam Operasional :
                                    <?php echo $_SESSION["jam"]; ?></span>
                            </li>
                        </ul>
                    </li>
                </div>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                    data-bs-target="#navbarToggleSupport" aria-expanded="false" aria-controls="navbarToggleSupport">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarToggleSupport">
                    <ul class="navbar-nav ms-auto mb-lg-1 mb-1 shadow-sm">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link active" aria-current="page">
                                <i class="fa fa-home text-secondary mx-2 fs-3"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#contact" class="nav-link active" aria-current="page">
                                <i class="fa fa-address-book text-secondary mx-2 fs-3"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="https://maps.app.goo.gl/ruTHWXiP6pcLYbbC6" aria-current="page"
                                class="nav-link active">
                                <i class="fas fa-location-pin text-secondary mx-2 fs-3"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" data-bs-toggle="modal" data-bs-target="#account" aria-current="page"
                                class="nav-link active">
                                <i class="fa fa-sign-in-alt text-secondary mx-2 fs-3"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section style="min-height: 10vh;" class="mt-3 mt-lg-3 text-white">
        <div class="d-flex justify-content-center align-items-center flex-wrap">
            <img src="../../assets/icon/Logo SMB.png" alt="Logo" width="128" height="128">
            <div class="border border-top py-5"></div>
            <div class="col-md-5 col-lg-5 p-5 py-5">
                <h4 class="display-4"><?php echo $_SESSION["perusahaan"] ?></h4>
                <div class="border border-bottom"></div>
                <div class="container-md">
                    <p>
                        Sahabat Motor yaitu didirikan pertengahan 2016 salah satu usaha jasa yaitu sebuah
                        bengkel resmi sepeda mobil yang merupakan tempat untuk Melakukan perawatan serta
                        pemeliharaan sepeda mobil seperti perbaikan kaki – kaki mobil, service AC, Tune Up,
                        Turun mesin, service mesin, repair body dan masing banyak lainnya.
                        Serta melayani pembelian selalu berfokus untuk memberikan pelayanan, kinerja serta
                        fasilitas yang terbaik untuk kepuasan pengguna jasa serta dapat meningkatkan profit dan
                        produktivitas.
                    </p>
                </div>
            </div>
        </div>
        <div class="container-md container-lg">
            <div class="p-3 container-fluid bg-body-secondary rounded-1">
                <div class="d-flex justify-content-around align-items-center flex-wrap">
                    <div class="container-fluid py-1 px-1">
                        <div id="carouselExampleIndicators" class="carousel slide">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="../../assets/main/sahabat motor.jpg" alt="sahabat motor"
                                        class="d-block w-100">
                                </div>
                                <div class="carousel-item">
                                    <img src="../../assets/main/servis-1.jpg" alt="servis" class="d-block w-100">
                                </div>
                                <div class="carousel-item">
                                    <img src="../../assets/main/servis-2.jpg" alt="servis" class="d-block w-100">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="productservice" style="min-height: 95vh;" class="mt-5 mt-lg-5 pt-5 pt-lg-5">
        <div class="d-flex justify-content-center align-items-center">
            <div class="p-5 mb-2 mb-lg-2 col-md-7 col-lg-7">
                <div class="container-md container-lg py-5 p-5" style="background-color: skyblue;">
                    <h3 class="fs-2 display-5 text-stat fw-semibold" style="color: white;">PRODUCT & SERVICE</h3>
                    <div class="border-top my-4 border-warning col-md-4 col-lg-4"></div>
                    <div class="py-5 p-5">
                        <p class="text-start text-white fw-medium fs-4">
                            Kami menyediakan berbagai jenis service diantaranya Tune-Up, Spooring Balancing, Service
                            Rem, Jasa kuras mesin, dan lain lain.
                        </p>
                        <p class="text-start text-white fw-medium fs-4">
                            selain itu kami juga memiliki beberapa jenis paket service berkala, paket sultan, paket
                            ekonomis, dan paket bensin.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="mt-5 mt-lg-5">
        <div class="d-flex justify-content-around align-items-center flex-wrap">
            <div class="col-md-7 col-lg-7 bg-body-tertiary rounded-2 py-5 p-5">
                <div class="d-flex justify-content-around align-items-center flex-wrap">
                    <div class="card col-md-3 col-lg-3">
                        <div class="card-body text-center">
                            <?php echo $_SESSION["perusahaan"]?>
                            <br>
                        </div>
                        <div class="card-footer text-center">
                            <a href="https://wa.me/+6285330062002" role="button"
                                class="btn btn-dark btn-outline-success text-white">
                                <i class="fab fa-whatsapp"></i>
                                <span class="fs-6" id="text">+62-853-3006-2002</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-md container-lg text-white">
            <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top border-dark">
                <div class="col mb-3">
                    <img src="../../assets/icon/Logo SMB.png" alt="Logo" width="128" height="128">
                    <br>
                    <h6><?php echo $_SESSION["alamat_perusahaan"] ?></h6>
                </div>

                <div class="col-md-2 mb-3">

                </div>

                <div class="col-md-2 col-lg-2 mb-3">
                    <h5>Sahabat Motor Bengkel</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2">
                            <a href="#beranda" class="nav-link p-0 text-body-secondary">Home</a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="#productservice" class="nav-link p-0 text-body-secondary">Product
                                & Services</a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="#contact" class="nav-link p-0 text-body-secondary">Contact</a>
                        </li>
                    </ul>
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

    <div class="modal fade" id="account" tabindex="-1" aria-hidden="false">
        <div class="container-md container-lg mt-5 pt-5 opacity-75">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="fs-4 display-4 text-start">Login account</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form action="act-signin.php" method="post">
                            <table class="table table-striped">
                                <div class="card-group">
                                    <tr>
                                        <td class="fs-5">Username / Email</td>
                                        <td>
                                            <input type="text" name="userEmail" class="form-control"
                                                placeholder="masukkan username / email anda" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-5">Password</td>
                                        <td>
                                            <input type="password" name="password" class="form-control"
                                                placeholder="masukkan password anda" required>
                                        </td>
                                    </tr>
                                </div>
                            </table>
                            <div class="modal-footer d-flex justify-content-center align-items-center">
                                <button type="submit" name="submits" class="btn btn-outline-dark">
                                    <i class="fa fa-sign-in-alt"></i>
                                    <span>Sign In</span>
                                </button>
                                <button type="reset" class="btn btn-outline-danger">
                                    <i class="fa fa-eraser"></i>
                                    <span>Reset</span>
                                </button>
                            </div>
                        </form>
                        <div class="modal-footer">
                            <a href="" data-bs-target="#register" data-bs-toggle="modal" aria-controls="register"
                                aria-expanded="false"
                                class="btn btn-light btn-outline-dark text-decoration-none text-secondary"
                                role="button">membuat akun baru</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="register" tabindex="-1" aria-hidden="false">
        <div class="container-md container-lg mt-5 pt-5 opacity-75">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="fs-4 display-4 text-start">akun baru</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form action="act-signup.php" method="post">
                            <table class="table table-striped">
                                <div class="card-group">
                                    <tr>
                                        <td class="fs-5">Email</td>
                                        <td>
                                            <input type="email" name="email" class="form-control"
                                                placeholder="masukkan email anda" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-5">Username</td>
                                        <td>
                                            <input type="text" name="username" class="form-control"
                                                placeholder="masukkan username anda" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-5">Password</td>
                                        <td>
                                            <input type="password" name="password" class="form-control"
                                                placeholder="masukkan password anda" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-5">Nama</td>
                                        <td>
                                            <input type="text" name="nama" class="form-control"
                                                placeholder="masukkan nama anda" required>
                                        </td>
                                    </tr>
                                    <tr hidden>
                                        <td class="fs-5">Jabatan</td>
                                        <td>
                                            <input type="text" name="user_level" value="konsumen" class="form-control"
                                                placeholder="masukkan jabatan anda" required readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-5">Alamat Rumah</td>
                                        <td>
                                            <input type="text" name="alamat" class="form-control"
                                                placeholder="masukkan alamat rumah anda" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-5">Tanggal Lahir</td>
                                        <td>
                                            <input type="date" name="tanggal_lahir" class="form-control"
                                                placeholder="masukkan tanggal lahir anda" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-5">Telepon</td>
                                        <td>
                                            <input type="number" name="telepon" class="form-control"
                                                placeholder="masukkan telepon anda" required>
                                        </td>
                                    </tr>
                                </div>
                            </table>
                            <div class="modal-footer d-flex justify-content-center align-items-center">
                                <button type="submit" name="submited" class="btn btn-outline-dark">
                                    <i class="fa fa-save"></i>
                                    <span>Simpan</span>
                                </button>
                                <button type="button" data-bs-dismiss="modal" class="btn btn-outline-dark">
                                    <span>Cancel</span>
                                </button>
                                <button type="reset" class="btn btn-outline-danger">
                                    <i class="fa fa-eraser"></i>
                                    <span>Reset</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- Register dan Login -->

</html>
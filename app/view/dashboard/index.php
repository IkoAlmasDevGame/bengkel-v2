<?php 
require_once("../ui/header.php");
require_once("../ui/navbar.php");
?>

<div class="col-md-12 col-lg-12">
    <div class="container-fluid py-1 p-1 bg-body-secondary">
        <div class="container-fluid py-5 bg-secondary rounded-1" style="min-height: 91vh; height: 100%;">
            <h3 class="fs-4 fw-normal text-light">
                SELAMAT DATANG, <?php echo ucwords(ucfirst($_SESSION["nama_pengguna"])) ?>
                Di BENGKEL MOTOR SERVICE
            </h3>
        </div>
    </div>
</div>

<?php 
require_once("../ui/footer.php");
?>
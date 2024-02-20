<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
    <?php 
        require_once("../ui/header.php");
        $email = $_SESSION['email_pengguna'];
        $row = "SELECT db_account.*, db_profile.* FROM db_account inner join db_profile on db_account.nama = db_profile.nama WHERE email='$email'";
        $table = $conn->query($row);
        $hasil = $table->fetch_assoc();
        $_SESSION['id_pengguna'] = $hasil['id'];
        $_SESSION['username'] = $hasil['username'];
        $_SESSION['email_pengguna'] = $hasil['email'];
        $_SESSION['password_pengguna'] = $hasil['password'];
        $_SESSION['nama_pengguna'] = $hasil['nama'];
        $_SESSION['level'] = $hasil['user_level'];
        $_SESSION['street'] = $hasil['alamat'];
        $_SESSION['birthday'] = $hasil['tanggal_lahir'];
        $_SESSION['phone'] = $hasil['telepon'];
    ?>
</head>

<body>
    <?php 
        require_once("../ui/navbar.php");
    ?>
    <div class="col-md-12 col-lg-12">
        <div class="container-fluid py-1 p-1 bg-secondary" style="min-height: 90dvh; height: 100%;">
            <div class="container-fluid py-3 p-1 bg-light" style="min-height: 90dvh; height: 100%;">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="col-md-5 col-lg-5 pt-5">
                        <div class="container-fluid">
                            <div class="card bg-secondary rounded-1" style="min-width: 50%; width:492px;">
                                <div class="card-header">
                                    <h3 class="card-title text-light text-center">
                                        Data Pribadi - <?php echo $_SESSION['nama_pengguna'] ?>
                                    </h3>
                                </div>
                                <div class="card-body bg-light">
                                    <form action="" method="post">
                                        <table class="table table-striped">
                                            <input type="hidden" name="id" value="<?=$_SESSION['id_pengguna']?>"
                                                required>
                                            <tr>
                                                <td class="fs-4 fw-normal text-black">
                                                    <?php echo ucwords(ucfirst("username")) ?></td>
                                                <td>
                                                    <input type="text" name="username" class="form-control"
                                                        value="<?=$_SESSION['username']?>" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fs-4 fw-normal text-black">
                                                    <?php echo ucwords(ucfirst("email")) ?></td>
                                                <td>
                                                    <input type="email" name="email" class="form-control"
                                                        value="<?=$_SESSION['email_pengguna']?>" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fs-4 fw-normal text-black">
                                                    <?php echo ucwords(ucfirst("password")) ?></td>
                                                <td>
                                                    <input type="password" name="password" class="form-control"
                                                        value="<?=$_SESSION['password_pengguna']?>" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fs-4 fw-normal text-black">
                                                    <?php echo ucwords(ucfirst("nama")) ?></td>
                                                <td>
                                                    <input type="text" name="nama" class="form-control"
                                                        value="<?=$_SESSION['nama_pengguna']?>" required readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fs-4 fw-normal text-black">
                                                    <?php echo ucwords(ucfirst("jabatan")) ?></td>
                                                <td>
                                                    <input type="text" name="user_level" class="form-control"
                                                        value="<?=$_SESSION['level']?>" required readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fs-4 fw-normal text-black">
                                                    <?php echo ucwords(ucfirst("alamat")) ?></td>
                                                <td>
                                                    <input type="text" name="alamat" class="form-control"
                                                        value="<?=$_SESSION['street']?>" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fs-4 fw-normal text-black">
                                                    <?php echo ucwords(ucfirst("tanggal lahir")) ?></td>
                                                <td>
                                                    <input type="date" name="tanggal_lahir" class="form-control"
                                                        value="<?=$_SESSION['birthday']?>" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fs-4 fw-normal text-black">
                                                    <?php echo ucwords(ucfirst("Telepon")) ?></td>
                                                <td>
                                                    <input type="number" name="telepon" class="form-control"
                                                        value="<?=$_SESSION['phone']?>" required>
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="card-footer">
                                            <p class="text-end">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-save"></i>
                                                    <span>Simpan</span>
                                                </button>
                                            </p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
        require_once("../ui/footer.php");
    ?>
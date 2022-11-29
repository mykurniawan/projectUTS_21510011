<?php
session_start();
include "../../connection.php";

if ($_SESSION['username'] == "") {
    header("location:index.php");
}elseif($_SESSION['level']!="admin"){
    header("location:../../logOut.php");
}

// ambil data 
$sqlPasien = "SELECT * FROM pasien INNER JOIN vaksin  ON vaksin.idVaksin = pasien.vaksin  WHERE idPasien = '" . $_GET['idPasien'] . "'";
$queryPasien = mysqli_query($conn, $sqlPasien);
$dataPasien = mysqli_fetch_array($queryPasien);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Pasien</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        img {
            width: 470px;
            height: 800px;
        }
    </style>

</head>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">

            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block">
                        <img src="../../aset/log1.jpg" alt="">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1>forHealth <sup>+</sup></h1>
                                <h1 class="h4 text-gray-900 mb-4">Edit Data Pasien</h1>
                            </div>

                            <form action="prosesEP.php" method="POST" class="user">

                                <div class="form-group">
                                    <input type="hidden" name="idPasien" value="<?= $dataPasien['idPasien'] ?>" class="form-control" class="form-control form-control-user" id="nama" placeholder="id">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="nik" value="<?= $dataPasien['nik'] ?>" class="form-control form-control-user" id="nik" placeholder="Nama Lengkap">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="nama" value="<?= $dataPasien['nama'] ?>" class="form-control form-control-user" id="nama" placeholder="Nama Lengkap">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="alamat" value="<?= $dataPasien['alamat'] ?>" class="form-control form-control-user" id="alamat" placeholder="Alamat">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="username" value="<?= $dataPasien['username'] ?>" class="form-control form-control-user" id="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" value="<?= $dataPasien['password'] ?>" class="form-control form-control-user" id="password" placeholder="Password">
                                </div>

                                <div class="form-group">
                                    <select name="dosis" class="form-select form-control border" aria-label=".form-select-sm example" required>
                                        <option value="<?= $dataPasien['dosis'] ?>"><?= $dataPasien['dosis'] ?></option>
                                        <option value="Dosis ke-1">Dosis ke-1</option>
                                        <option value="Dosis ke-2">Dosis ke-2</option>
                                        <option value="Dosis ke-3">Dosis ke-3</option>
                                    </select>
                                </div>
                                <!-- pemilihan vaksin saat edit  -->




                                <br><br>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <a href="mnEditPasien.php" class="btn btn-success btn-user btn-block">
                                            Kembali
                                        </a>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="submit" name="simpan" value="Edit Data" class="btn btn-primary btn-user btn-block">
                                    </div>
                                </div>
                                <hr>
                            </form>

                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Project by</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.html">M. Yoga Kurniawan | 21510011</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
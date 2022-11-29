<?php 
session_start();
include "../../connection.php";

if ($_SESSION['username'] == "") {
    header("location:index.php");
}elseif($_SESSION['level']!="admin"){
    header("location:../../logOut.php");
}

// ambil data 
$queryVaksin = mysqli_query($conn,"SELECT * FROM vaksin 
            WHERE idVaksin = '".$_GET['idVaksin']."'");
$dataVaksin = mysqli_fetch_array($queryVaksin);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Dokter</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        img {
            width: 400px;
            height: 470px;
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
                        <img src="../../aset/ev.jpg" alt="">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1>forHealth <sup>+</sup></h1>
                                <h1 class="h4 text-gray-900 mb-4">Edit Data Dokter</h1>
                            </div>

                            <form action="prosesEV.php" method="POST" class="user">

                                <div class="form-group">
                                    <input type="hidden" name="idVaksin" value="<?= $dataVaksin['idVaksin'] ?>" class="form-control" class="form-control form-control-user" id="idVaksin" placeholder="id">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="namaVaksin" value="<?= $dataVaksin['namaVaksin'] ?>" class="form-control form-control-user" id="nama" placeholder="Nama Lengkap">
                                </div>
                                
                                <br><br>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <a href="../../dashboard.php" class="btn btn-success btn-user btn-block">
                                            Kembali
                                        </a>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="submit" name="simpan" value="Edit" class="btn btn-primary btn-user btn-block">
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
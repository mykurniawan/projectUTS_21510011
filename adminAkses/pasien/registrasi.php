<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        img {
            width: 470px;
            height: 655px;
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
                        <img src="../../aset/sntk.jpg" alt="">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1>forHealth <sup>+</sup></h1>
                                <h1 class="h4 text-gray-900 mb-4">Buat Akun</h1>
                            </div>
                            <form action="prosesTP.php" method="POST" class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="nik" class="form-control form-control-user" id="exampleFirstName" placeholder="NIK">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="nama" class="form-control form-control-user" id="exampleLastName" placeholder="Nama">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="alamat" class="form-control form-control-user" id="exampleFirstName" placeholder="Alamat">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="username" class="form-control form-control-user" id="exampleLastName" placeholder="Username">

                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <!-- <input type="text" name="username" class="form-control form-control-user" id="exampleLastName" placeholder="Username"> -->
                                        <select name="level" class="form-select form-control border" aria-label=".form-select-sm example" required>
                                            <!-- <option value="">pilihan</option> -->
                                            <?php
                                            include "../../connection.php";
                                            $queryPasien = mysqli_query($conn, "SELECT level FROM pasien");
                                            if ($level = mysqli_fetch_array($queryPasien)) {
                                                echo '<option value="' . $level['level'] . '">' . $level['level'] . '</option>';
                                            };
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <select name="dosis" class="form-select form-control border" aria-label=".form-select-sm example" required>
                                            <option value="">Dosis ke ?</option>
                                            <option value="Dosis ke-1">Dosis ke-1</option>
                                            <option value="Dosis ke-2">Dosis ke-2</option>
                                            <option value="Dosis ke-3">Dosis ke-3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    </div>

                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <!-- <input type="text" name="username" class="form-control form-control-user" id="exampleLastName" placeholder="Username"> -->
                                        <select name="vaksin" class="form-select form-control border" aria-label=".form-select-sm example" required>
                                            <option>Vaksin yang dipilih</option>
                                            <?php
                                            include "../../connection.php";
                                            $queryVaksin = mysqli_query($conn, "SELECT * FROM vaksin");
                                            while ($vaksin = mysqli_fetch_array($queryVaksin)) {
                                                echo '<option value="' . $vaksin['idVaksin'] . '">' . $vaksin['namaVaksin'] . '</option>';
                                            };
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <a href="../../index.php" class="btn btn-success btn-user btn-block">
                                            Kembali
                                        </a>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="submit" name="simpan" value="Daftar" class="btn btn-primary btn-user btn-block">
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
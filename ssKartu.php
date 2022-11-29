<?php
session_start();
include "connection.php";
$username = $_SESSION['username'];

if ($_SESSION['username'] == "") {
    header("location:index.php");
} elseif ($_SESSION['level'] != "pasien") {
    header("location:logOut.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Profil Pasien</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- cetak kartu  -->
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">

            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <!-- <div class="row"> -->
                    <div class="container">


                        <div class="mx-auto">
                            <!-- <div class="card shadow mb-4"> -->
                                <?php
                                $username = $_SESSION['username'];
                                $sql = "SELECT * FROM pasien JOIN vaksin ON vaksin.idVaksin = pasien.vaksin WHERE pasien.username = '$username'";
                                $user = mysqli_query($conn, $sql);
                                $data = mysqli_fetch_assoc($user);
                                ?>

                                <?php
                                if ($data) :
                                ?>
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            KARTU TANDA VAKSIN
                                        </div>
                                        <div class="card-body">
                                            <h6 class="m-0 font-weight-bold text-primary">Profil Pasien</h6>
                                            <table>
                                                <tr>
                                                    <td>ID</td>
                                                    <td>: <?= $data['idPasien'] ?> </td>
                                                </tr>
                                                <tr>
                                                    <td>NIK</td>
                                                    <td>: <?= $data['nik'] ?> </td>
                                                </tr>
                                                <tr>
                                                    <td>Nama</td>
                                                    <td>: <?= $data['nama'] ?> </td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat</td>
                                                    <td>: <?= $data['alamat'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Username</td>
                                                    <td>: <?= $data['username'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Password</td>
                                                    <td>: <?= $data['password'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Dosis</td>
                                                    <td>: <?= $data['dosis'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>vaksin</td>
                                                    <td class="text-success">: <?= $data['namaVaksin'] ?></td>
                                                </tr>
                                            </table>
                                            <button  onclick="window.print()" type="button" class="btn btn-secondary btn-sm">
                                                CetaK
                                            </button>
                                        </div>
                                    </div>

                                <?php endif; ?>
                                <!-- </div> -->
                            <!-- </div> -->
                        </div>
                        <!-- cetak kartu  -->
                    </div>

                <!-- </div> -->
            </div>
        </div>

    </div>




    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
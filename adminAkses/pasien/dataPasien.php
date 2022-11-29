<?php
session_start();
include "../../connection.php";

$username = $_SESSION['username'];

if ($_SESSION['username'] == "") {
    header("location:index.php");
}elseif($_SESSION['level']!="admin"){
    header("location:../../logOut.php");
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

    <title>Data Pasien</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="../../css/sb-admin-2.min.css">

    <!-- Custom styles for this page -->
    <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        #hapus {
            width: 30px;
            height: 30px;
        }

        #edit {
            width: 28px;
            height: 28px;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fa-solid fa-cube"></i>
                </div>
                <div class="sidebar-brand-text mx-3">forHealth<sup>+</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <hr class="sidebar-divider my-0"><br>
            <hr class="sidebar-divider my-0">
            <hr class="sidebar-divider my-0">
            <!-- Heading -->
            <div class="sidebar-heading">
                Pilihan
            </div>

            <hr class="sidebar-divider">
            <!-- Nav Item kembali -->
            <li class="nav-item active">
                <a class="nav-link" href="../../dashboard.php">
                    <i class="fas  fa-tasks"></i>
                    <span>Kembali</span></a>
            </li>
            <!-- Nav Item - Utilities Collapse Menu -->

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <!-- <h3>forHealt<sup>+</sup> | Pasien</h3> -->
                            <h4>selamat datang <?php echo $_SESSION['username']; ?></h4>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->


                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tabel Data Pasien</h1>
                    <p class="mb-4"> Berikut adalah daftar pasien yang sudah mendaftar untuk vaksinasi di rumah sakit forHealth <sup>+</sup></p>

                    
                    

                    <!-- DataTales -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pasien</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Level</th>
                                            <th>Dosis</th>
                                            <th>Vaksin</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Dosis</th>
                                            <th>Level</th>
                                            <th>Vaksin</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $queryPasien = mysqli_query($conn, "SELECT * FROM pasien JOIN vaksin ON vaksin.idVaksin = pasien.vaksin");
                                        $no = 0;

                                        while ($dataPasien = mysqli_fetch_array($queryPasien)) {
                                            $no++;
                                        ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $dataPasien['nik'] ?></td>
                                                <td><?= $dataPasien['nama'] ?></td>
                                                <td><?= $dataPasien['alamat'] ?></td>
                                                <td><?= $dataPasien['username'] ?></td>
                                                <td><?= $dataPasien['password'] ?></td>
                                                <td><?= $dataPasien['level'] ?></td>
                                                <td><?= $dataPasien['dosis'] ?></td>
                                                <td><?= $dataPasien['namaVaksin'] ?></td>
                                                <!-- <td>
                                                    <a href="editPasien.php?idPasien= <?= $dataPasien['idPasien'] ?>">
                                                        <img id="edit" src="../../aset/edit.png" alt="">
                                                    </a> |
                                                    <a href="hapusPasien.php?idPasien= <?= $dataPasien['idPasien'] ?>" onclick="return confirm ('Apakah anda yakin menghapus data ini')">
                                                        <img id="hapus" src="../../aset/hapus.png" alt="">
                                                    </a>
                                                </td> -->
                                            </tr>
                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; M. Yoga Kurniawan | 21510011</span> <br>
                        <hr style="width: 250px;">
                        <span>UTS Pemrograman Internet 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
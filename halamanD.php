<?php
session_start();
include "connection.php";
$username = $_SESSION['username'];

if ($_SESSION['username'] == "") {
    header("location:index.php");
} elseif ($_SESSION['level'] != "dokter") {
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

    <title>Profil Dokter</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="halamanD.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-stethoscope"></i>
                </div>
                <div class="sidebar-brand-text mx-3">forHealth<sup>+</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-stethoscope"></i>
                    <span>Dokter</span>
                </a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Tables -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    Halaman Dokter<sup>+</sup>
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> dr. <?php echo $_SESSION['username']; ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="logOut.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Selamat datang dr. <?php echo $_SESSION['username']; ?></h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>tombol logout gak sih ?</a> -->
                    </div>

                    <!-- Content Row jumlah dokter -->
                    <div class="row">
                        <?php
                        $queryJD = mysqli_query($conn, "SELECT * FROM dokter"); // ambil semua data pada tabel dokter
                        $jumlahDokter = mysqli_num_rows($queryJD); // hitung semua data yang ada di tabel dokter
                        ?>
                        <!-- Dokter Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Jumlah Dokter</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?= $jumlahDokter ?> Dokter
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-stethoscope fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pasien Card -->
                        <?php
                        $queryJP = mysqli_query($conn, "SELECT * FROM pasien");
                        $jumlahPasien = mysqli_num_rows($queryJP);
                        ?>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pasien Terdaftar
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?= $jumlahPasien ?> Pasien
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                            <!-- <i class="fas fa-clipboard-list fa-2x text-gray-300"></i> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- vaksin Card -->
                        <?php
                        $queryJV = mysqli_query($conn, "SELECT * FROM vaksin");
                        $jumlahVaksin = mysqli_num_rows($queryJV)
                        ?>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Macam Vaksin</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?= $jumlahVaksin ?> Vaksin
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-plus-circle fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Content Row jumlah jenis vaksin -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Provil</h6>
                                </div>
                                <!-- Card Body -->
                                <!-- tampilkan data dokter  -->
                                <div class="card-body">
                                    <?php
                                    $username = $_SESSION['username'];
                                    $sql = "SELECT * FROM dokter WHERE dokter.username = '$username'";
                                    $user = mysqli_query($conn, $sql);
                                    $data = mysqli_fetch_assoc($user);
                                    ?>

                                    <?php
                                    if ($data) :
                                    ?>
                                        <div class="card shadow mb-4">
                                            <div class="card-header py-3">
                                                <!-- <h6 class="m-0 font-weight-bold text-primary">Profil mu</h6> -->
                                                <button style="float: right;" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">
                                                    Edit Profil
                                                </button>
                                            </div>
                                            <div class="card-body">
                                                <h6 class="m-0 font-weight-bold text-primary">Profil Dokter</h6>

                                                <table>
                                                    <tr>
                                                        <td>ID</td>
                                                        <td>: <?= $data['idDokter'] ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama</td>
                                                        <td>: dr.<?= $data['nama'] ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alamat</td>
                                                        <td>: <?= $data['alamat'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kota Asal</td>
                                                        <td>: <?= $data['tLahir'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tanggal Lahir</td>
                                                        <td>: <?= $data['tgl'] ?></td>
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
                                                        <td>level</td>
                                                        <td>: <?= $data['level'] ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>

                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <!-- side content-->
                        
                    </div>

                    <!-- Content Row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; M. Yoga Kurniawan 21510011</span> <br>
                        <span>UTS Pemrograman Internet 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Trigger the modal with a button -->
    <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
    Open Modal
</button> -->

    <!-- Edit Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                    <p class="modal-title text-primary">Edit Profil</p>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <form action="dokterAkses/prosesEdit.php" method="POST" id="edit" class="user">
                            <div class="form-group">
                                <input type="hidden" name="idDokter" value="<?= $data['idDokter'] ?>" class="form-control" class="form-control form-control-user" id="idDokter" placeholder="id">
                            </div>

                            <div class="form-group">
                                <input type="text" name="nama" value="<?= $data['nama'] ?>" class="form-control form-control-user" id="nama" placeholder="Nama Lengkap">
                            </div>
                            <div class="form-group">
                                <input type="text" name="alamat" value="<?= $data['alamat'] ?>" class="form-control form-control-user" id="alamat" placeholder="Alamat">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" name="tLahir" value="<?= $data['tLahir'] ?>" class="form-control form-control-user" id="tLahir" placeholder="Tempat Lahir">
                                </div>
                                <div class="col-sm-6">
                                    <input type="date" name="tgl" value="<?= $data['tgl'] ?>" class="form-control form-control-user" id="ttl" placeholder="Tanggal Lahir">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="username" value="<?= $data['username'] ?>" class="form-control form-control-user" id="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" value="<?= $data['password'] ?>" class="form-control form-control-user" id="password" placeholder="Password">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <button type="button" class="btn btn-danger btn-user btn-block" data-dismiss="modal">Batal</button>

                                </div>
                                <div class="col-sm-6">
                                    <input type="submit" name="simpan" value="Edit Profil" class="btn btn-primary btn-user btn-block">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <small>edit profil</small>
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

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
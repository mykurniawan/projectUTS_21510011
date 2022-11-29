<?php
include "../connection.php";

if ($_POST) {
    $idAdmin = $_POST['idAdmin'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql ="UPDATE admin SET nama='" . $nama . "',
                            alamat='" . $alamat . "',
                            username='" . $username . "',
                            password='" . $password . "'
          WHERE idAdmin = '" . $idAdmin . "'" or die(mysqli_error($conn));

    $update = mysqli_query($conn, $sql);
    if ($update) {
        echo "<script>alert('Sukses update data Dokter'); location.href='dataAdmin.php';</script>";
    } else
        echo "<script>alert('Sukses update data Dokter'); location.href='editAdmin.php';</script>";
}

<?php
include "../../connection.php";
if ($_POST) {
    $idPasien = $_POST['idPasien'];
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $dosis = $_POST['dosis'];

    $query = "UPDATE pasien SET nik = '" . $nik . "',
                                nama = '" . $nama . "',
                                alamat = '" . $alamat . "',
                                username = '" . $username . "',
                                password = '" . $password . "',
                                dosis = '" . $dosis . "'
                where idPasien = '" . $idPasien . "'";
    $update = mysqli_query($conn, $query);

    if ($update) {
        echo "<script>alert('Sukses edit data pasien'); location.href='mnEditPasien.php';</script>";
    } else {
        echo "<script>alert('Gagal edit data pasien'); location.href='editPasien.php';</script>";
    }
}

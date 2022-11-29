<?php
include "../../connection.php";
$idPasien = $_GET['idPasien'];
if ($idPasien) {
    $queryHapus = mysqli_query($conn, "DELETE FROM pasien WHERE idPasien = '" . $idPasien . "'");

    if ($queryHapus) {
        echo "<script>alert('Sukses hapus Pasien')</script>";
        header("Location: mnEditPasien.php");
    } else {
        echo "<script>alert('Gagal hapus Pasien)</script>";
        header("Location: mnEditPasien.ph");
    }
}
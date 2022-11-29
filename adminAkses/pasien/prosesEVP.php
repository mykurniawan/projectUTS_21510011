<?php
include "../../connection.php";

$idPasien = $_POST['idPasien'];
$vaksin = $_POST['vaksin'];

if ($_POST) {
    $idPasien = $_POST['idPasien'];
    $vaksin = $_POST['vaksin'];

    $queryV = "UPDATE pasien SET vaksin = '" . $vaksin . "' WHERE idPasien = '" . $idPasien . "'";
    $updateVP = mysqli_query($conn, $queryV);

    if ($updateVP) {
        echo "<script>alert('Sukses edit vaksin pilihan pasien'); location.href='mnEditVP.php';</script>";
    } else {
        echo "<script>alert('Gagal edit vaksin pilihan pasien'); location.href='mnEditVP.php';</script>";
    }
}

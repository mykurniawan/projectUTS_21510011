<?php
include "../../connection.php";
$idDokter = $_GET['idDokter'];
if ($idDokter) {
    $queryHapus = mysqli_query($conn, "DELETE FROM dokter WHERE idDokter = '" . $idDokter . "'");

    if ($queryHapus) {
        echo "<script>alert('Sukses hapus Dokter');location.href='dataDokter.php'</script>";
    } else {
        echo "<script>alert('Gagal hapus Dokter');location.href='dataDokter.php'</script>";
        
    }
}

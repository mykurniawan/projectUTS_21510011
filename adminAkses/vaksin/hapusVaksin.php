<?php 
include "../../connection.php";
$idVaksin = $_GET['idVaksin'];
if($idVaksin){
    $queryHapus = mysqli_query($conn,"DELETE FROM vaksin WHERE idVaksin = '".$idVaksin."'");

    if($queryHapus){
        echo "<script>alert('Sukses hapus Vaksin');location.href='../../dashboard.php'</script>";
    } else{
        echo "<script>alert('Gagal hapus Vaksin');location.href='../../dashboard.php'</script>";

    }
}

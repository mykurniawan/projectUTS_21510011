<?php 
include "../connection.php";
$idAdmin = $_GET['idAdmin'];
if($idAdmin){
    $queryHapus = mysqli_query($conn,"DELETE FROM admin WHERE idAdmin = '".$idAdmin."'");

    if($queryHapus){
        echo "<script>alert('Sukses hapus Admin');location.href='dataAdmin.php'</script>";
    } else{
        echo "<script>alert('Gagal hapus Admin');location.href='dataAdmin.php'</script>";
    }
}

<?php 
include "../../connection.php";
if($_POST){
    $namaVaksin = $_POST['namaVaksin'];

    $insert = mysqli_query($conn, "INSERT INTO vaksin(namaVaksin) VALUES ('".$namaVaksin."')");
    if($insert){
        echo "<script>alert('Sukses menambahkan jenis vaksin baru');location.href='../../dashboard.php'</script>";
        
    }else{
        echo "<script>alert('Gagal menambahkan jenis vaksin baru');location.href='../../dashboard.php'</script>";

    }
}

<?php 
// session_start();
include "../connection.php";

if($_POST){
    $idDokter = $_POST['idDokter'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tLahir = $_POST['tLahir'];
    $tgl = $_POST['tgl'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $update = mysqli_query($conn,"UPDATE dokter SET nama='".$nama."',
                                                    alamat='".$alamat."',
                                                    tLahir='".$tLahir."',
                                                    tgl='".$tgl."',
                                                    username='".$username."',
                                                    password='".$password."'
                where idDokter='".$idDokter."'") or die(mysqli_error($conn));
    if($update){
        echo "<script>alert('Sukses update data Dokter'); location.href='../halamanD.php';</script>";
        
    }else{
        echo "<script>alert('Gagal update data Dokter'); location.href='../halamanD.php';</script>";

    }
    
}

?>
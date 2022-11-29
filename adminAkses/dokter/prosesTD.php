<?php 
include "../../connection.php";
if($_POST){
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tLahir = $_POST['tLahir'];
    $tgl = $_POST['tgl'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    if(empty($nama)){
        echo "<script>alert('Nama Dokter tidak boleh kosong'); location.href='tambahDokter.php'</script>";
    }else{
        $insert = mysqli_query($conn, "INSERT INTO dokter(nama, alamat, tLahir, tgl, username, password, level)
        VALUES ('".$nama."','". $alamat."','".$tLahir."','".$tgl."','".$username."','".$password."','".$level."')");

        if($insert){
            echo "<script>alert('Sukses menambahkan Dokter baru');location.href='dataDokter.php'</script>";
        }else {
            echo "<script>alert('Gagal menambahkan Dokter baru');location.href='tambahDokter.php'</script>";

        }
    }
}

?>
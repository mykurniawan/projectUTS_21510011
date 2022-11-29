<?php 
include "../../connection.php";

if($_POST){
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $dosis = $_POST['dosis'];
    $vaksin = $_POST['vaksin'];

    // cek apakah nik sudah ada di Database 
    $query= mysqli_query($conn,"SELECT nik FROM pasien WHERE nik = '$nik'");
    $cekNIK = mysqli_num_rows($query); //proses pengecekan existing data di database


    if($cekNIK>0){
        echo "<script>alert('NIK tidak bisa sama, pastikan NIK yang anda masukikan benar!'); location.href='registrasi.php'</script>";
    }else{
        $insert = mysqli_query($conn, "INSERT INTO pasien(nik, nama, alamat, username, password, level, dosis, vaksin)
        VALUES ('".$nik."','".$nama."','".$alamat."','".$username."','".$password."','".$level."','".$dosis."','".$vaksin."')");

        if($insert){
            // echo "<script>alert('Sukses menambahkan Dokter baru');location.href='dataDokter.php'</script>";
        echo "<script>alert('Sukses daftar'); location.href='../../index.php'</script>";

        }else {
        echo "<script>alert('Gagal daftar'); location.href='registrasi.php'</script>";

            // echo "<script>alert('Gagal menambahkan Dokter baru');location.href='tambahDokter.php'</script>";

        }
    }
}

?>
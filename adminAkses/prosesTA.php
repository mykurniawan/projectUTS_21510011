<?php 
include "../connection.php";

if($_POST){
    $nama=$_POST['nama'];
    $alamat=$_POST['alamat'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $level=$_POST['level'];

    if(empty($nama)){
        echo "<script>alert('Nama admin tidak boleh kosong'); location.href='tambahDokter.php'</script>";
    }else{
        $query = "INSERT INTO admin(nama, alamat, username, password, level)
                  VALUES ('".$nama."','".$alamat."','".$username."','".$password."','".$level."')";
        $insert = mysqli_query($conn, $query);
        if($insert){
            echo "<script>alert('Sukses menambahkan Admin baru');location.href='dataAdmin.php'</script>";
        }else{
            echo "<script>alert('Gagal menambahkan Admin baru');location.href='tambahAdmin.php'</script>";
        }
    }
}

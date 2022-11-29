<?php
session_start();
include "connection.php";
// menangkap data yang dikirim dari form login 
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

$queryAdmin  = "SELECT * FROM admin WHERE username ='$username' AND password='$password' AND level ='$level'";
$queryPasien = "SELECT * FROM pasien WHERE username ='$username' AND password='$password'AND level ='$level'";
$queryDokter = "SELECT * FROM dokter WHERE username = '$username' AND password ='$password'AND level ='$level'";

$queryLoginAdmin  = mysqli_query($conn, $queryAdmin);
$queryLoginPasien = mysqli_query($conn, $queryPasien);
$queryLoginDokter = mysqli_query($conn, $queryDokter);

$cekAdmin = mysqli_num_rows($queryLoginAdmin);
$cekPasien = mysqli_num_rows($queryLoginPasien);
$cekDokter = mysqli_num_rows($queryLoginDokter);

if ($cekAdmin > 0) {
    $dataAdmin = mysqli_fetch_assoc($queryLoginAdmin);
    if ($dataAdmin['level'] == "admin") {
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "admin";
        // $level = $_POST['level'];
        echo "<script>alert('Login Berhasil');location.href='dashboard.php'</script>";
    } else {
        echo "<script>alert('Username / Password /Level salah');location.href='index.php'</script>";
    }
} elseif ($cekPasien > 0) {
    $dataPasien = mysqli_fetch_assoc($queryLoginPasien);
    if ($dataPasien['level'] == "pasien") {
        $_SESSION['username'] = $username;
        $_SESSION['level'] = $level;
        echo "<script>alert('Login Berhasil');location.href='halamanP.php'</script>";
    } else {
        echo "<script>alert('Username / Password /Level salah');location.href='index.php'</script>";
    }
} elseif ($cekDokter > 0){
    $dataDokter = mysqli_fetch_assoc($queryLoginDokter);
    if($dataDokter['level']=="dokter"){
        $_SESSION['username'] = $username;
        $_SESSION['level'] = $level;
        echo "<script>alert('Login Berhasil');location.href='halamanD.php'</script>";
    }else{
        echo "<script>alert('Username / Password /Level salah');location.href='index.php'</script>";
    }
}
 else {
    echo "<script>alert('Username / Password /Level salah');location.href='index.php'</script>";
}

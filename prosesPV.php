<?php 
session_start();
$username = $_SESSION['username'];
if ($_SESSION['username'] == "") {
    header("location:index.php?pesan=gagal");
    // header("location:index.php?pesan=gagal");
}elseif($_SESSION['level']!="pasien"){
    header("location:index.php?pesan=gagal");
}

include "connection.php";

if ($_POST) {
    $username = $_SESSION['username'];
    $vaksin = $_POST['vaksin'];
    $update = "UPDATE pasien SET vaksin='$vaksin'WHERE username='$username'";
    mysqli_query($conn, $update);
    echo "<script>
    alert('Pemilihan vaksin berhasil');location.href='halamanP.php';
    </script>";

} else {
    echo "<script>
    alert('Pemilihan vaksin Tidak berhasil');location.href='halamanP.php';
    </script>";
}
// include "connection.php";

// if ($_POST) {
//     $username = $_SESSION['username'];
//     $vaksin = $_POST['vaksin'];
//     $update = "UPDATE pasien SET vaksin='$vaksin' WHERE username='$username'";
//     mysqli_query($conn, $update);
//     echo "<script>
//     alert('Pemilihan vaksin berhasil');location.href='halamanP.php';
//     </script>";

// } else {
//     echo "<script>
//     alert('Pemilihan vaksin Tidak berhasil');location.href='halamanP.php';
//     </script>";
// }

?>
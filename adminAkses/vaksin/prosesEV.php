 <?php 
 include "../../connection.php";
if ($_POST) {
    $idVaksin = $_POST['idVaksin'];
    $nama = $_POST['namaVaksin'];

    $query = "UPDATE vaksin SET namaVaksin = '" . $nama . "' where idVaksin = '" . $idVaksin . "'";
    $update = mysqli_query($conn, $query);

    if ($update) {
        echo "<script>alert('Sukses edit data Vaksin'); location.href='../../dashboard.php';</script>";
    } else {
        echo "<script>alert('Gagal edit data Vaksin'); location.href='editPasien.php';</script>";
    }
}

?>
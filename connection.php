<?php 
// menghubungkan dengan database 
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'dbfh';

$conn = mysqli_connect($hostname,$username,$password,$dbname);
if(mysqli_connect_error()){
    printf("Connection failed : ", mysqli_connect_error());
    exit();
}

?>
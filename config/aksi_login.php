<?php
include 'koneksi.php';
session_start();

$username = $_POST['username'];
$password = md5($_POST['password']);


$sql = mysqli_query($koneksi, "SELECT * FROM  user WHERE username='$username' AND password='$password'"); 

 
$cek = mysqli_num_rows($sql);
 
if($cek > 0 ){

    $data = mysqli_fetch_array($sql);
    
     
    $_SESSION['username']   = $data['username']; 
    $_SESSION['userid']   = $data['userid']; 
    $_SESSION['status']   = 'login';
    
    echo "<script>
    alert('berhasil login bjir');
    location.href='../user/index.php';
    </script>";
}else{
    echo "<script>
    alert('gagal cuy');
    location.href='../login.php';
    </script>";
}

?>
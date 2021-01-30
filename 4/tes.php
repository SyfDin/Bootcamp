<?php
include 'koneksi.php';
session_start();
if (!isset($_SESSION['username'])) {
    echo 'login dl yahudi';
 
}

$login   = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$_SESSION[username]'");
$peg    = mysqli_fetch_array($login);
$puser= $peg['id'];
echo'id'. $puser;
?>
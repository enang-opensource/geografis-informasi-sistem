<?php
session_start();
include '../../config/connection.php';

if ($_SESSION['admin']===null) {
  header('Location:../../index.php');
}

$getProfil = $mysqli->query("SELECT * FROM tb_user WHERE id_user='$_SESSION[admin]'");
$profil = $getProfil->fetch_object();

$myprofil = $profil->id_user;
?>

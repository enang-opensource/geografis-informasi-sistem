<?php
session_start();
include '../../../config/connection.php';

$verifikasi = $mysqli->query("SELECT * FROM tb_user WHERE email='$_POST[email]' AND password='$_POST[pass]'");

if ($verifikasi->num_rows==1) {
  $getData = $verifikasi->fetch_object();
  $_SESSION['admin'] = $getData->id_user;
  header("Location:../../admin/index.php");
} else {
  header("Location:../index.php?alert=2");
}

?>

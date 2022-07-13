<?php
session_start();
ini_set('display_errors', 0);
include '../../config/connection.php';

$profil = $mysqli->query("SELECT * FROM tb_user WHERE id_user='$_SESSION[admin]'");
$data_prof = $profil->fetch_object();
$myprofil = $data_prof->id_user;
?>

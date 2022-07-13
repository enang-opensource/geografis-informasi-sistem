<?php
session_start();
$_SESSION['admin'] = null;
header("Location:../../users/index.php");
?>

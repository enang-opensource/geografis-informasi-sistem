<?php
include '../../../../config/connection.php';

// ambil data file
$image_name = $_FILES['u_image']['name'];
$namaSementara = $_FILES['u_image']['tmp_name'];

if ($mysqli->query("UPDATE tb_user SET fname='$_POST[fname]', lname='$_POST[lname]', email='$_POST[email]', password='$_POST[pass]' WHERE id_user='$_POST[id]'")) {
  header("Location:../../add_user.php?alert=1&id=".$_POST['id']);
} else {
  echo "gagal";
}

?>

<?php
include '../../../../config/connection.php';

// ambil data file
$image_name = $_FILES['u_image']['name'];
$namaSementara = $_FILES['u_image']['tmp_name'];

if ($mysqli->query("INSERT INTO tb_user(fname, lname, email, password, status) VALUES('$_POST[fname]', '$_POST[lname]', '$_POST[email]', '$_POST[pass]', '1')")) {
  header("Location:../../add_user.php?alert=1");
} else {
  echo "gagal";
}

?>

<?php
include '../../../../config/connection.php';

// ambil data file
$image_name = $_FILES['u_image']['name'];
$namaSementara = $_FILES['u_image']['tmp_name'];

if ($image_name!='') {
  if (move_uploaded_file($namaSementara, '../../../../vendor/berita_image/'.$image_name)) {
    if ($mysqli->query("UPDATE tb_berita SET id_user='$_POST[id_user]', judul_berita='$_POST[j_berita]', kontent_berita='$_POST[keterangan]', image_berita='$image_name' WHERE id_berita='$_POST[id]'")) {
      header("Location:../../add_berita.php?alert=1&id=".$_POST['id']);
    } else {
      echo "gagal";
    }
  } else {
    echo "Gagal upload";
  }
} else {
  if ($mysqli->query("UPDATE tb_berita SET id_user='$_POST[id_user]', judul_berita='$_POST[j_berita]', kontent_berita='$_POST[keterangan]' WHERE id_berita='$_POST[id]'")) {
    header("Location:../../add_berita.php?alert=1&id=".$_POST['id']);
  } else {
    echo "gagal";
  }
}

?>

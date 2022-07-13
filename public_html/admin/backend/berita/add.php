<?php
include '../../../../config/connection.php';

// ambil data file
$image_name = $_FILES['u_image']['name'];
$namaSementara = $_FILES['u_image']['tmp_name'];

if (move_uploaded_file($namaSementara, '../../../../vendor/berita_image/'.$image_name)) {
  if ($mysqli->query("INSERT INTO tb_berita(id_user, judul_berita, kontent_berita, image_berita, tanggal) VALUES('$_POST[id_user]', '$_POST[j_berita]', '$_POST[keterangan]', '$image_name', NOW())")) {
    header("Location:../../add_berita.php?alert=1");
  } else {
    echo "gagal";
  }
} else {
  echo "Gagal upload";
}
?>

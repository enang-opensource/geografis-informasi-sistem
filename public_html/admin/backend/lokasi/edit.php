<?php
include '../../../../config/connection.php';

// ambil data file
$image_name = $_FILES['u_image']['name'];
$namaSementara = $_FILES['u_image']['tmp_name'];

if ($image_name!='') {
  if (move_uploaded_file($namaSementara, '../../../../vendor/lokasi_image/'.$image_name)) {
    if ($mysqli->query("UPDATE tb_lokasi SET id_kategori='$_POST[id_kategori]', id_user='$_POST[id_user]', nama_lokasi='$_POST[n_lokasi]', keterangan='$_POST[keterangan]', longtitude='$_POST[long]', latitude='$_POST[lat]', alamat='$_POST[alamat]', id_kelurahan='$_POST[id_kelurahan]', telephone='$_POST[telp]', direktur='$_POST[direktur]', akreditas='$_POST[akreditas]', jenis_lokasi='$_POST[jenis_lokasi]', image_lokasi='$image_name' WHERE id_lokasi='$_POST[id]'")) {
      header("Location:../../add_lokasi.php?alert=1&id=".$_POST['id']);
    } else {
      echo "gagal";
    }
  } else {
    echo "Gagal upload";
  }
} else {
  if ($mysqli->query("UPDATE tb_lokasi SET id_kategori='$_POST[id_kategori]', id_user='$_POST[id_user]', nama_lokasi='$_POST[n_lokasi]', keterangan='$_POST[keterangan]', longtitude='$_POST[long]', latitude='$_POST[lat]', alamat='$_POST[alamat]', id_kelurahan='$_POST[id_kelurahan]', telephone='$_POST[telp]', direktur='$_POST[direktur]', akreditas='$_POST[akreditas]', jenis_lokasi='$_POST[jenis_lokasi]' WHERE id_lokasi='$_POST[id]'")) {
    header("Location:../../add_lokasi.php?alert=1&id=".$_POST['id']);
  } else {
    echo "gagal";
  }
}

?>

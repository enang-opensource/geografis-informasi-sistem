<?php
include '../../../../config/connection.php';

// ambil data file
$image_name = $_FILES['u_image']['name'];
$namaSementara = $_FILES['u_image']['tmp_name'];

if (move_uploaded_file($namaSementara, '../../../../vendor/lokasi_image/'.$image_name)) {
  if ($mysqli->query("INSERT INTO tb_lokasi(id_kategori, id_user, id_kelurahan, nama_lokasi, keterangan, longtitude, latitude, alamat, telephone, direktur, akreditas, jenis_lokasi, image_lokasi)
  VALUES('$_POST[id_kategori]', '$_POST[id_user]', '$_POST[id_kelurahan]','$_POST[n_lokasi]', '$_POST[keterangan]', '$_POST[long]', '$_POST[lat]', '$_POST[alamat]', '$_POST[telp]', '$_POST[direktur]', '$_POST[akreditas]', '$_POST[jenis_lokasi]', '$image_name')")) {
    header("Location:../../add_lokasi.php?alert=1");
  } else {
    echo "gagal";
  }
} else {
  echo "Gagal upload";
}
?>

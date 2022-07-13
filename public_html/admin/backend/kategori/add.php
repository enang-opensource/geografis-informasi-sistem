<?php

include '../../../../config/connection.php';

if ($mysqli->query("INSERT INTO tb_kategori(jenis_kategori) VALUES('$_POST[j_kategori]')")) {
  header("Location:../../add_kategori.php?alert=1");
} else {
  header("Location:../../add_kategori.php?alert=2");
}

?>

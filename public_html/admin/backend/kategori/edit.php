<?php

include '../../../../config/connection.php';

if ($mysqli->query("UPDATE tb_kategori SET jenis_kategori='$_POST[j_kategori]' WHERE id_kategori='$_POST[id]'")) {
  header("Location:../../add_kategori.php?id=$_POST[id]&alert=1");
} else {
  header("Location:../../add_kategori.php?id=$_POST[id]&alert=2");
}

?>

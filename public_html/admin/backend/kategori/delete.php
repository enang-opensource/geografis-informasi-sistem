<?php

include '../../../../config/connection.php';

if ($mysqli->query("DELETE FROM tb_kategori WHERE id_kategori='$_GET[id]'")) {
  header("Location:../../see_kategori.php?alert=1");
} else {
  header("Location:../../see_kategori.php?alert=2");
}

?>

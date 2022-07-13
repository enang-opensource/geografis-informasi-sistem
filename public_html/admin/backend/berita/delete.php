<?php

include '../../../../config/connection.php';

if($mysqli->query("DELETE FROM tb_komentar WHERE id_berita='$_GET[id]'")){
  if ($mysqli->query("DELETE FROM tb_berita WHERE id_berita='$_GET[id]'")) {
    header("Location:../../see_berita.php?alert=1");
  } else {
    header("Location:../../see_berita.php?alert=2");
  }
} else {
  header("Location:../../see_berita.php?alert=2");
}
?>

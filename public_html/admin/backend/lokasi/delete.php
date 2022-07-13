<?php

include '../../../../config/connection.php';

if ($mysqli->query("DELETE FROM tb_lokasi WHERE id_lokasi='$_GET[id]'")) {
  header("Location:../../see_lokasi.php?alert=1");
} else {
  header("Location:../../see_lokasi.php?alert=2");
}

?>

<?php

include '../../../../config/connection.php';

if ($mysqli->query("DELETE FROM tb_kelurahan WHERE id_kelurahan='$_GET[id]'")) {
  header("Location:../../see_kelurahan.php?alert=1");
} else {
  header("Location:../../see_kelurahan.php?alert=2");
}

?>

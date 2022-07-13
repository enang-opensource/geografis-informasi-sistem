<?php

include '../../../../config/connection.php';

if ($mysqli->query("UPDATE tb_kelurahan SET nama_kelurahan='$_POST[j_kelurahan]' WHERE id_kelurahan='$_POST[id]'")) {
  header("Location:../../add_kelurahan.php?id=$_POST[id]&alert=1");
} else {
  header("Location:../../add_kelurahan.php?id=$_POST[id]&alert=2");
}

?>

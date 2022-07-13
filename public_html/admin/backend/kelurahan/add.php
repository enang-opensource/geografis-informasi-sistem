<?php

include '../../../../config/connection.php';

if ($mysqli->query("INSERT INTO tb_kelurahan(nama_kelurahan) VALUES('$_POST[j_kelurahan]')")) {
  header("Location:../../add_kelurahan.php?alert=1");
} else {
  header("Location:../../add_kelurahan.php?alert=2");
}

?>

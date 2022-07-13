<?php

include '../../../config/connection.php';

if ($mysqli->query("INSERT INTO tb_komentar(id_berita, nama_user, komentar, tanggal) VALUES('$_POST[id_berita]', '$_POST[nama]', '$_POST[comment]', NOW())")) {
  header("Location:../detail_berita.php?id=".$_POST['id_berita']);
} else {
  header("Location:../detail_berita.php?id=".$_POST['id_berita']);
}

?>

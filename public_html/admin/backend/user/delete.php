<?php

include '../../../../config/connection.php';

if ($mysqli->query("DELETE FROM tb_user WHERE id_user='$_GET[id]'")) {
  header("Location:../../see_user.php?alert=1");
} else {
  header("Location:../../see_user.php?alert=2");
}

?>

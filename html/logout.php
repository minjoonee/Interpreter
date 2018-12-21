<?php
session_start();
$res = session_destroy();
if($res){
  echo "<script>history.back();
  </script>";
}
 ?>

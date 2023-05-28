<?php
include("../../db.php");

if($_GET) {
    $id = intval(isset($_GET["id"]) ? $_GET["id"] : "");
    $sentece = $conexion->prepare("update  mantenimientos set estado=?, fecha_finalizacion=current_time  where id=?");
    $estado = 1;
    $sentece->execute([$estado, $id]);
    header("location:index.php");
  
  }

?>

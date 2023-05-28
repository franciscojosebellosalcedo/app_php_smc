<?php
include("../../db.php");

$id = intval(isset($_GET["id"]) ? $_GET["id"] : "");
$sentece = $conexion->prepare("delete from mantenimientos where id=:id");
$sentece->bindParam(":id", $id);
$sentece->execute();

header("location:index.php");

?>
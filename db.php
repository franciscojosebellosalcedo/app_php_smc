<?php

$servidor = "localhost";
$baseDedatos = "app_php";
$usuario = "root";
$contraseña = "";

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$baseDedatos", $usuario, $contraseña);
} catch (Exception $ex) {
    echo $ex->getMessage();
}


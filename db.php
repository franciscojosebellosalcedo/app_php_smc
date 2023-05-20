<?php

$servidor = "localhost";
$baseDedatos = "db_app_php_smc";
$usuario = "root";
$contraseña = "";

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$baseDedatos", $usuario, $contraseña);
} catch (Exception $ex) {
    echo $ex->getMessage();
}


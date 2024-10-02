<?php
require_once "./conexion.php";
include_once "./usuario.php";

$id = $_POST['ID'];
$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$sexo = $_POST['sexo'];

$usuario = new Usuario();

try {
    if ($usuario->editUser($id, $nombre, $edad, $sexo)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al actualizar el usuario.";
    }
} catch (PDOException $e) {
    echo "Error inesperado: " . $e->getMessage();
}
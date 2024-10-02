<?php
require_once "./conexion.php";
include_once "./usuario.php";

$id = $_GET['ID'];

$usuario = new Usuario();

// Actualizar los datos del usuario
try {
    if ($usuario->delUser($id)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al eliminar el usuario.";
    }
} catch (PDOException $e) {
    echo "Error inesperado: " . $e->getMessage();
}
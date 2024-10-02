<?php
require_once "./conexion.php";
include_once "./usuario.php";

$id = $_GET['ID'];

$usuario = new Usuario();

$usuarioActual = $usuario->getUserById($id); 

if (!$usuarioActual) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Usuario</title>
</head>
<body>
    <h2>Editar Usuario</h2>

    <form method="POST" action="update.php">
        <input type="hidden" name="ID" value="<?= $usuarioActual['ID'] ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?= $usuarioActual['Nombre'] ?>">
        <br>
        <label for="edad">Edad:</label>
        <input type="number" name="edad" value="<?= $usuarioActual['Edad'] ?>">
        <br>
        <label for="sexo">Sexo:</label>
        <input type="text" name="sexo" value="<?= $usuarioActual['Sexo'] ?>">
        <br>
        <input type="submit" value="Guardar Cambios">
    </form>
</body>
</html>
<?php
require_once "./conexion.php";
include_once "./usuario.php";

$usuario = new Usuario();

$usuarios = $usuario->readAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Usuarios</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Lista de Usuarios</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Sexo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($usuarios): ?>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?= $usuario['ID'] ?></td>
                        <td><?= $usuario['Nombre'] ?></td>
                        <td><?= $usuario['Edad'] ?></td>
                        <td><?= $usuario['Sexo'] ?></td>
                        <td>
                            <button onclick="location.href='./edit.php?ID=<?= $usuario['ID'] ?>'">Editar</button>
                            <button onclick="location.href='./delete.php?ID=<?= $usuario['ID'] ?>'">Eliminar</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No se encontraron usuarios.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <button onclick="location.href='./form.php'">Adicionar</button> 
</body>
</html>
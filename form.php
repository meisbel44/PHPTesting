<!DOCTYPE html>
<html>
<head>
    <title>Editar Usuario</title>
</head>
<body>
    <h2>Editar Usuario</h2>

    <form method="POST" action="insert.php">
        <input type="hidden" name="ID">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre">
        <br>
        <label for="edad">Edad:</label>
        <input type="number" name="edad">
        <br>
        <label for="sexo">Sexo:</label>
        <input type="text" name="sexo">
        <br>
        <input type="submit" value="Guardar Cambios">
    </form>
</body>
</html>
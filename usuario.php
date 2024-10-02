<?php
require_once "./conexion.php";
class Usuario {
    private $conn;

    private Database $db;
    private $table_name = "Usuario";

    public function __construct(){
        $this->db = new Database();
        $this->conn = $this->db->getConnection();
    }
    public function getUserById($id) {
        try {
            $sql = "SELECT * FROM Usuario WHERE ID = :id";
            $stmt = $this->conn->prepare($sql);
    
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener el usuario: " . $e->getMessage();
            return false;
        }
    }
    // Función para obtener todos los usuarios
    public function readAll(){
        try {
            $sql = "SELECT * FROM Usuario";
            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            return $usuarios;
        } catch (PDOException $e) {
            echo "Error al obtener los usuarios: " . $e->getMessage();
            return false;
        }
    }
    // Función para agregar datos de un usuario
    function insertUser(string $nombre, int $edad, string $sexo) {
        try {
            $sql = "INSERT INTO Usuario (Nombre, Edad, Sexo) VALUES (:nombre, :edad, :sexo)";
            $stmt = $this->conn->prepare($sql);
  
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':edad', $edad, PDO::PARAM_INT);
            $stmt->bindParam(':sexo', $sexo, PDO::PARAM_STR);
    
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al insertar usuario: " . $e->getMessage();
            return false;
        }
    }

    //Actualizar o Editar la informacion de un usuario
    function editUser(int $id, string $nombre, int $edad, string $sexo) {
        try {
            // Preparamos la consulta SQL
            $sql = "UPDATE Usuario SET Nombre = :nombre, Edad = :edad, Sexo = :sexo WHERE ID = :id";
            $stmt = $this->conn->prepare($sql);
    
            // Vinculamos los parámetros a la consulta
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':edad', $edad);
            $stmt->bindParam(':sexo', $sexo);
            $stmt->bindParam(':id', $id);
    
            // Ejecutamos la consulta
            $stmt->execute();
    
            // Si no se produce ninguna excepción, la actualización fue exitosa
            return true;
        } catch (PDOException $e) {
            // Capturamos cualquier excepción que pueda ocurrir durante la actualización
            echo "Error al actualizar el usuario: " . $e->getMessage();
            return false;
        }
    }

    //delete
    function delUser($id): bool {
        try {
            // Preparar la sentencia SQL
            $stmt = $this->conn->prepare("DELETE FROM Usuario WHERE ID = :id");

            // Vincular el parámetro
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Ejecutar la sentencia
            $stmt->execute();

            // Verificar si se afectó alguna fila
            if ($stmt->rowCount() > 0) {
                echo "Usuario eliminado correctamente.";
                return true;
            } else {
                echo "No se encontró ningún usuario con el ID proporcionado.";
            }
        } catch(PDOException $e) {
            echo "Error al eliminar el usuario: " . $e->getMessage();
        }
        return false;
    }

}
?>
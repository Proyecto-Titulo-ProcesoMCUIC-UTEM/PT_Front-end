<?php
class Usuario {
    private $conexion;
    private $id;
    private $nombre;
    private $email;

    public function __construct($db) {
        $this->conexion = $db;
    }

    public function login($email, $password) {
        try {
            $stmt = $this->conexion->prepare("SELECT id, nombre, password FROM usuarios WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario && password_verify($password, $usuario['password'])) {
                $this->id = $usuario['id'];
                $this->nombre = $usuario['nombre'];
                return true;
            }
            return false;
        } catch(PDOException $e) {
            return false;
        }
    }

    public function registro($nombre, $email, $password) {
        try {
            $hash_password = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $this->conexion->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (:nombre, :email, :password)");
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hash_password);
            return $stmt->execute();
        } catch(PDOException $e) {
            return false;
        }
    }

    // Getters
    public function getId() { return $this->id; }
    public function getNombre() { return $this->nombre; }
}
?>
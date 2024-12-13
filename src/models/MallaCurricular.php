<?php
class MallaCurricular {
    private $conexion;
    private $tabla = 'mallas_curriculares';

    public function __construct($db) {
        $this->conexion = $db;
    }

    // Obtener todas las mallas curriculares
    public function obtenerTodasMallas() {
        try {
            $query = "SELECT * FROM " . $this->tabla . " ORDER BY anio DESC";
            $stmt = $this->conexion->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            error_log("Error al obtener mallas: " . $e->getMessage());
            return [];
        }
    }

    // Obtener una malla curricular por ID
    public function obtenerPorId($id) {
        try {
            $query = "SELECT * FROM " . $this->tabla . " WHERE id = :id";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            error_log("Error al obtener malla por ID: " . $e->getMessage());
            return null;
        }
    }

    // Crear nueva malla curricular
    public function crear($datos) {
        try {
            $query = "INSERT INTO " . $this->tabla . " 
                      (carrera, anio, descripcion) 
                      VALUES (:carrera, :anio, :descripcion)";
            
            $stmt = $this->conexion->prepare($query);
            
            $stmt->bindParam(':carrera', $datos['carrera']);
            $stmt->bindParam(':anio', $datos['anio']);
            $stmt->bindParam(':descripcion', $datos['descripcion']);
            
            if ($stmt->execute()) {
                return $this->conexion->lastInsertId();
            }
            return false;
        } catch(PDOException $e) {
            error_log("Error al crear malla: " . $e->getMessage());
            return false;
        }
    }

    // Actualizar malla curricular
    public function actualizar($id, $datos) {
        try {
            $query = "UPDATE " . $this->tabla . " 
                      SET carrera = :carrera, 
                          anio = :anio, 
                          descripcion = :descripcion 
                      WHERE id = :id";
            
            $stmt = $this->conexion->prepare($query);
            
            $stmt->bindParam(':carrera', $datos['carrera']);
            $stmt->bindParam(':anio', $datos['anio']);
            $stmt->bindParam(':descripcion', $datos['descripcion']);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            
            return $stmt->execute();
        } catch(PDOException $e) {
            error_log("Error al actualizar malla: " . $e->getMessage());
            return false;
        }
    }

    // Eliminar malla curricular
    public function eliminar($id) {
        try {
            $query = "DELETE FROM " . $this->tabla . " WHERE id = :id";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch(PDOException $e) {
            error_log("Error al eliminar malla: " . $e->getMessage());
            return false;
        }
    }

    // Obtener mallas por año
    public function obtenerPorAnio($anio) {
        try {
            $query = "SELECT * FROM " . $this->tabla . " WHERE anio = :anio";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':anio', $anio, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            error_log("Error al obtener mallas por año: " . $e->getMessage());
            return [];
        }
    }
}
?>
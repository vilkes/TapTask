<?php
include_once("../conexion/conexion.php");

<<<<<<< HEAD
class Reseñas {
    private $conexion;

    public function __construct() {
        global $pdo;
        $this->conexion = $pdo;
    }

    public function crearReseña($usuarioId, $servicioId, $calificacion, $comentario) {
        $sql = "INSERT INTO reseñas (usuario_id, servicio_id, calificacion, comentario) VALUES (:usuarioId, :servicioId, :calificacion, :comentario)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            ':usuarioId' => $usuarioId,
            ':servicioId' => $servicioId,
            ':calificacion' => $calificacion,
            ':comentario' => $comentario
        ]);
    }

    public function obtenerReseñasPorServicio($servicioId) {
        $sql = "SELECT * FROM reseñas WHERE servicio_id = :servicioId";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([':servicioId' => $servicioId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
=======
class Reseña {
    private $conexion;

    private $usuarioId;
    private $servicioId;
    private $calificacion;
    private $contenido;

    public function __construct($usuarioId = null, $servicioId = null, $calificacion = null, $contenido = null) {
        global $pdo;
        $this->conexion = $pdo;

        if ($usuarioId !== null){
            $this->usuarioId = $usuarioId;
        }
        if ($servicioId !== null){
            $this->servicioId = $servicioId;
        }
        if ($calificacion !== null){
            $this->calificacion = $calificacion;
        }
        if ($contenido !== null){
            $this->contenido = $contenido;
        }
    }
    public function setUsuarioId($usuarioId) {
        $this->usuarioId = $usuarioId;
    }
    public function setServicioId($servicioId) {
        $this->servicioId = $servicioId;
    }
    public function setCalificacion($calificacion) {
        $this->calificacion = $calificacion;
    }
    public function setContenido($contenido) {
        $this->contenido = $contenido;
    }
    public function crearReseña() {
        if (!$this->usuarioId || !$this->servicioId || !$this->calificacion || !$this->contenido) {
        return false;
    }
    try {
        $sql = "INSERT INTO resenas (iduser_resenas, idservice_resenas, calificacion_r, contenido)
                VALUES (:usuarioId, :servicioId, :calificacion, :contenido)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            ':usuarioId' => $this->usuarioId,
            ':servicioId' => $this->servicioId,
            ':calificacion' => $this->calificacion,
            ':contenido' => $this->contenido
        ]);
        } catch (PDOException $e) {
        error_log("Error al crear reseña: " . $e->getMessage());
        return false;
    }
    }

    public function obtenerReseñasPorServicio() {
        $sql = "SELECT * FROM resenas WHERE servicio_id = :servicioId";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([':servicioId' => $this->servicioId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
>>>>>>> b7ede9e (Avances en chat)

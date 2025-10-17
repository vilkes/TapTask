<?php
include_once '../conexion/conexion.php';
class ImagenServicio {
    private $idServicio;
    private $rutaImagen;

    private $conexion;

     public function __construct($idServicio = null, $rutaImagen = null) {
        global $pdo;
        $this->conexion = $pdo;
        if ($idServicio !== null) {
            $this->idServicio = $idServicio;
        }
        if ($rutaImagen !== null) {
            $this->rutaImagen = $rutaImagen;
        }
     }
        public function guardarImagen() {
        $sql = "INSERT INTO IMAGENES (idservice_imagenes,imagenes) 
                VALUES (:idServicio, :rutaImagen)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([
            ':idServicio' => $this->idServicio,
            ':rutaImagen' => $this->rutaImagen
        ]);
        return $this->conexion->lastInsertId();
    }
    public function obtenerImagenesPorServicio($idServicio) {
        $sql = "SELECT * FROM IMAGENES WHERE idservice_imagenes = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([$idServicio]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
     public function eliminarImagen($idImagen) {
        $sql = "DELETE FROM IMAGENES WHERE idImagen = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$idImagen]);
    }
}
?>
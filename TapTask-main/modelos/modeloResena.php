<?php
include_once("../conexion/conexion.php");

class Resena {
    private $conexion;

    private $usuarioId;
    private $servicioId;
    private $calificacion;
    private $contenido;

    public function __construct($usuarioId = null, $servicioId = null, $calificacion = null, $contenido = null) {
        global $pdo;
        $this->conexion = $pdo;

        if ($usuarioId !== null) $this->usuarioId = $usuarioId;
        if ($servicioId !== null) $this->servicioId = $servicioId;
        if ($calificacion !== null) $this->calificacion = $calificacion;
        if ($contenido !== null) $this->contenido = $contenido;
    }

    public function setUsuarioId($usuarioId) { $this->usuarioId = $usuarioId; }
    public function setServicioId($servicioId) { $this->servicioId = $servicioId; }
    public function setCalificacion($calificacion) { $this->calificacion = $calificacion; }
    public function setContenido($contenido) { $this->contenido = $contenido; }

    public function crearResena() {
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
            error_log("Error al crear resena: " . $e->getMessage());
            return false;
        }
    }
    public function contarCalificacionesPorEstrella() {
    try {
        if (!$this->servicioId) {
            throw new Exception("servicioId no definido");
        }
        $sql = "
            SELECT calificacion_r, COUNT(*) AS cantidad
            FROM resenas
            WHERE idservice_resenas = :servicioId
            GROUP BY calificacion_r
        ";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':servicioId', $this->servicioId, PDO::PARAM_INT);
        $stmt->execute();

        // Inicializamos todas las estrellas en 0
        $ratings = [5 => 0, 4 => 0, 3 => 0, 2 => 0, 1 => 0];

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // 🔍 Debug
        error_log("Resultados SQL: " . print_r($rows, true));

        foreach ($rows as $fila) {
            $stars = (int)$fila['calificacion_r'];
            if (isset($ratings[$stars])) {
                $ratings[$stars] = (int)$fila['cantidad'];
            }
        }
        // 🔍 Debug final
        error_log("Ratings finales: " . print_r($ratings, true));
        return $ratings;
    } catch (PDOException $e) {
        error_log("Error al contar calificaciones (PDO): " . $e->getMessage());
        return ["error" => $e->getMessage()];
    } catch (Exception $e) {
        error_log("Error al contar calificaciones (general): " . $e->getMessage());
        return ["error" => $e->getMessage()];
    }
}
    public function obtenerResenasPorServicio() {
        $sql = "SELECT * FROM RESENAS WHERE idservice_resenas = :servicioId";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([':servicioId' => $this->servicioId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function obtenerCalificacionesPorServicio() {
    $sql = "SELECT calificacion_r FROM resenas WHERE idservice_resenas = :servicioId";
    $stmt = $this->conexion->prepare($sql);
    $stmt->execute([':servicioId' => $this->servicioId]);
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}
}
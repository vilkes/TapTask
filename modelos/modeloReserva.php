<?php
include_once("../conexion/conexion.php");

class Reservas{
    private $conexion;
    
    private $usuarioId;
    private $servicioId;
    private $fechaInicial;
    private $fechaFinal;
    public function __construct($usuarioId = null, $servicioId = null, $fechaInicial = null, $fechaFinal = null){
        global $pdo;
        $this->conexion = $pdo;

        if($usuarioId !== null){
            $this->usuarioId = $usuarioId;
        }
        if($servicioId !== null){
            $this->servicioId = $servicioId;
        }
        if($fechaInicial !== null){
            $this->fechaInicial = $fechaInicial;
        }
        if($fechaFinal !== null){
            $this->fechaFinal = $fechaFinal;
        }
    }
    public function setUsuarioId($usuarioId) {
    $this->usuarioId = $usuarioId;
    }
    public function setServicioId($servicioId) {
        $this->servicioId = $servicioId;
    }
    public function setFechaInicial($fechaInicial) {
        $this->fechaInicial = $fechaInicial;
    }
    public function setFechaFinal($fechaFinal) {
        $this->fechaFinal = $fechaFinal;
    }
    public function obtenerReservasPorUsuario(){
        $sql = "SELECT * FROM reservas WHERE usuario_id = :usuarioId";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([':usuarioId' => $this->usuarioId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
<<<<<<< HEAD
    public function cancelarReserva(){
        $sql = "DELETE FROM reservas WHERE id = :reservaId";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([':reservaId' => $this->reservaId]);
    }
=======
    
>>>>>>> b7ede9e (Avances en chat)
    public function obtenerTodasLasReservas(){
        $sql = "SELECT * FROM reservas";
        $stmt = $this->conexion->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function crearReserva(){
        $sql = "INSERT INTO reservas (iduser_reserva, idservice_reserva, fecha_inicio, fecha_final) 
            VALUES (:usuarioId, :servicioId, :fechaInicio, :fechaFinal)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            ':usuarioId' => $this->usuarioId,
            ':servicioId' => $this->servicioId,
            ':fechaInicio' => $this->fechaInicial,
            ':fechaFinal' => $this->fechaFinal
        ]);
    }
    public function confirmarReserva($idreserva) {
    $sql = "UPDATE reservas SET confirmacion = 1 WHERE idreserva = :id";
    $stmt = $this->conexion->prepare($sql);
    return $stmt->execute([":id" => $idreserva]);
}
<<<<<<< HEAD
=======
    public function cancelarReserva($idReserva){
    $sql = "UPDATE reservas SET cancelacion = 1 WHERE id = :reservaId";
    $stmt = $this->conexion->prepare($sql);
    return $stmt->execute([':reservaId' => $reservaId]);
}
>>>>>>> b7ede9e (Avances en chat)

}
/* idreserva int NOT NULL AUTO_INCREMENT,
iduser_reserva int,
idservice_reserva int,
disponibilidad date,
fecha_inicio datetime NOT NULL,
fecha_final datetime,
cancelacion boolean,
confirmacion boolean, */
?>
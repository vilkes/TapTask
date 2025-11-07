<?php
include_once("../modelos/modeloReserva.php");
include_once("../modelos/modeloServicio.php");
include_once("../modelos/modeloUsuario.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class controladorReserva {
    private $modeloReserva;
    private $modeloServicio;
    private $modeloUsuario;

    public function __construct() {
        $this->modeloReserva = new Reservas();
        $this->modeloServicio = new Servicio();
        $this->modeloUsuario = new Usuario();
    }
    public function crearReserva() {
        if(isset($_POST['fechaReserva']) && isset($_POST['idService']) && isset($_SESSION['usuario_id'])) {
    $usuarioId = $_SESSION['usuario_id'] ?? null;
    $fechaInicio = $_POST['fechaReserva'] ?? null;
    $servicioId = $_POST['idService'] ?? null;
    $fecha = new DateTime($fechaInicio);
    $fecha->modify('+1 hour'); 
    $fechaFinal = $fecha->format('Y-m-d H:i');
    
    $this->modeloReserva->setUsuarioId($usuarioId);
    $this->modeloReserva->setServicioId($servicioId);
    $this->modeloReserva->setFechaInicial($fechaInicio);
    $this->modeloReserva->setFechaFinal($fechaFinal);
    $this->modeloReserva->crearReserva();
    } else {
        echo "Faltan datos para crear la reserva.";
        exit();
    }
}
    public function obtenerReservasPorEmpresa($idEmpresa) {
    $reservas = $this->modeloReserva->obtenerTodasLasReservas();
    $resultado = [];

    foreach ($reservas as $reserva) {
        $servicio = $this->modeloServicio->obtenerServiciosPorId($reserva['idservice_reserva']);

        if ($servicio && $servicio['iduser_servicio'] == $idEmpresa) {
            $usuario = $this->modeloUsuario->extraerInformacionPorId($reserva['iduser_reserva']);
            $resultado[] = [
                "idreserva" => $reserva["idreserva"],
                "fecha_inicio" => $reserva["fecha_inicio"],
                "fecha_final" => $reserva["fecha_final"],
                "cancelacion" => $reserva["cancelacion"],
                "confirmacion" => $reserva["confirmacion"],
                "servicio" => $servicio,
                "usuario" => $usuario
            ];
        }
    }

    return $resultado;
}
    public function confirmarReserva($idReserva){
        $this->modeloReserva->confirmarReserva($idReserva);
        
    }

    public function cancelarReserva ($idReserva){
        $this->modeloReserva->cancelarReserva($idReserva);
    }
}

$controladorReserva = new controladorReserva();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['fechaReserva']) && isset($_POST['idService'])) {
    $controladorReserva->crearReserva();
    header("Location: ../vistas/vistaServicio.php?id=" . $_POST['idService']);
    exit();
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
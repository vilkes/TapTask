<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once '../modelos/modeloServicio.php';
include_once '../modelos/modeloUbicacion.php';
include_once '../modelos/modeloImagenesServicio.php';
ini_set('display_errors', 1);

class controladorServicio{

    public function manejarRequest() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion'])) {
            if ($_POST['accion'] === 'subirServicio') {
                $this->subirServicio();
            } elseif ($_POST['accion'] === 'listarServicios') {
                $this->listarServicios();
            }
        }
    }
    public function subirServicio() {
        if (isset($_POST['titulo'],$_POST['modalidad'],$_POST['descripcion'], $_POST['categoria'], $_POST['precio'],$_FILES['imagenes']) && count($_FILES['imagenes']['name']) > 0) {
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $etiquetas = $_POST['categoria'];
            $precio = $_POST['precio'];
            $tipoServicio = $_POST['modalidad'];
            $disponibilidad = "Disponible";
            if (count($_FILES['imagenes']['name']) > 5) {
                echo json_encode(['success' => false, 'mensaje' => 'Máximo de 5 imágenes permitido']);
                exit;
            }
            $rutasGuardadas = []; 
            $carpetaDestino = '../imagenesUsuarios/imagenesServicios/'; 
            for ($i = 0; $i < count($_FILES['imagenes']['name']); $i++) {
                $nombreImagen = $_FILES['imagenes']['name'][$i];
                $rutaTemporal = $_FILES['imagenes']['tmp_name'][$i];
                $error = $_FILES['imagenes']['error'][$i];

                if ($error === UPLOAD_ERR_OK) {
                    $ext = strtolower(pathinfo($nombreImagen, PATHINFO_EXTENSION));
                    $extensionesPermitidas = ['jpg', 'jpeg', 'png', 'gif'];
                    if (!in_array($ext, $extensionesPermitidas)) {
                        continue;
                    }
                    $nombreUnico = uniqid() . "_" . basename($nombreImagen);
                    $rutaFinal = $carpetaDestino . $nombreUnico;

                        // Mover archivo
                    if (move_uploaded_file($rutaTemporal, $rutaFinal)) {
                        $rutasGuardadas[] = $rutaFinal; 
                    }
                }
            }
            if (!isset($_SESSION['usuario_id'])) {
                echo "Error: usuario no autenticado.";
                exit;
            }
            $usuarioId = $_SESSION['usuario_id'];
            $ubicacion = new Ubicacion();
            $ubicacionDatos = $ubicacion->extraerInformacionPorId($usuarioId);
            if ($ubicacionDatos) {
                $ubicacionStr = $ubicacionDatos['calle'] . ' ' . $ubicacionDatos['numero'] . ', ' . $ubicacionDatos['localidad'] . ', ' . $ubicacionDatos['departamento'];
            } else {
                echo "Error: no se pudo obtener la ubicación del usuario.";
                return;
            }
            $servicio = new Servicio($titulo, $descripcion, $etiquetas, $ubicacionStr, $precio, $disponibilidad,$tipoServicio);
            $idServicio = $servicio->agregarServicio($usuarioId);
            if ($idServicio) {
                foreach ($rutasGuardadas as $rutaImagen) {
                    $imagen = new ImagenServicio($idServicio, $rutaImagen);
                    $imagen->guardarImagen();
                }
                header('location: ../vistas/vistaListarServicios.php');
            } else {
                echo "Error al agregar el servicio.";
                return;
            }
        } else {
            echo "Faltan datos del formulario.";
            return;
        }
    }
    public function obtenerServicio($id){
        $servicio = new Servicio();
        $dato = $servicio->obtenerServiciosPorId($id);
    
        if ($dato) {
            $imagenes = new ImagenServicio();
            $dato['imagenes'] = $imagenes->obtenerImagenesPorServicio($dato['idservice']);
            header('Content-Type: application/json');
            echo json_encode($dato);
        } else {
            echo json_encode(['error' => 'Servicio no encontrado']);
        }
    }
    public function listarServicios() {
        $filtros = [
            'titulo'     => $_GET['titulo'] ?? '',
            'etiquetas'  => $_GET['etiquetas'] ?? '',
            'precio_min' => $_GET['precio_min'] ?? '',
            'precio_max' => $_GET['precio_max'] ?? ''
        ];
        $servicio = new Servicio();
        if (!empty(array_filter($filtros))) {
            $lista = $servicio->buscarServicios($filtros);
        } else {
            $lista = $servicio->obtenerServicios();
        }
        $imagenes = new ImagenServicio();
        foreach ($lista as &$serv) {
        $serv['imagenes'] = $imagenes->obtenerImagenesPorServicio($serv['idservice']);
    }
        header('Content-Type: application/json');
        echo json_encode($lista);
    }
}
$controlador = new controladorServicio();
$controlador->manejarRequest();
?>
<?php
include_once '../conexion/conexion.php';
class Servicio {
    private $titulo;
    private $descripcion;
    private $etiquetas;
    private $ubicacion;
    private $precio;
    private $disponibilidad;
    private $tipoServicio;

    private $conexion;

     public function __construct($titulo = null, $descripcion = null, $etiquetas = null, $ubicacion = null, $precio = null, $disponibilidad = null, $tipoServicio = null) {
        global $pdo;
        $this->conexion = $pdo;
        if ($titulo !== null) {
            $this->titulo = $titulo;
        }
        if ($descripcion !== null) {
            $this->descripcion = $descripcion;
        }
        if ($etiquetas !== null) {
            $this->etiquetas = $etiquetas;
        }
        if ($ubicacion !== null) {
            $this->ubicacion = $ubicacion;
        }
        if ($precio !== null) {
            $this->precio = $precio;
        }
        if ($disponibilidad !== null) {
            $this->disponibilidad = $disponibilidad;
        }
        if ($tipoServicio !== null) {
            $this->tipoServicio = $tipoServicio;
        }
     }
     public function agregarServicio($usuarioId) {
        $sql = "INSERT INTO servicio (titulo, descripcion, etiquetas, ubicacion, precio, disponibilidad, tipoServicio) 
                VALUES (:titulo, :descripcion, :etiquetas, :ubicacion, :precio, :disponibilidad,:tipoServicio)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([
        ':titulo' => $this->titulo,
        ':descripcion' => $this->descripcion,
        ':etiquetas' => $this->etiquetas,
        ':ubicacion' => $this->ubicacion,
        ':precio' => $this->precio,
        ':disponibilidad' => $this->disponibilidad,
        ':tipoServicio'=> $this->tipoServicio
        ]);
        return $this->conexion->lastInsertId();
     }
     public function obtenerServicios() {
        $sql = "SELECT * FROM servicio";
        $stmt = $this->conexion->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        public function obtenerServiciosPorId($id) {
        $sql = "SELECT * FROM servicio where idservice=:id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        public function buscarServicios($filtros) {
            $query = "SELECT * FROM servicio WHERE 1=1";
            $params = [];
    
            if (!empty($filtros['titulo'])) {
                $query .= " AND titulo LIKE :titulo";
                $params[':titulo'] = '%' . $filtros['titulo'] . '%';
            }
            if (!empty($filtros['etiquetas'])) {
                $query .= " AND etiquetas LIKE :etiquetas";
                $params[':etiquetas'] = '%' . $filtros['etiquetas'] . '%';
            }
            if (!empty($filtros['ubicacion'])) {
                $query .= " AND ubicacion = :ubicacion";
                $params[':ubicacion'] = $filtros['ubicacion'];
            }
            if (!empty($filtros['precio_min'])) {
                $query .= " AND precio >= :precio_min";
                $params[':precio_min'] = $filtros['precio_min'];
            }
            if (!empty($filtros['precio_max'])) {
                $query .= " AND precio <= :precio_max";
                $params[':precio_max'] = $filtros['precio_max'];
            }
    
            $stmt = $this->conexion->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    
    public function actualizarServicio($id, $datos) {
        $query = "UPDATE servicio SET ";
        $params = [];
        foreach ($datos as $key => $value) {
            $query .= "$key = :$key, ";
            $params[":$key"] = $value;
        }
        $query = rtrim($query, ', ') . " WHERE id = :id";
        $params[':id'] = $id;

        $stmt = $this->conexion->prepare($query);
        return $stmt->execute($params);
    }
    public function eliminarServicio($id) {
        $sql = "DELETE FROM servicio WHERE id = :id";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
    public function obtenerServicioPor($id) {
        $sql = "SELECT * FROM servicio WHERE id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function contarServicios() {
        $sql = "SELECT COUNT(*) as total FROM servicio";
        $stmt = $this->conexion->query($sql);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }
    public function obtenerServiciosPorEtiqueta($etiqueta) {
        $sql = "SELECT * FROM servicio WHERE etiquetas LIKE :etiqueta";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([':etiqueta' => '%' . $etiqueta . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
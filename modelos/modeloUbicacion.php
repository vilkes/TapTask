<?php
include_once '../conexion/conexion.php';

class Ubicacion {
    private $conexion;

    private $departamento;
    private $localidad;
    private $barrio;
    private $calle;
    private $numero;
    private static $barriosMontevideo = [
       "Parque Rodo","Palermo","Punta Carretas","Barrio Sur","Punta Gorda",
       "Malvin","Buceo","Pocitos","Cordon","Carrasco","Ciudad Vieja","Aguada",
       "Carrasco Norte","Paso de las Duranas","La Comercial","Colon Sureste, Abayuba",
       "Centro","Malvin Norte","Parque Battle, Villa Dolores","Tres Cruces","Larrañaga",
       "Jacinto Vera","La Blanqueada","Bañados de Carrasco","Aires Puros","Prado, Nueva Savona",
       "La Figurita","Lezica, Melilla","Brazo Oriental","Villa Garcia, Manga Rural","Capurro, Bella Vista",
       "Las Canteras","Atahualpa","Reducto","Tres Ombues, Victoria","Paseo de la arena","Villa Española",
       "Mercado Modelo, Bolivar","Villa Muñóz, Retiro","Peñarol, Lavalleja","Cerrito",
       "Conciliacion","Nuevo Paris","Sayago","Colon Centro y Noroeste","Castro, Perez Castellanos",
       "La Teja","Manga, Toledo chico","Ituzaingo","Manga","Jardines del Hipodromo",
       "Maroñas, Parque Guarani","La Paloma, Tomkinson"," Casabo, Pajas Blancas",
       "Punta Rieles, Bella Italia","Las Acacias","Piedras Blancas","Union","Belvedere",
       "Casavalle","Flor de Maroñas","Cerro"
     ];
    public function __construct($departamento=null, $localidad=null, $barrio=null, $calle=null, $numero=null) {
        global $pdo;
        $this->conexion = $pdo;

        if ($departamento !== null) {
            $this->departamento = $departamento;
        }
        if ($localidad !== null) {
            $this->localidad = $localidad;
        }
        if ($barrio !== null) {
            $this->barrio = $barrio;
        }
        if ($calle !== null) {
            $this->calle = $calle;
        }
        if ($numero !== null) {
            $this->numero = $numero;
        }
    }

    public function extraerInformacionPorId($idubicacion) {
        $sql = "SELECT * FROM UBICACION WHERE idubicacion = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([$idubicacion]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function identificarBarrioLocalidad() {  
        if (strtolower($this->departamento) === 'montevideo') {
            if (in_array($this->barrio, self::$barriosMontevideo)) {
                $this->localidad = 'Montevideo';
            } else {
                throw new Exception("Barrio no reconocido en Montevideo.");
            }
        } else {
            $this->barrio = null;
        }
    }
    public function cambiarDatos($id){
        
        $sql= "UPDATE UBICACION
                  SET departamento = :departamento,
                      localidad = :localidad,
                      barrios_montevideo = :barrio,
                      calle = :calle,
                      numero = :numero
                WHERE idubicacion = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([
            ':departamento' => $this->departamento,
            ':localidad'=> $this->localidad,
            ':barrio' => $this->barrio,
            ':calle'  => $this->calle,
            ':numero' => $this->numero
        ]);
    }
    public function guardarUbicacion($id) {
        $sql = "INSERT INTO UBICACION (idubicacion,departamento, localidad, barrios_montevideo, calle, numero)
                VALUES (:id,:departamento, :localidad, :barrio, :calle, :numero)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([
            ':id'           => $id,
            ':departamento' => $this->departamento,
            ':localidad'    => $this->localidad,
            ':barrio'       => $this->barrio,
            ':calle'        => $this->calle,
            ':numero'       => $this->numero
        ]);

        return $this->conexion->lastInsertId();
    }
}
?>
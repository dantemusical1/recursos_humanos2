<?php

include('Personas.php');

class Jubilado extends Persona {
    public $numeroPension;
    public $pensionMensual;

    public function __construct($id, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $edad, $correoElectronico, $telefono, $numeroDeCuenta, $numeroPension, $fechaJubilacion, $pensionMensual) {
        parent::__construct($primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $edad, $correoElectronico, $telefono, $numeroDeCuenta);
        $this->numeroPension = $numeroPension;
        $this->fechaJubilacion = $fechaJubilacion; // Asignar la fecha de jubilación
        $this->pensionMensual = $pensionMensual;
    }
}

function obtenerEmpleados() {
    $host = 'localhost';
    $db = 'recursos_humanos_dos';
    $user = 'root';
    $pass = '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->query("SELECT * FROM jubilados");
        $empleados = [];

        while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $empleados[] = new EmpleadoActivo(
                $resultado['id'], // Pasar el id al constructor
                $resultado['primer_nombre'],
                $resultado['segundo_nombre'],
                $resultado['primer_apellido'],
                $resultado['segundo_apellido'],
                $resultado['edad'],
                $resultado['correo_electronico'], // Asegúrate de que este campo exista en la base de datos
                $resultado['telefono'], // Asegúrate de que este campo exista en la base de datos
                $resultado['numero_de_cuenta'], // Asegúrate de que este campo exista en la base de datos
                $resultado['numero_empleado'],
                $resultado['fecha_contratacion'],
                $resultado['salario']
            );
        }

        return $empleados;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return [];
    }
}

?>
<?php

class Persona {
    public $primerNombre;
    public $segundoNombre;
    public $primerApellido;
    public $segundoApellido;
    public $fechaNacimiento;
    public $edad;
    public $correoElectronico;
    public $telefono;
    public $numeroDeCuenta;
public $fechaJubilacion;

    public function __construct($primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $edad, $correoElectronico, $telefono, $numeroDeCuenta) {
        $this->primerNombre = $primerNombre;
        $this->segundoNombre = $segundoNombre;
        $this->primerApellido = $primerApellido;
        $this->segundoApellido = $segundoApellido;
        $this->edad = $edad;
        $this->correoElectronico = $correoElectronico;
        $this->telefono = $telefono;
        $this->numeroDeCuenta = $numeroDeCuenta;
    }
}

class EmpleadoActivo extends Persona {
    public $id; // Agregar la propiedad id
    public $numeroEmpleado;
    public $fechaContratacion;
    public $salario;

    public function __construct($id, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $edad, $correoElectronico, $telefono, $numeroDeCuenta, $numeroEmpleado, $fechaContratacion, $salario) {
        parent::__construct($primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $edad, $correoElectronico, $telefono, $numeroDeCuenta);
        $this->id = $id; // Inicializar la propiedad id
        $this->numeroEmpleado = $numeroEmpleado;
        $this->fechaContratacion = $fechaContratacion;
        $this->salario = $salario;
    }

    // Método para calcular el salario anual
    public function salarioAnual() {
        return $this->salario * 12; // Suponiendo que el salario es mensual
    }
}

class Jubilado extends Persona {
    public $numeroPension;
    public $fechaJubilacion;
    public $pensionMensual;

    public function __construct($id, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $edad, $correoElectronico, $telefono, $numeroDeCuenta, $numeroPension, $fechaJubilacion, $pensionMensual) {
        parent::__construct($primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $edad, $correoElectronico, $telefono, $numeroDeCuenta);
        $this->numeroPension = $numeroPension;
        $this->fechaJubilacion = $fechaJubilacion;
        $this->pensionMensual = $pensionMensual;
    }
}

// Función para obtener todos los empleados  activos de la base de datos


function obtenerEmpleados() {
    $host = 'localhost';
    $db = 'recursos_humanos_dos';
    $user = 'root';
    $pass = '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->query("SELECT * FROM empleados");
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
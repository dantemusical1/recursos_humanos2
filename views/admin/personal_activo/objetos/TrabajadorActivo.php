<?php

class Trabajador {
    // Atributos de la clase
    private $primerNombre;
    private $segundoNombre;
    private $primerApellido;
    private $segundoApellido;
    private $cedulaIdentidad;
    private $numeroTelefono;
    private $numeroDeCuentaBancaria;

    // Constructor de la clase
    public function __construct($primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $cedulaIdentidad, $numeroTelefono,$numeroDeCuentaBancaria ) {
        $this->primerNombre = $primerNombre;
        $this->segundoNombre = $segundoNombre;
        $this->primerApellido = $primerApellido;
        $this->segundoApellido = $segundoApellido;
        $this->cedulaIdentidad = $cedulaIdentidad;
        $this->numeroTelefono = $numeroTelefono;
        $this->numeroDeCuentaBancaria=$numeroDeCuentaBancaria;
    }

    // Métodos getters y setters para cada atributo

    public function getPrimerNombre() {
        return $this->primerNombre;
    }

    public function setPrimerNombre($primerNombre) {
        $this->primerNombre = $primerNombre;
    }

    public function getSegundoNombre() {
        return $this->segundoNombre;
    }

    public function setSegundoNombre($segundoNombre) {
        $this->segundoNombre = $segundoNombre;
    }

    public function getPrimerApellido() {
        return $this->primerApellido;
    }

    public function setPrimerApellido($primerApellido) {
        $this->primerApellido = $primerApellido;
    }

    public function getSegundoApellido() {
        return $this->segundoApellido;
    }

    public function setSegundoApellido($segundoApellido) {
        $this->segundoApellido = $segundoApellido;
    }

    public function getCedulaIdentidad() {
        return $this->cedulaIdentidad;
    }

    public function setCedulaIdentidad($cedulaIdentidad) {
        $this->cedulaIdentidad = $cedulaIdentidad;
    }

    public function getNumeroTelefono() {
        return $this->numeroTelefono;
    }

    public function setNumeroTelefono($numeroTelefono) {
        $this->numeroTelefono = $numeroTelefono;
    }


    public function getNumeroDeCuentaBancaria(){
        return $this->numeroDeCuentaBancaria;
    }
    
    public function setNumeroDeCuentaBancaria($numeroDeCuentaBancaria){
        $this->numeroDeCuentaBancaria = $numeroDeCuentaBancaria;
    }
  


    // Método para mostrar la información del trabajador
    public function mostrarInformacion() {
        return "Nombre: " . $this->primerNombre . " " . $this->segundoNombre . " " . $this->primerApellido . " " . $this->segundoApellido . "\n" .
               "Cédula de Identidad: " . $this->cedulaIdentidad . "\n" .
               "Número de Teléfono: " . $this->numeroTelefono."Numero de cuenta:". $this->numeroDeCuentaBancaria;
    }
}

// Ejemplo de uso de la clase Trabajador
$trabajador = new Trabajador("Juan", "Carlos", "Pérez", "Gómez", "12345678", "555-1234","01750000000000000000");
echo $trabajador->mostrarInformacion();

?>
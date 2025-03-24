<?php
$host = "localhost";
$user_db = "root";
$password = "";
$name_db = "recursos_humanos";

// Crear conexión
$conn = new mysqli($host, $user_db, $password, $name_db);

// Verificar conexión
if ($conn->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
    exit(); // Salir si hay un error
}


?>
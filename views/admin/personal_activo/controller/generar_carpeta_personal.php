<?php
// Datos del empleado
$cedula = "12345678"; // Reemplaza con la cédula real
$apellidos = "Pérez"; // Reemplaza con los apellidos reales
$nombres = "Juan"; // Reemplaza con los nombres reales

// Ruta de la carpeta principal
$carpetaPrincipal = 'personal/';

// Crear el nombre de la carpeta del empleado
$nombreCarpetaEmpleado = $cedula . ' ' . $apellidos . ' ' . $nombres;

// Crear la ruta completa de la nueva carpeta
$rutaCarpetaEmpleado = $carpetaPrincipal . $nombreCarpetaEmpleado;

// Verificar si la carpeta ya existe
if (!file_exists($rutaCarpetaEmpleado)) {
    // Crear la carpeta
    mkdir($rutaCarpetaEmpleado, 0777, true);
}

// Supongamos que el currículum se sube a través de un formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['curriculum'])) {
    $curriculum = $_FILES['curriculum'];

    // Verificar si hubo un error en la subida
    if ($curriculum['error'] == UPLOAD_ERR_OK) {
        // Ruta donde se guardará el currículum
        $rutaCurriculum = $rutaCarpetaEmpleado . '/' . basename($curriculum['name']);

        // Mover el archivo subido a la nueva carpeta
        if (move_uploaded_file($curriculum['tmp_name'], $rutaCurriculum)) {
            echo "Currículum subido correctamente a: " . $rutaCurriculum;
        } else {
            echo "Error al mover el currículum.";
        }
    } else {
        echo "Error en la subida del archivo: " . $curriculum['error'];
    }
}
?>

<!-- Formulario para subir el currículum -->
<form action="" method="post" enctype="multipart/form-data">
    <label for="curriculum">Subir currículum:</label>
    <input type="file" name="curriculum" id="curriculum" required>

    <label for="foto">Fotografia_empleado</label>
    <input type="file" name="foto" id="foto" required>
    <input type="submit" value="Enviar">
</form>
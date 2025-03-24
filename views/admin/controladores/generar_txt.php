<?php
include('../../../conexion/conexion.php');

/*
    Crear la carpeta 'archivos_txt' si no existe
*/
$dir = '../../../archivos_txt/';
if (!is_dir($dir)) {
    // Crear la carpeta y establecer permisos
    mkdir($dir, 0775, true); // Cambia 0775 a los permisos que consideres adecuados
}

// Generar el nombre del archivo (personalizable)
$nombre_archivo = 'nomina_' . date('Ymd_His') . '.txt';
$ruta_archivo = $dir . $nombre_archivo;

// Crear y abrir el archivo para escritura
$file = fopen($ruta_archivo, 'w');

if ($file) {
    // Escribir el contenido inicial en el archivo TXT
    fwrite($file, "Este es el contenido del archivo de nómina.\n");
$rif="";
fwrite($file,$rif."\n");
    $nombre="Victor Adrian";
    $apellido="Guillen Ramirez";
    $nacionalidad="V";
    $numero_de_cuenta="";
    $identificacion="27905225";
    $salario_total=12.98;
    fwrite($file, $nacionalidad.$identificacion.$numero_de_cuenta .$salario_total.$apellido.$nombre. "\n");
    fwrite($file, "Fecha y hora de generación: " . date('Y-m-d H:i:s') . "\n");

    // Cerrar el archivo
    fclose($file);

    echo "<script>
        alert('El archivo TXT para el pago de nómina ha sido generado de manera exitosa.');
        window.location= '../index.php';
    </script>";
} else {
    echo "Error al crear o abrir el archivo: " . print_r(error_get_last(), true) . "<br>";
}

// Cerrar conexión con la base de datos si está abierta
if ($conn) {
    mysqli_close($conn);
}
exit;
?>
<?php
require 'vendor/autoload.php'; // Asegúrate de que la ruta sea correcta

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PDO;

// Configuración de la base de datos
$host = 'localhost';
$db = 'nombre_de_tu_base_de_datos';
$user = 'tu_usuario';
$pass = 'tu_contraseña';

try {
    // Conexión a la base de datos
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta para obtener los datos de los trabajadores
    $stmt = $pdo->query("SELECT * FROM trabajadores");
    $trabajadores = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Crear un nuevo objeto Spreadsheet
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Establecer encabezados de columna
    $sheet->setCellValue('A1', 'ID');
    $sheet->setCellValue('B1', 'Nombre');
    $sheet->setCellValue('C1', 'Apellido');
    $sheet->setCellValue('D1', 'Email');
    $sheet->setCellValue('E1', 'Teléfono');
    // Agrega más columnas según tu tabla

    // Llenar la hoja con los datos de los trabajadores
    $row = 2; // Comenzar en la segunda fila
    foreach ($trabajadores as $trabajador) {
        $sheet->setCellValue('A' . $row, $trabajador['id']);
        $sheet->setCellValue('B' . $row, $trabajador['nombre']);
        $sheet->setCellValue('C' . $row, $trabajador['apellido']);
        $sheet->setCellValue('D' . $row, $trabajador['email']);
        $sheet->setCellValue('E' . $row, $trabajador['telefono']);
        // Agrega más columnas según tu tabla
        $row++;
    }

    // Crear un archivo Excel
    $writer = new Xlsx($spreadsheet);
    $fileName = 'trabajadores.xlsx';
    $writer->save($fileName);

    echo "Archivo Excel creado: $fileName";

} catch (PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
}
?>

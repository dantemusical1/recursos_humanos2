<?php
include('conexion.php'); // Asegúrate de que el nombre del archivo sea correcto

try {
    // Crear conexión
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verificar si se ha enviado el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['empleado_id'])) {
        // Obtener los datos del formulario
        $empleado_id = $_POST['empleado_id'];
        $primer_nombre = $_POST['primer_nombre'];
        $segundo_nombre = $_POST['segundo_nombre'];
        $primer_apellido = $_POST['primer_apellido'];
        $segundo_apellido = $_POST['segundo_apellido'];
        $edad = $_POST['edad'];
        $numero_empleado = $_POST['numero_empleado'];
        $fecha_contratacion = $_POST['fecha_contratacion'];
        $salario = $_POST['salario'];

        // Preparar la consulta de actualización
        $stmt = $pdo->prepare("UPDATE empleados SET 
            primer_nombre = :primer_nombre,
            segundo_nombre = :segundo_nombre,
            primer_apellido = :primer_apellido,
            segundo_apellido = :segundo_apellido,
            edad = :edad,
            numero_empleado = :numero_empleado,
            fecha_contratacion = :fecha_contratacion,
            salario = :salario
            WHERE id = :empleado_id");

        // Vincular los parámetros
        $stmt->bindParam(':primer_nombre', $primer_nombre);
        $stmt->bindParam(':segundo_nombre', $segundo_nombre);
        $stmt->bindParam(':primer_apellido', $primer_apellido);
        $stmt->bindParam(':segundo_apellido', $segundo_apellido);
        $stmt->bindParam(':edad', $edad);
        $stmt->bindParam(':numero_empleado', $numero_empleado);
        $stmt->bindParam(':fecha_contratacion', $fecha_contratacion);
        $stmt->bindParam(':salario', $salario);
        $stmt->bindParam(':empleado_id', $empleado_id);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Redirigir a index.php después de la actualización
            header("Location: index.php");
            exit(); // Asegúrate de llamar a exit después de header
        } else {
            echo "Error al actualizar los datos del empleado.";
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
<?php
include('conexion.php'); // Asegúrate de que el archivo de conexión esté correcto

function jubilarEmpleado($empleado_id) {
    global $pdo; // Asegúrate de que $pdo esté disponible

    try {
        // Obtener los datos del empleado
        $stmt = $pdo->prepare("SELECT * FROM empleados WHERE id = :empleado_id");
        $stmt->bindParam(':empleado_id', $empleado_id);
        $stmt->execute();
        $empleado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($empleado) {
            // Insertar el empleado en la tabla jubilados
            $stmt = $pdo->prepare("INSERT INTO jubilados (primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, fecha_nacimiento, numero_empleado, fecha_contratacion, fecha_jubilacion, salario) VALUES (:primer_nombre, :segundo_nombre, :primer_apellido, :segundo_apellido, :fecha_nacimiento, :numero_empleado, :fecha_contratacion, :fecha_jubilacion, :salario)");

            // Vincular los parámetros
            $stmt->bindParam(':primer_nombre', $empleado['primer_nombre']);
            $stmt->bindParam(':segundo_nombre', $empleado['segundo_nombre']);
            $stmt->bindParam(':primer_apellido', $empleado['primer_apellido']);
            $stmt->bindParam(':segundo_apellido', $empleado['segundo_apellido']);
            $stmt->bindParam(':fecha_nacimiento', $empleado['fecha_nacimiento']);
            $stmt->bindParam(':numero_empleado', $empleado['numero_empleado']);
            $stmt->bindParam(':fecha_contratacion', $empleado['fecha_contratacion']);
            
            // Establecer la fecha de jubilación como la fecha actual
            $fecha_jubilacion = date('Y-m-d'); // Fecha actual
            $stmt->bindParam(':fecha_jubilacion', $fecha_jubilacion);
            $stmt->bindParam(':salario', $empleado['salario']);

            // Ejecutar la inserción
            if ($stmt->execute()) {
                // Eliminar el empleado de la tabla empleados
                $stmt = $pdo->prepare("DELETE FROM empleados WHERE id = :empleado_id");
                $stmt->bindParam(':empleado_id', $empleado_id);
                $stmt->execute();

                echo "Empleado jubilado exitosamente.";
            } else {
                echo "Error al jubilar al empleado.";
            }
        } else {
            echo "Empleado no encontrado.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Ejemplo de uso
// jubilarEmpleado(1); // Llama a la función con el ID del empleado que deseas jubilar
?>
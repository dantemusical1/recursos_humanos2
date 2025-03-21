<?php
include('conexion.php');

// Consulta para obtener los trabajadores activos
$sql = "SELECT id, nombre, apellido, cargo FROM trabajadores WHERE estado = 'activo'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabajadores Activos</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Trabajadores Activos</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Cargo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                // Mostrar los datos de cada fila
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["id"] . "</td>
                            <td>" . $row["nombre"] . "</td>
                            <td>" . $row["apellido"] . "</td>
                            <td>" . $row["cargo"] . "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No hay trabajadores activos</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>

<?php
// Cerrar la conexión
$conn->close();
?>
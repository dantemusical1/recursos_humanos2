<?php
require_once('clases/Jubilados.php');
include('conexion.php');
$empleados = obtenerEmpleados(); // Obtener todos los empleados
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Empleados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script>
function cargarDatos(id, primerNombre, segundoNombre, primerApellido, segundoApellido, edad, numeroEmpleado, fechaContratacion, salario) {
    document.getElementById('empleado_id').value = id;
    document.getElementById('primer_nombre').value = primerNombre;
    document.getElementById('segundo_nombre').value = segundoNombre;
    document.getElementById('primer_apellido').value = primerApellido;
    document.getElementById('segundo_apellido').value = segundoApellido;
    document.getElementById('edad').value = edad;
    document.getElementById('numero_empleado').value = numeroEmpleado;
    document.getElementById('fecha_contratacion').value = fechaContratacion;
    document.getElementById('salario').value = salario;
}
</script>
</head>
<body>

<h1>Lista de Empleados</h1>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>Nombre Completo</th>
                <th>Fecha de Nacimiento</th>
                <th>Número de Empleado</th>
                
                <th>Fecha de Contratación</th>
                <th>Salario Mensual</th>
                <th>Salario Anual</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($empleados as $empleado): ?>
                <tr>
                    <td><?php echo $empleado->id; ?></td>
                    <td><?php echo htmlspecialchars($empleado->primerNombre . ' ' . $empleado->primerApellido); ?></td>
                    <td><?php echo htmlspecialchars($empleado->numeroEmpleado); ?></td>
                    <td><?php echo htmlspecialchars($empleado->fechaContratacion); ?></td>
                    <td><?php echo htmlspecialchars(number_format($empleado->salario, 2)); ?> Bs</td>
                    <td><?php echo htmlspecialchars(number_format($empleado->salarioAnual(), 2)); ?> Bs</td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalActualizar" onclick="cargarDatos('<?php echo htmlspecialchars($empleado->id); ?>', '<?php echo htmlspecialchars($empleado->primerNombre); ?>', '<?php echo htmlspecialchars($empleado->segundoNombre); ?>', '<?php echo htmlspecialchars($empleado->primerApellido); ?>', '<?php echo htmlspecialchars($empleado->segundoApellido); ?>', '<?php echo htmlspecialchars($empleado->edad); ?>', '<?php echo htmlspecialchars($empleado->numeroEmpleado); ?>', '<?php echo htmlspecialchars($empleado->fechaContratacion); ?>', '<?php echo htmlspecialchars($empleado->salario); ?>')">
                            Actualizar
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
include('form_modal.php');
?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body></html>
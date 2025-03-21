<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Salarios de Empleados</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .table-hover tbody tr:hover {
            background-color: #f5f5f5;
        }
        .table-hover tbody tr:hover td {
            background-color: #f5f5f5;
        }
        .table-hover tbody tr:hover th {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Tabla de Salarios de Empleados</h2>
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>CEDULA</th>
                    <th>NOMBRES Y APELLIDOS</th>
                    <th>CARGO</th>
                    <th>FECHA DE INGRESO</th>
                    <th>SUELDO BASICO</th>
                    <th>PRIMA DE PROFESIONALIZACION</th>
                    <th>PRIMA ANTIGÜEDAD</th>
                    <th>PRIMAS POR HIJOS</th>
                    <th>BONO APN</th>
                    <th>HORAS EXTRAS/DIAS ADICIONALES</th>
                    <th>BONO NOCTURNO</th>
                    <th>DIA FERIADO</th>
                    <th>DIAS ADICIONALES</th>
                    <th>CESTA TIKET</th>
                    <th>BONO VACACIONAL</th>
                    <th>SEGURO SOCIAL OBLIGATORIO</th>
                    <th>FAOV</th>
                    <th>FONDO DE PENSION Y JUBILACION</th>
                    <th>PARO FORZOSO</th>
                    <th>MONTO BS</th>
                    <th>CODIGO TRABAJADOR</th>
                    <th>BONO DIA DEL NIÑO</th>
                </tr>
            </thead>
            <tbody>
               <?php
include('controller/calculo_pensiones.php');


                foreach ($empleados as $empleado) {
                    $salarioNeto = calcularSalario($empleado);
                    echo "<tr>
                        <td>{$empleado['cedula']}</td>
                        <td>{$empleado['nombres_apellidos']}</td>
                        <td>{$empleado['cargo']}</td>
                        <td>{$empleado['fecha_ingreso']}</td>
                        <td>{$empleado['sueldo_basico']}</td>
                        <td>{$empleado['prima_profesionalizacion']}</td>
                        <td>{$empleado['prima_antiguedad']}</td>
                        <td>{$empleado['primas_por_hijos']}</td>
                        <td>{$empleado['bono_apn']}</td>
                        <td>{$empleado['horas_extras']}</td>
                        <td>{$empleado['bono_nocturno']}</td>
                        <td>{$empleado['dia_feriado']}</td>
                        <td>{$empleado['dias_adicionales']}</td>
                        <td>{$empleado['cesta_tiket']}</td>
                        <td>{$empleado['bono_vacacional']}</td>
                        <td>{$empleado['seguro_social']}</td>
                        <td>{$empleado['faov']}</td>
                        <td>{$empleado['fondo_pension']}</td>
                        <td>{$empleado['paro_forzoso']}</td>
                        <td>{$salarioNeto}</td>
                        <td>{$empleado['codigo_trabajador']}</td>
                        <td>{$empleado['bono_dia_del_nino']}</td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

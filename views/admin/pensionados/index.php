<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Empleados</title>
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
        <h2 class="text-center">Tabla de Empleados</h2>
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ITEM</th>
                    <th>NOMBRES Y APELLIDOS</th>
                    <th>GENERO</th>
                    <th>NACIONALIDAD</th>
                    <th>CEDULA</th>
                    <th>SALARIO</th>
                    <th>25% AGUINALDOS</th>
                    <th>DIRECCIÓN</th>
                    <th>TELEFONO</th>
                    <th>NUMERO DE CUENTA</th>
                    <th>DEPENDENCIA</th>
                </tr>
            </thead>
            <tbody>
            <?php    
           echo '<tr>';
                   
            echo    '</tr>';
                ?>
                <!-- Agrega más filas según sea necesario -->
            </tbody>
        </table>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

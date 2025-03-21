<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h2 class="text-center">MONTO Por ANTIGÜEDAD</h2>


        </div>


        <div class="row">
            <div class="col-md-9">
                <h2 class="text-center">Bonificacion Academica</h2>

<p>        La bonificacion academica es calculada a partir del salario base.
        A continuacion se presentan los % en base a los cuales se calcula</p>

        <table class="table-info">
            <thead>
                <th>Grado academico</th>
                <th>Porcentaje</th>
                <th>accion</th>
            </thead>
            <tbody>

            
        </table>

        </div>



        if ($titulo == 'BACHILLER') {
                $bonificacion = $sueldo * 0.10;
                echo '<td>' . $bonificacion . '</td>';
            } elseif ($titulo == 'TSU') {
                $bonificacion = $sueldo * 0.20;
                echo '<td>' . $bonificacion . '</td>';
            } elseif ($titulo == 'PROFESIONAL') {
                $bonificacion = $sueldo * 0.25;
                echo '<td>' . $bonificacion . '</td>';
            } elseif ($titulo == 'ESPECIALISTA') {
                $bonificacion = $sueldo * 0.30;
                echo '<td>' . $bonificacion . '</td>';
            } elseif ($titulo == 'MAGISTER') {
                $bonificacion = $sueldo * 0.35;
                echo '<td>' . $bonificacion . '</td>';
            } elseif ($titulo == 'DOCTORADO') {
                $bonificacion = $sueldo * 0.40;
                echo '<td>' . $bonificacion . '</td>';
            } else {
                $bonificacion = 0;
                echo '<td>' . $bonificacion . '</td>';
}





    </div>
</body>
</html>
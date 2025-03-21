<?php
include('../../conexion/conexion.php');
include('controller/bonificaciones.php');
?>

<!DOCTYPE html> <html lang="es"> <head> <meta charset="UTF-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<!--
<link rel="stylesheet" href="../../node_modules/bootstrap-icons/font/bootstrap-icons.css"> 
<link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.css"> -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<link rel="icon" href="../../img/escudo.png" type="image/x-icon"> 
<title>Administrador de pagina</title> 
<style> 
body.dark-mode { background-color: #121212; color: #ffffff; } 
.dark-mode .navbar { background-color: #333333; } 
</style> 
</head> 
<body> 

<nav class="navbar navbar-expand-lg" style="background-color:#072354;">
        <div class="container-fluid"> 
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> 
                <span class="navbar-toggler-icon"></span> </button> <div class="collapse navbar-collapse" id="navbarSupportedContent"> <ul class="navbar-nav me-auto mb-2 mb-lg-0"> 
                 


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">listados <i class="bi bi-card-checklist"></i>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item"  href="personal_cumple.php" ><i class="bi bi-calendar2-event"></i>Personal de cumpleaños</a></li>
            <li><a class="dropdown-item" href="../../pdf/listado.php"><i class="bi bi-file-pdf-fill"></i> generar listado de trabajadores</a></li>
            <li><a class="dropdown-item" href="views/listado_backup_admin.php"><i class="bi bi-filetype-sql"></i> ver listado de backups</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="views/txt.php" > <i class="bi bi-filetype-txt"></i>Listado de archivo TXT</a></li>
          </ul>
        </li>
              
              
                <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Opciones
          </a>
          <ul class="dropdown-menu">
       
            <li><a class="dropdown-item"  href="#" onclick="nuevoEmpleado()">Nuevo empleado</a></li>
            <li><a class="dropdown-item" href="../../pdf/listado.php"><i class="bi bi-file-pdf-fill"></i> generar listado</a></li>
            <li><a class="dropdown-item" href="#" onclick="generarBakup()" ><i class="bi bi-filetype-sql"></i> Generar Bachup de la base de datos actual</a></li>
             <li><a class="dropdown-item" href="views/modificar_salario.php"><i class="bi bi-journal-bookmark-fill"></i> Modificar salaios  </a></li>
            <li><hr class="dropdown-divider"> </li>
            <li><a class="dropdown-item" href="#" onclick="generarArchivo()"> <i class="bi bi-filetype-txt"></i>Generar archivo TXT</a></li>
          </ul>
        </li>
               


<!--
Aqui termina el menu
-->
                <li class="nav-item"> <a href="controller/salir.php" class="btn btn-outline-danger"> <i class="bi bi-box-arrow-right"></i></a> </li> 
                <li class="nav-item"> <a href="views/formularios/registro_admin.php" class="btn btn-outline-success"> Registro admin nuevo</a> </li> </ul> <!-- Este formulario es el buscador en la tabla de datos--> <form method="post" class="d-flex" role="search"> 
                <input class="form-control me-2" type="search" placeholder="Buscar empleado" name="txtbuscar" id="campo" aria-label="Buscar"> 
                <button class="btn btn-outline-success" name="btnbuscar" type="submit"><i class="bi bi-search"></i></button> 
            </form> 


                <button id="theme-toggle" class="btn btn-outline-dark ms-3">Modo Oscuro</button> 


            </div> 
        </div> 
            </nav> 
                <script> 
                const toggleButton = document.getElementById('theme-toggle'); 
                toggleButton.addEventListener('click', () => { document.body.classList.toggle('dark-mode'); 
                if (document.body.classList.contains('dark-mode')) { toggleButton.textContent = 'Modo Claro'; 
                toggleButton.classList.remove('btn-outline-dark'); 
                toggleButton.classList.add('btn-outline-light'); } 
                else { toggleButton.textContent = 'Modo Oscuro'; 
                toggleButton.classList.remove('btn-outline-light'); 
                toggleButton.classList.add('btn-outline-dark'); } }); 

                </script>
    <div class="container">
    

    <?php


            /*
            Esta seccion se encarga de la seguridad del sistema de manera que 
            A pesar de tener la ruta apsoluta si no hay usuario registrado no
            */


//session_start();

?>
<!--
    <div class="mt-4">
        <button class="btn btn-primary" onclick="nuevoEmpleado()"> 
            <i class="bi bi-person-fill-add"> </i> Nuevo empleado
        </button>
    </div>
                -->
<!--
        <div class="mt-4">
        <button class="btn btn-primary" onclick="generarArchivo()">
           
        </button>
        </div>
                -->
    </div>
    <script>
    function generarArchivo() {
        window.location.href = '../../txt_generados/generar_txt.php';
    }

    function generarBakup(){

        window.location.href = '../../bakup_generadas/generar_bakup.php';
                        }
    function nuevoEmpleado(){
        window.location.href='views/formularios/agregar.php';
    }
</script>

<?php
  
        

// Obtener el término de búsqueda a partir de lo ingresado en el input
/*
if (isset($_POST['txtbuscar'])) {
    $buscar = $_POST['txtbuscar'];

    // Verificar si se ha ingresado algo en el campo de búsqueda
    if (!empty($buscar)) {

        // Realizar la consulta SQL
        $misql = "SELECT `id_trabajador`, `fecha_contratacion`, `nombres`, `apellidos`, `nacionalidad`, `cedula`, `num_telf`, `correo_electronico`, `num_de_cuenta`, `num_hijos`, `genero`, `fecha_nacimiento`, `estatus`, `tipo_de_personal`, `cargo`, `dependencia`, `grado_de_instruccion`, `cod_trabajador`, `dias_adicionales`, `horas_diurnas`, `horas_nocturnas`, `estado`, `sueldo`, `id_sueldo` 
                FROM `personal`
                WHERE nombres LIKE '%$buscar%'
                OR apellidos LIKE '%$buscar%'
                OR  cedula LIKE '%$buscar%'
                OR num_de_cuenta LIKE '%$buscar%'";

        $resultado = mysqli_query($conn, $misql);

        if (mysqli_num_rows($resultado) > 0) {
            echo "Se han encontrado los siguientes resultados para: <b>$buscar</b><br>";


            //Aqui por medio de un ciclo while mostramos las coincidencias dentro de la tabla sql
echo '<div>';
  echo '<table class="table-primary table-hover">' ;
  echo  '<thead class="table-success">';
	echo '<tr>';
    echo '<th scope="col">Fecha de contratacion</th>';
    echo '<th scope="col">Nombre Completo</th>';
    echo '<th scope="col">Cedula de identidad</th>';
    echo '<th scope="col"> numero telefonico</th>';   
    echo '<th scope="col">Numero de cuenta</th>';
    echo '<th scope="col">Cargo</th>';
    echo '<th scope="col">estatus</th>';
    echo ' <th scope="col">Grado de instruccion</th>
      <th scope="col">correo electronico</th>
     <th scope="col">Codigo del trabajador</th>';
    echo '<th scope="col">sueldo</th>';
    echo '<th scope="col">Accion</th>';
    echo '</tr>';
    echo '</thead>';

    echo '<tbody>';
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo '</tr>';
              echo "<td>" . $fila['fecha_contratacion'] ."</td>";
              echo  '<td>'.$fila['nombres']." " .$fila['apellidos'].'</td>';
              echo "<td class='text-center'>" . $fila['nacionalidad']."-".$fila['cedula']."</td>";          
              echo "<td>" . $fila['num_telf'] ."</td>";
              echo "<td class='text-center'>" . $fila['num_de_cuenta'] ."</td>";
              echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                    echo "<div>";
                 }

                } else {
            echo "No se encontraron resultados para: <b>$buscar</b>";
                        }
                 } else {
       
                     }
    ?>  


<div class="container-fluid">

<h4 class="text-center">Tabla de Personal</h4>

<?php // Estas son las responsables de la cuenta del personal femenino y masculino 
// Esta información es importante para facilitar el trabajo del analista de nómina. 
// Ejecuta la consulta para contar el número de trabajadoras femeninas 
$totalpersonalfemenino = mysqli_query($conn, "SELECT COUNT(*) as total FROM personal WHERE genero='F'");
 if ($totalpersonalfemenino) { 
    // Obtener el resultado de la consulta 
    $personalfemenino = mysqli_fetch_assoc($totalpersonalfemenino)['total']; } else { 
        // Manejar el error en caso de que la consulta falle 
        echo "Error en la consulta: " . mysqli_error($conn); } 
        // Ejecutar la consulta para contar el número de trabajadores hombres 
        $totalpersonalmasculino = mysqli_query($conn, "SELECT COUNT(*) as total FROM personal WHERE genero='M'"); if ($totalpersonalmasculino) { 
            // Obtener el resultado de la consulta 
            $personalmasculino = mysqli_fetch_assoc($totalpersonalmasculino)['total']; } 
            else { 
            // Manejar el error en caso de que la consulta falle 
            echo "Error en la consulta: " . mysqli_error($conn); } 
            // Ejecutar la consulta para contar el número total de trabajadores 
            $totalpersonal = mysqli_query($conn, "SELECT COUNT(*) as total FROM personal"); 
            if ($totalpersonal) { 
            // Obtener el resultado de la consulta 
            $totalpersonal = mysqli_fetch_assoc($totalpersonal)['total']; } else { 
            // Manejar el error en caso de que la consulta falle 
            echo "Error en la consulta: " . mysqli_error($conn); } 
        echo '<table class="table table-dark table-hover"> <thead> <tr> <th>Número de trabajadores actuales en nómina: <strong>' . $totalpersonal . '</strong></th> <th>Total de personal femenino: <strong>' . $personalfemenino . '</strong></th> <th>Total personal masculino: <strong>' . $personalmasculino . '</strong></th> </tr> </thead> </table>'; ?>

*/?>
 


<table class="table table-dark table-hover">
    <thead>
        <tr>
            <th scope="col">Fecha de contratacion</th>
            <th scope="col">Nombre completo</th>
            <th scope="col">Genero</th>
            <th scope="col">Estatus</th>
            <th scope="col">Tipo de personal</th>
            <th scope="col">Cargo</th>
            <th scope="col">Nacionalidad</th>
            <th scope="col">Cedula</th>
            <th scope="col">Grado de instruccion</th>
            <th scope="col">Codigo del trabajador</th>
            <th scope="col">DIAS ADICIONALES</th>
            <th scope="col">HORAS DIURNAS</th>
            <th scope="col">HORAS NOCTURNAS</th>
            <th scope="col">N° HIJOS</th>
            <th scope="col">ANTIGÜEDAD</th>
            <th scope="col">MONTO P/ PROFESIONALIZACION</th>
            <th scope="col">MONTO P/ ANTIGÜEDAD</th>
            <th scope="col">MONTO P/ HIJOS</th>
            <th scope="col">TOTAL PRIMAS</th>
            <th scope="col">VALOR BONO NOCTURNO</th>
            <th scope="col">MONTOS HORA NOCTURNA</th>
            <th scope="col">MONTO HORAS DIURNAS ADICIONALES</th>
            <th scope="col">HORAS DIURNAS ADICIONALES</th>
            <th scope="col">MONTO DIAS ADICIONALES</th>
            <th scope="col">TOTAL EXTRAS</th>
            <th scope="col">TOTAL SUELDOS MENSUAL</th>
            <th scope="col">CARGO</th>
            <th scope="col">QUINCENA</th>
            <th scope="col">SSO 4%</th>
            <th scope="col">PF 0,5%</th>
            <th scope="col">FAOV 1%</th>
            <th scope="col">FPJ 3%</th>
            <th scope="col">TOTAL RETENCIONES</th>
            <th scope="col">TOTAL A PAGAR</th>
            <th scope="col">BONO VACACIONAL</th>
            <th scope="col">BONO EXTRAS PRIMERA QUINCENA</th>
            <th scope="col">BONO EXTRAS SEGUNDA QUINCENA</th>
            <th scope="col">CESTA TIKET</th>
            <th scope="col">BONO APN</th>
          <!-- <th scope="col">BON DIAS FERIADOS</th>-->
            <th scope="col">DIRECCIÓN</th>
            <th scope="col">TELÉFONO</th>
            <th scope="col">NÚMERO DE CUENTA</th>
            <th scope="col">DEPENDENCIA</th>
            <th scope="col">BONO DIA DEL NIÑO</th>
            <th scope="col">MADRES</th>
            <th scope="col">PADRES</th>
            <th scope="col">25% DE AGUINALDOS</th>
            <th scope="col">Accion a realizar</th>
        </tr>
    </thead>
    <tbody>

<?php
/*



// Consulta para obtener los datos de la tabla
        $sql = "SELECT * FROM `personal` WHERE 1";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Mientras haya filas en el resultado, muestra los datos
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                $fecha_contratacion = $row['fecha_contratacion'];
                $fecha_contratacion_formateada = date('d-m-Y', strtotime($fecha_contratacion));
                echo "<td>" . htmlspecialchars($fecha_contratacion_formateada) . "</td>";
                echo "<td class='text-center'>" . htmlspecialchars($row['nombres']) . " " . htmlspecialchars($row['apellidos']) . "</td>";
                echo "<td class='text-center'>" . htmlspecialchars($row['genero']) . "</td>";
                echo "<td>" . htmlspecialchars($row['estatus']) . "</td>";
                echo "<td>" . htmlspecialchars($row['tipo_de_personal']) . "</td>";
                echo "<td class='text-center'>" . htmlspecialchars($row['cargo']) . "</td>";
                echo "<td class='text-center'>" . htmlspecialchars($row['nacionalidad']) . "</td>";
                echo "<td>" . htmlspecialchars($row['cedula']) . "</td>";
                echo "<td>" . htmlspecialchars($row['grado_de_instruccion']) . "</td>";
                echo "<td>" . htmlspecialchars($row['cod_trabajador']) . "</td>";
                echo "<td>" . htmlspecialchars($row['dias_adicionales']) . "</td>";
                echo "<td>" . htmlspecialchars($row['horas_diurnas']) . "</td>";
                echo "<td>" . htmlspecialchars($row['horas_nocturnas']) . "</td>";
                echo "<td>" . htmlspecialchars($row['num_hijos']) . "</td>";
                
                // Calculo de los años de antigüedad
                $fecha_de_contratacion = $row['fecha_contratacion'];
                $timestamp_de_contratacion = strtotime($fecha_de_contratacion);
                $tiempo_transcurrido = time() - $timestamp_de_contratacion;
                $anos_transcurridos = floor($tiempo_transcurrido / (365 * 60 * 60 * 24));
                echo "<td>" . $anos_transcurridos . "</td>";            
                $sueldo = $row['sueldo'];


// Variable para almacenar el título según el caso
                $titulo = $row['grado_de_instruccion'];

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




//MONTO P/ ANTIGÜEDAD
if ($anos_transcurridos > 0) {

    if ($anos_transcurridos == 1) {
        $bonificacion_antiguedad =  $sueldo * 0.1;
    } elseif ($anos_transcurridos == 2) {
        $bonificacion_antiguedad =  $sueldo * 0.02;
    } elseif ($anos_transcurridos == 3) {
        $bonificacion_antiguedad =  $sueldo * 0.03;
    } elseif ($anos_transcurridos == 4) {
        $bonificacion_antiguedad =  $sueldo * 0.04;
    } elseif ($anos_transcurridos == 5) {
        $bonificacion_antiguedad =  $sueldo * 0.05;
    } elseif ($anos_transcurridos == 6) {
        $bonificacion_antiguedad =  $sueldo * 0.062;
    } elseif ($anos_transcurridos == 7) {
        $bonificacion_antiguedad =  $sueldo * 0.074;
    } elseif ($anos_transcurridos == 8) {
        $bonificacion_antiguedad =  $sueldo * 0.086;
    } elseif ($anos_transcurridos == 9) {
        $bonificacion_antiguedad =  $sueldo * 0.098;
    } elseif ($anos_transcurridos == 10) {
        $bonificacion_antiguedad =  $sueldo * 0.11;
    } elseif ($anos_transcurridos == 11) {
        $bonificacion_antiguedad =  $sueldo * 0.124;
    } elseif ($anos_transcurridos == 12) {
        $bonificacion_antiguedad =  $sueldo * 0.138;
    } elseif ($anos_transcurridos == 13) {
        $bonificacion_antiguedad =  $sueldo * 0.152;
    } elseif ($anos_transcurridos == 14) {
        $bonificacion_antiguedad =  $sueldo * 0.166;
    } elseif ($anos_transcurridos == 15) {
        $bonificacion_antiguedad =  $sueldo * 0.18;
    } elseif ($anos_transcurridos == 16) {
        $bonificacion_antiguedad =  $sueldo * 0.196;
    } elseif ($anos_transcurridos == 17) {
        $bonificacion_antiguedad =  $sueldo * 0.212;
    } elseif ($anos_transcurridos == 18) {
        $bonificacion_antiguedad =  $sueldo * 0.228;
    } elseif ($anos_transcurridos == 19) {
        $bonificacion_antiguedad =  $sueldo * 0.244;
    } elseif ($anos_transcurridos == 20) {
        $bonificacion_antiguedad =  $sueldo * 0.26;
    } elseif ($anos_transcurridos == 21) {
        $bonificacion_antiguedad =  $sueldo * 0.278;
    } elseif ($anos_transcurridos == 22) {
        $bonificacion_antiguedad =  $sueldo * 0.296;
    } else {
        $bonificacion_antiguedad =  $sueldo * 0.30;
    }
    echo '<td>' . $bonificacion_antiguedad . '</td>';
} else {
    $bonificacion_antiguedad = 0;
    echo '<td>' . $bonificacion_antiguedad . '</td>';
}


//Bonificacion por hijos
echo '<td>'.$row['num_hijos']* 12.5.'</td>';


//Aqui va el sueldo mensual

echo '<td>' . $sueldo . '</td>';

//Aqui va a valor bono nocturno.
 $bono_nocturno=$sueldo*0.30 ;

echo "<td>".$bono_nocturno."</td>";



//Aqui va el valor de las horas nocturnas
if ($row['horas_nocturnas'] > 0) {
    $sueldo = $row['sueldo'];
    $valor_bono_nocturno = (((($sueldo / 30) / 8) * 0.50) + (($sueldo / 30) / 8)) * 0.30 + ((($sueldo / 30) / 8) * 0.50) + (($sueldo / 30) / 8);
    $valor_bono_nocturno *= $row['horas_nocturnas'];
    echo '<td>' . $valor_bono_nocturno . '</td>';
} else {
    echo '<td>0</td>';
}


//Monto horas diurnas adicionales
if ($row['horas_diurnas'] > 0) {
    $monto_horas_diurnas = ($sueldo / 240 * $row['horas_diurnas']) + (($sueldo / 240) * 0.5);
    echo '<td>' . $monto_horas_diurnas . '</td>';
} else {
    $monto_horas_diurnas = 0;
    echo '<td>' . $monto_horas_diurnas . '</td>';
}

// HORAS DIURNAS ADICIONALES
if ($row['horas_diurnas'] > 8) {
    $diurnas_adicionales = $row['horas_diurnas'] - 8;
    echo '<td>' . $diurnas_adicionales . '</td>';
} else {
    $diurnas_adicionales = 0;
    echo '<td>' . $diurnas_adicionales . '</td>';
}

//MONTO DIAS ADICIONALES
if ($row['dias_adicionales'] > 0) {
    $sueldo= $row['sueldo'];
    $dias_adicionales = $row['dias_adicionales'];
    $sueldo_diario = $sueldo / 30;
    $sueldo_dias_adicionales = (($sueldo_diario * 0.5) + $sueldo_diario) * $dias_adicionales;
    echo '<td>' . $sueldo_dias_adicionales . '</td>';
} else {
    echo '<td>0</td>';
}


//TOTAL EXTRA

if($row['horas_diurnas']>8 || $row['horas_nocturnas']>8){
   // Horas diurnas
$sueldo = $row['sueldo'];
$monto_horas_diurnas = ($sueldo / 240 * $row['horas_diurnas']) + (($sueldo / 240) * 0.5);
$sueldo_diario = $sueldo / 30;
$sueldo_dias_adicionales = (($sueldo_diario * 0.5) + $sueldo_diario) * $dias_adicionales;

// Horas nocturnas
$monto_horas_nocturnas = ((($sueldo_diario / 8) * 0.50) + (($sueldo_diario / 8) * 0.30) + (($sueldo_diario / 8) * 0.50) + ($sueldo_diario / 8));

// Total extra
$total_extra = $sueldo_dias_adicionales + $diurnas_adicionales + $monto_horas_nocturnas;


echo '<td>'. round($total_extra,2).'</td>';

}else{
    echo '<td>0</td>';
}

//TOTAL SUELDOS MENSUAL	

// Horas diurnas
$sueldo = $row['sueldo'];
$monto_horas_diurnas = ($sueldo / 240 * $row['horas_diurnas']) + (($sueldo / 240) * 0.5);
$sueldo_diario = $sueldo / 30;
$sueldo_dias_adicionales = (($sueldo_diario * 0.5) + $sueldo_diario) * $dias_adicionales;

// Horas nocturnas
$monto_horas_nocturnas = ((($sueldo_diario / 8) * 0.50) + (($sueldo_diario / 8) * 0.30) + (($sueldo_diario / 8) * 0.50) + ($sueldo_diario / 8));

// Total extra
$total_extra = $sueldo_dias_adicionales + $diurnas_adicionales + $monto_horas_nocturnas;
//sueldo mensual
$sueldo_mensual=$sueldo+$total_extra;

echo "<td>".round($sueldo_mensual,2)."</td>";


//Cargo ocupado

echo "<td class='text-center'>".$row['cargo']."</td>";

//QUINCENA 


$quincena=$sueldo_mensual/2;

echo "<td>".round($quincena,2)."</td>";

//Seguro social obligatorio

$seguro_social_obligatorio=(($sueldo*12)/52)*0.04;

echo "<td>".round($seguro_social_obligatorio,2)."</td>";



//Paro forzoso
$paro_forzoso=((($sueldo*12)/52)*0.05);

echo "<td>".round($paro_forzoso,2)."</td>";



//Faov

$faov=(($sueldo*0.01)/2);

echo "<td>".round($faov,2)."</td>";



//FPJ 

$fpj=(($sueldo*0.03)/2);

echo "<td>".round($fpj,2)."</td>";



//total retenciones
$total_reteciones=$seguro_social_obligatorio+$paro_forzoso+$faov+$fpj;
echo "<td>".round($total_reteciones,2)."</td>";



//Total a pagar
$total_a_pagar=$quincena-$total_reteciones;
echo "<td>".round($total_a_pagar,2)."</td>";



//Bono vacacional




//fecha de contratacion
$fecha_contratacion = $row['fecha_contratacion'];


// Calculamos el tiempo transcurrido en años
$tiempo_transcurrido = (new DateTime())->diff(new DateTime($fecha_contratacion))->y;

// Obtenemos el mes actual y el mes de contratación
$mes_actual = date('m');
$mes_contratacion = date('m', strtotime($fecha_contratacion));

if ($tiempo_transcurrido >= 1 && $mes_actual == $mes_contratacion) {

// La persona cumple con los requisitos para recibir el bono vacacional
   
// Horas diurnas
$sueldo = $row['sueldo'];
$monto_horas_diurnas = ($sueldo / 240 * $row['horas_diurnas']) + (($sueldo / 240) * 0.5);
$sueldo_diario = $sueldo / 30;
$sueldo_dias_adicionales = (($sueldo_diario * 0.5) + $sueldo_diario) * $dias_adicionales;

// Horas nocturnas
$monto_horas_nocturnas = ((($sueldo_diario / 8) * 0.50) + (($sueldo_diario / 8) * 0.30) + (($sueldo_diario / 8) * 0.50) + ($sueldo_diario / 8));

// Total extra
$total_extra = $sueldo_dias_adicionales + $diurnas_adicionales + $monto_horas_nocturnas;

//sueldo mensual
$sueldo_mensual=$sueldo+$total_extra;
  





*/



//bono vacacional
$bono_vacacional=(($sueldo_mensual)*(3/2));
    /***
     * 
     * ((AE2/30)*90);"0")
     */
   //  echo "<td>".round($bono_vacacional,2)."</td>";
    //} else {
    // La persona no cumple con los requisitos
    // echo "<td>0</td>";
//}

//Primera quincena 
$total_a_pagar;

echo "<td>".round($total_a_pagar,2)."</td>";



//segunda quincena
$total_a_pagar;

echo "<td>".round($total_a_pagar,2)."</td>";


//Cesta tiket
echo "<td>".round($row['cesta_tiket'],2)."</td>";

//Bono apn

echo "<td>".$row['bono_apn']."</td>";


//BONO DIA FERIADos
/*
echo "<td>";
echo "FALTA POR CALCULAR";
echo "</td>";
*/
/*

//Direccion de correo
        echo "<td>".$row['correo_electronico']."</td>";

//Num telefonico

echo "<td>".$row['num_telf']."</td>";

echo "<td>".$row['num_de_cuenta']."</td>";

echo "<td>".$row['dependencia']."</td>";


///bono dia del niño
echo "<td>";
if($row['num_hijos']>=1){
$bonificacion_dia_nino=12.5;

echo round($bonificacion_dia_nino,2);
echo "</td>";

}else{
    $bonificacion_dia_nino=0;
   
    echo round($bonificacion_dia_nino,2);        
    echo "</td>";

}



//MADRES

if($row['num_hijos']>0){

    if($row['genero']=="F"){
        echo "<td>".$bono_dia_de_la_madre="SI"."</td>";
    }
    }if($row['genero']=="M"){
        echo "<td>". $bono_dia_de_la_madre="NO"."</td>";
    }
    
    //Padres
    if($row['num_hijos']>0){
    
        if($row['genero']=="F"){
            echo "<td>".$bono_dia_de_la_madre="NO"."</td>";
        }
        }if($row['genero']=="M"){
            echo "<td>".$bono_dia_de_la_madre="SI"."</td>";
        }
        
    //Bonificacion de aguinaldos 25%
    /**
 * =SI([@AÑO]<2023;[@[SALARIO ]]+[@[TOTAL PRIMAS]];(([@[SALARIO ]]+[@[TOTAL PRIMAS]])/30)*([@MES]-13)*-10*0,25)
 
 
 
 
 
 */








 /*
if($anos_transcurridos>1){
   $aguinaldo= $sueldo+$total_extra;
   echo "<td>".$aguinaldo."</td>";
}else{

    $fecha_inicio = new DateTime($fecha_contratacion);
    $fecha_actual = new DateTime();
    
    // Calcular la diferencia
    $intervalo = $fecha_inicio->diff($fecha_actual);
    
    // Obtener el número total de meses
    $meses_laburando = ($intervalo->y * 12) + $intervalo->m;
    
    
    $aguinaldo= (($sueldo+$total_extra)/30)*(($meses_laburando-13)*(-2.5));
   echo "<td>".$aguinaldo."</td>";
}
   



        echo "<td>";
        echo "<a href='controller/actualizar.php?id={$row['id_trabajador']}' class='btn btn-info'>Actualizar</a>";
        echo "<a href='controller/borrar.php?id={$row['id_trabajador']}' onClick=\"return confirm('¿Estás seguro de elimina#r al trabajador {$row['nombres']} {$row['apellidos']} de la nómina de empleados? Recuerde que al eliminar a este empleado saldra de las nominas y ya no sera tomado en cuenta de aqui en adelante para los txt.')\"  class='btn btn-danger'>Borrar</a>";
        echo "<a href='views/formularios/lista_documentos.php' class='btn btn-info'><i class='bi bi-file-pdf-fill'></i></a>";
        echo "</td>";
    }
          
        }
        ?>

    </tbody>
</table>




 <?php

 // Consulta para obtener los datos de la tabla

 




 
        // Cierra la conexión
            mysqli_close($conn);
 
 */
            ?>
 
 </div>
    <tr>
     </tr>
	 <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	 </body>
	 </html>
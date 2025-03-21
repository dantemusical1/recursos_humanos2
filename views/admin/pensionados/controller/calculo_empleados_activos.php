<?php

// Función para calcular la prima académica
function calcularPrima($gradoInstruccion, $salario) {
    switch ($gradoInstruccion) {
        case "BACHILLER":
            return $salario * 0;
        case "TSU":
            return $salario * 0.20;
        case "PROFESIONAL":
            return $salario * 0.25;
        case "ESPECIALISTA":
            return $salario * 0.30;
        case "MAGISTER":
            return $salario * 0.35;
        case "DOCTORADO":
            return $salario * 0.40;
        default:
            return 0;
    }
}

// Función para calcular los años de antigüedad
function calcularAntiguedad($fecha_de_contratacion) {
    $timestamp_de_contratacion = strtotime($fecha_de_contratacion);
    $tiempo_transcurrido = time() - $timestamp_de_contratacion;
    $anos_transcurridos = floor($tiempo_transcurrido / (365 * 60 * 60 * 24));
    return $anos_transcurridos;
}

// Función para calcular la bonificación por antigüedad
function calcularBonificacionAntiguedad($anos_transcurridos, $sueldo) {
    if ($anos_transcurridos > 0) {
        switch ($anos_transcurridos) {
            case 1:
                return $sueldo * 0.1;
            case 2:
                return $sueldo * 0.02;
            case 3:
                return $sueldo * 0.03;
            case 4:
                return $sueldo * 0.04;
            case 5:
                return $sueldo * 0.05;
            case 6:
                return $sueldo * 0.062;
            case 7:
                return $sueldo * 0.074;
            case 8:
                return $sueldo * 0.086;
            case 9:
                return $sueldo * 0.098;
            case 10:
                return $sueldo * 0.11;
            case 11:
                return $sueldo * 0.124;
            case 12:
                return $sueldo * 0.138;
            case 13:
                return $sueldo * 0.152;
            case 14:
                return $sueldo * 0.166;
            case 15:
                return $sueldo * 0.18;
            case 16:
                return $sueldo * 0.196;
            case 17:
                return $sueldo * 0.212;
            case 18:
                return $sueldo * 0.228;
            case 19:
                return $sueldo * 0.244;
            case 20:
                return $sueldo * 0.26;
            case 21:
                return $sueldo * 0.278;
            case 22:
                return $sueldo * 0.296;
            default:
                return $sueldo * 0.30;
        }
    } else {
        return 0;
    }
}

// Función para calcular el aguinaldo
function calcularAguinaldo($anio, $salario, $totalPrimas, $mes) {
    $anioActual = date("Y"); // Obtener el año actual

    if ($anio < $anioActual) {
        return (($salario + $totalPrimas) / 30) * ($mes - 13) * -10 * 0.25;
    } else {
        return 0; // Si el año no es menor al año actual, no se calcula el aguinaldo
    }
}

// Función para calcular la bonificación por hijos para padres
function bonificacionPadres($genero, $nrohijos) {
    if ($genero == "M" && $nrohijos > 0) {
        return $nrohijos * 12.5;
    } else {
        return 0;
    }
}

// Función para calcular la bonificación por hijos para madres
function bonificacionMadres($genero, $nrohijos) {
    if ($genero == "F" && $nrohijos > 0) {
        return $nrohijos * 12.5;
    } else {
        return 0;
    }
}

// Ejemplo de uso de las funciones
$gradoInstruccion = "PROFESIONAL";
$salario = 1000;
$fecha_de_contratacion = '2015-06-01';
$anio = 2022;
$totalPrimas = 300;
$mes = 12;
$genero = "M";
$nrohijos = 2;

$prima = calcularPrima($gradoInstruccion, $salario);
$anos_transcurridos = calcularAntiguedad($fecha_de_contratacion);
$bonificacion_antiguedad = calcularBonificacionAntiguedad($anos_transcurridos, $salario);
$aguinaldo = calcularAguinaldo($anio, $salario, $totalPrimas, $mes);
$bonificacion_padres = bonificacionPadres($genero, $nrohijos);
$bonificacion_madres = bonificacionMadres($genero, $nrohijos);




// Función para calcular el sueldo mensual
function calcularSueldoMensual($sueldo) {
    return $sueldo;
}

// Función para calcular el bono nocturno
function calcularBonoNocturno($sueldo) {
    return $sueldo * 0.30;
}

// Función para calcular el valor de las horas nocturnas
function calcularValorHorasNocturnas($sueldo, $horas_nocturnas) {
    if ($horas_nocturnas > 0) {
        $valor_bono_nocturno = (((($sueldo / 30) / 8) * 0.50) + (($sueldo / 30) / 8)) * 0.30 + ((($sueldo / 30) / 8) * 0.50) + (($sueldo / 30) / 8);
        $valor_bono_nocturno *= $horas_nocturnas;
        return $valor_bono_nocturno;
    } else {
        return 0;
    }
}

// Función para calcular el monto de las horas diurnas adicionales
function calcularMontoHorasDiurnas($sueldo, $horas_diurnas) {
    if ($horas_diurnas > 0) {
        return ($sueldo / 240 * $horas_diurnas) + (($sueldo / 240) * 0.5);
    } else {
        return 0;
    }
}

// Función para calcular las horas diurnas adicionales
function calcularDiurnasAdicionales($horas_diurnas) {
    if ($horas_diurnas > 8) {
        return $horas_diurnas - 8;
    } else {
        return 0;
    }
}

// Función para calcular el monto de los días adicionales
function calcularMontoDiasAdicionales($sueldo, $dias_adicionales) {
    if ($dias_adicionales > 0) {
        $sueldo_diario = $sueldo / 30;
        return (($sueldo_diario * 0.5) + $sueldo_diario) * $dias_adicionales;
    } else {
        return 0;
    }
}

// Función para calcular el total extra
function calcularTotalExtra($sueldo, $horas_diurnas, $horas_nocturnas, $dias_adicionales) {
    $monto_horas_diurnas = calcularMontoHorasDiurnas($sueldo, $horas_diurnas);
    $diurnas_adicionales = calcularDiurnasAdicionales($horas_diurnas);
    $sueldo_diario = $sueldo / 30;
    $sueldo_dias_adicionales = calcularMontoDiasAdicionales($sueldo, $dias_adicionales);
    $monto_horas_nocturnas = calcularValorHorasNocturnas($sueldo, $horas_nocturnas);

    return $sueldo_dias_adicionales + $diurnas_adicionales + $monto_horas_nocturnas;
}

// Función para calcular el sueldo mensual total
function calcularSueldoMensualTotal($sueldo, $horas_diurnas, $horas_nocturnas, $dias_adicionales) {
    $total_extra = calcularTotalExtra($sueldo, $horas_diurnas, $horas_nocturnas, $dias_adicionales);
    return $sueldo + $total_extra;
}

// Ejemplo de uso de las funciones
$sueldo = 1000;
$horas_nocturnas = 5;
$horas_diurnas = 10;
$dias_adicionales = 2;

$sueldo_mensual = calcularSueldoMensual($sueldo);
$bono_nocturno = calcularBonoNocturno($sueldo);
$valor_horas_nocturnas = calcularValorHorasNocturnas($sueldo, $horas_nocturnas);
$monto_horas_diurnas = calcularMontoHorasDiurnas($sueldo, $horas_diurnas);
$diurnas_adicionales = calcularDiurnasAdicionales($horas_diurnas);
$monto_dias_adicionales = calcularMontoDiasAdicionales($sueldo, $dias_adicionales);
$total_extra = calcularTotalExtra($sueldo, $horas_diurnas, $horas_nocturnas, $dias_adicionales);
$sueldo_mensual_total = calcularSueldoMensualTotal($sueldo, $horas_diurnas, $horas_nocturnas, $dias_adicionales);

// Función para obtener el cargo ocupado
function obtenerCargo($cargo) {
    return "<td class='text-center'>" . $cargo . "</td>";
}

// Función para calcular la quincena
function calcularQuincena($sueldo_mensual) {
    return round($sueldo_mensual / 2, 2);
}

// Función para calcular el seguro social obligatorio
function calcularSeguroSocialObligatorio($sueldo) {
    return round((($sueldo * 12) / 52) * 0.04, 2);
}

// Función para calcular el paro forzoso
function calcularParoForzoso($sueldo) {
    return round((($sueldo * 12) / 52) * 0.05, 2);
}

// Función para calcular el FAOV
function calcularFaov($sueldo) {
    return round((($sueldo * 0.01) / 2), 2);
}

// Función para calcular el FPJ
function calcularFpj($sueldo) {
    return round((($sueldo * 0.03) / 2), 2);
}

// Función para calcular el total de retenciones
function calcularTotalRetenciones($seguro_social_obligatorio, $paro_forzoso, $faov, $fpj) {
    return round($seguro_social_obligatorio + $paro_forzoso + $faov + $fpj, 2);
}

// Función para calcular el total a pagar
function calcularTotalAPagar($quincena, $total_reteciones) {
    return round($quincena - $total_reteciones, 2);
}






// Ejemplo de uso de las funciones
$cargo = "Administrador";
$sueldo = 1000;
$sueldo_mensual = 2000;

$quincena = calcularQuincena($sueldo_mensual);
$seguro_social_obligatorio = calcularSeguroSocialObligatorio($sueldo);
$paro_forzoso = calcularParoForzoso($sueldo);
$faov = calcularFaov($sueldo);
$fpj = calcularFpj($sueldo);
$total_reteciones = calcularTotalRetenciones($seguro_social_obligatorio, $paro_forzoso, $faov, $fpj);
$total_a_pagar = calcularTotalAPagar($quincena, $total_reteciones);

// Mostrar los valores calculados
echo "<br>La prima académica es: " . $prima . " Bs.";
echo "<br>Años de antigüedad: " . $anos_transcurridos;
echo "<br>La bonificación por antigüedad es: " . $bonificacion_antiguedad . " Bs.";
echo "<br>El aguinaldo es: " . $aguinaldo . " Bs.";
echo "<br>La bonificación por hijos (padres) es: " . $bonificacion_padres . " Bs.";
echo "<br>La bonificación por hijos (madres) es: " . $bonificacion_madres . " Bs.";

// Mostrar los valores calculados
echo "<td>" . $sueldo_mensual . "</td>";
echo "<td>" . $bono_nocturno . "</td>";
echo "<td>" . $valor_horas_nocturnas . "</td>";
echo "<td>" . $monto_horas_diurnas . "</td>";
echo "<td>" . $diurnas_adicionales . "</td>";
echo "<td>" . $monto_dias_adicionales . "</td>";
echo "<td>" . round($total_extra, 2) . "</td>";
echo "<td>" . round($sueldo_mensual_total, 2) . "</td>";

// Mostrar los valores calculados
echo obtenerCargo($cargo);
echo "<td>" . $quincena . "</td>";
echo "<td>" . $seguro_social_obligatorio . "</td>";
echo "<td>" . $paro_forzoso . "</td>";
echo "<td>" . $faov . "</td>";
echo "<td>" . $fpj . "</td>";
echo "<td>" . $total_reteciones . "</td>";
echo "<td>" . $total_a_pagar . "</td>";

// Lista de valores calculados
$valores_calculados = [
    'prima_academica' => $prima,
    'anos_antiguedad' => $anos_transcurridos,
    'bonificacion_antiguedad' => $bonificacion_antiguedad,
    'aguinaldo' => $aguinaldo,
    'bonificacion_padres' => $bonificacion_padres,
    'bonificacion_madres' => $bonificacion_madres,
    'sueldo_mensual' => $sueldo_mensual,
    'bono_nocturno' => $bono_nocturno,
    'valor_horas_nocturnas' => $valor_horas_nocturnas,
    'monto_horas_diurnas' => $monto_horas_diurnas,
    'diurnas_adicionales' => $diurnas_adicionales,
    'monto_dias_adicionales' => $monto_dias_adicionales,
    'total_extra' => round($total_extra, 2),
    'sueldo_mensual_total' => round($sueldo_mensual_total, 2),
    'quincena' => $quincena,
    'seguro_social_obligatorio' => $seguro_social_obligatorio,
    'paro_forzoso' => $paro_forzoso,
    'faov' => $faov,
    'fpj' => $fpj,
    'total_reteciones' => $total_reteciones,
    'total_a_pagar' => $total_a_pagar
];

// Mostrar la lista de valores calculados
echo "<br><br>Lista de valores calculados:";
echo "<ul>";
foreach ($valores_calculados as $key => $value) {
    echo "<li>" . ucfirst(str_replace('_', ' ', $key)) . ": " . $value . " Bs.</li>";
}
echo "</ul>";

?>

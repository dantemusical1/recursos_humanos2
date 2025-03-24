<?php


// Crear archivos de texto según la categoría de estatus
        $categories = ["CONTRATADO", "OBRERO", "ALTO NIVEL", "JUBILADO"];
        foreach ($categories as $category) {
    
            $filename = $dir . "txt_" . strtolower(str_replace(" ", "_", $category)) . "_" . date("d-m-Y") . ".txt";
    
            $file = fopen($filename, "w");
    
            if ($file) {
        // Agregar la línea especificada al principio del archivo
        fwrite($file, "ONTNOMG20003616800000060000000000045384VES");
        // Consulta SQL para sumar los sueldos de la categoría actual
       /* $sqlSuma = "SELECT SUM(sueldo) as suma_sueldos FROM personal WHERE estatus = '$category'";
        $resultSuma = $conn->query($sqlSuma);
        if ($resultSuma->num_rows > 0) {
        
            // Salida de datos de cada fila
            
        while ($rowSuma = $resultSuma->fetch_assoc()) {
                fwrite($file, number_format($rowSuma["suma_sueldos"] * 100, 0, '.', '') . "\n");
            }
        } else {
            fwrite($file, "Sumatoria de sueldos: 0 resultados\n\n");
        }
        // Reiniciar el puntero del resultado para la siguiente consulta
        mysqli_data_seek($resultSuma, 0);
        // Consulta para obtener los datos de los trabajadores de la categoría actual
        $sqlTrabajadores = "SELECT `nacionalidad`, `cedula`, `num_de_cuenta`, `sueldo`, `apellidos`, `nombres`, `estatus` FROM personal WHERE estatus = '$category'";
        $resultTrabajadores = mysqli_query($conn, $sqlTrabajadores);
        // Escribir los datos en el archivo solo si hay personas con la categoría correspondiente
        while ($rowTrabajadores = mysqli_fetch_assoc($resultTrabajadores)) {
            $cedula = $rowTrabajadores['cedula'];
            $cedulaCompleta = str_pad($cedula, 8, '0', STR_PAD_LEFT);
            $line = implode("", [$rowTrabajadores['nacionalidad'], $cedulaCompleta, $rowTrabajadores['num_de_cuenta'], $rowTrabajadores['sueldo'] * 100, $rowTrabajadores['apellidos'], " ", $rowTrabajadores['nombres']]);
            fwrite($file, $line . "\n");
        }*/
        ?>
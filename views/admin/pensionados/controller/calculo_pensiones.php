<?php
                function calcularSalario($empleado) {
                    $sueldoBasico = $empleado['sueldo_basico'];
                    $primaProfesionalizacion = $empleado['prima_profesionalizacion'];
                    $primaAntiguedad = $empleado['prima_antiguedad'];
                    $primasPorHijos = $empleado['primas_por_hijos'];
                    $bonoAPN = $empleado['bono_apn'];
                    $horasExtras = $empleado['horas_extras'];
                    $bonoNocturno = $empleado['bono_nocturno'];
                    $diaFeriado = $empleado['dia_feriado'];
                    $diasAdicionales = $empleado['dias_adicionales'];
                    $cestaTiket = $empleado['cesta_tiket'];
                    $bonoVacacional = $empleado['bono_vacacional'];
                    $seguroSocial = $empleado['seguro_social'];
                    $faov = $empleado['faov'];
                    $fondoPension = $empleado['fondo_pension'];
                    $paroForzoso = $empleado['paro_forzoso'];
                    $cod_trabajador = $empleado['codigo_trabajador'];
                    $bonoDiaDelNino = $empleado['bono_dia_del_nino'];

                    // Calcular el salario total
                    $salarioTotal = $sueldoBasico + $primaProfesionalizacion + $primaAntiguedad + $primasPorHijos + $bonoAPN + $horasExtras + $bonoNocturno + $diaFeriado + $diasAdicionales + $cestaTiket + $bonoVacacional + $bonoDiaDelNino;

                    // Descuentos
                    $descuentos = $seguroSocial + $faov + $fondoPension + $paroForzoso;

                    // Salario neto
                    $salarioNeto = $salarioTotal - $descuentos;

                    return $salarioNeto;
                }

                // Ejemplo de datos de empleados
                $empleados = [
                    [
                        'cedula' => '12345678',
                        'nombres_apellidos' => 'Juan Pérez',
                        'cargo' => 'Administrador',
                        'fecha_ingreso' => '2020-01-01',
                        'sueldo_basico' => 1000,
                        'prima_profesionalizacion' => 200,
                        'prima_antiguedad' => 150,
                        'primas_por_hijos' => 100,
                        'bono_apn' => 50,
                        'horas_extras' => 75,
                        'bono_nocturno' => 30,
                        'dia_feriado' => 20,
                        'dias_adicionales' => 40,
                        'cesta_tiket' => 60,
                        'bono_vacacional' => 80,
                        'seguro_social' => 50,
                        'faov' => 30,
                        'fondo_pension' => 20,
                        'paro_forzoso' => 10,
                        'codigo_trabajador'=> 'ABC',
                        'bono_dia_del_nino' => 25
                    ],
                    // Agrega más empleados según sea necesario
                ];
                ?>
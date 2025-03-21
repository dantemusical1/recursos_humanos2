SELECT *
FROM trabajadores
WHERE 
    cargo LIKE '%valor_cargo%' OR
    nombre LIKE '%valor_nombre%' OR
    cedula LIKE '%valor_cedula%' OR
    apellido LIKE '%valor_apellido%';
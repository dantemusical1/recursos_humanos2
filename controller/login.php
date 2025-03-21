<?php
// Conexion a la db
$host = "localhost";
$user_db = "root";
$password = "";
$name_db = "empresa";

// Crear conexión
$conn = new mysqli($host, $user_db, $password, $name_db);

// Verificar conexión
if ($conn->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
    exit(); // Salir si hay un error
}

session_start(); 

$nombre = isset($_POST["txtusuario"]) ? $_POST["txtusuario"] : '';
$pass = isset($_POST["txtpassword"]) ? $_POST["txtpassword"] : '';
$rol = isset($_POST["rol"]) ? $_POST["rol"] : '';

// Para iniciar sesión
if (isset($_POST["btnloginx"])) {
    $nombre = mysqli_real_escape_string($conn, $nombre); // Sanitizar entrada
    $queryusuario = mysqli_query($conn, "SELECT * FROM login WHERE usu = '$nombre'");
    $nr = mysqli_num_rows($queryusuario);
    $mostrar = mysqli_fetch_array($queryusuario);

    if (($nr == 1) && (password_verify($pass, $mostrar['pass']))) {
        $_SESSION['nombredelusuario'] = $nombre;
        $_SESSION['rol'] = $mostrar['rol']; // Guardar el rol en la sesión

        // Redirigir según el rol
        if ($_SESSION['rol'] == 'admin') {
            header("Location: ../views/admin/index.php");
        } else {
            header("Location: ../views/user/index.php");
        }
        exit(); // Asegurarse de que no se ejecute más código después de redirigir
    } else {
        echo "<script> alert('Usuario o contraseña incorrecto.');window.location= '../index.html' </script>";
    }
}

// Para registrar
if (isset($_POST["btnregistrarx"])) {
    $nombre = mysqli_real_escape_string($conn, $nombre); // Sanitizar entrada
    $pass = mysqli_real_escape_string($conn, $pass); // Sanitizar contraseña
    $rol = mysqli_real_escape_string($conn, $rol); // Sanitizar rol

    $queryusuario = mysqli_query($conn, "SELECT * FROM login WHERE usu = '$nombre'");
    $nr = mysqli_num_rows($queryusuario);

    if ($nr == 0) {
        $pass_fuerte = password_hash($pass, PASSWORD_BCRYPT);
        // Aquí se almacena la contraseña en texto plano
        $queryregistrar = "INSERT INTO login(`usu`, `pass`, `pass_plain`, `rol`) VALUES ('$nombre', '$pass_fuerte', '$pass', '$rol')";

        if (mysqli_query($conn, $queryregistrar)) {
            echo "<script> alert('Usuario registrado: $nombre');window.location= '../index.html' </script>";
        } else {
            echo "Error: " . $queryregistrar . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "<script> alert('No puedes registrar a este usuario: $nombre');window.location= '../index.html' </script>";
    }
}

// Cerrar la conexión al final
$conn->close();
?>
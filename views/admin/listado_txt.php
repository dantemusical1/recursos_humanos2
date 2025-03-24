<?php
$dir = '../../archivos_txt/';
$files = array_diff(scandir($dir), array('.', '..'));

usort($files, function($a, $b) use ($dir) {
    return filemtime($dir . $a) - filemtime($dir . $b);
});

if (isset($_GET['file'])) {
    $file = $_GET['file'];
    $filepath = $dir . $file;

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        readfile($filepath);
        exit;
    }
}

if (isset($_GET['delete'])) {
    $file = $_GET['delete'];
    $filepath = $dir . $file;

    if (file_exists($filepath)) {
        unlink($filepath);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestor de Archivos</title>
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="icon" href="../../assets/img/logo.jpg" type="image/x-icon">
</head>
<body>
<!--<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
  </div>
</nav>-->
<br>
<br>

    <?php
        include('menu.php');
    ?>



<div class="container mt-4">
    <div class="row mt-4 mb-4">
        <h4 class="text-center">TXT de pago de nómina</h4>
    </div>

    <div class="row">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre del archivo</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach ($files as $file) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($file) . '</td>';
                    echo "<td>
                            <a class='link-underline-opacity-100-hover' href='#' onclick='confirmDownload(\"$file\")'>
                                <div class='btn btn-primary'><i class='bi bi-file-earmark-arrow-down'></i> Descargar</div>
                            </a>
                            <a class='btn btn-danger' href='?delete=" . urlencode($file) . "' onclick=\"return confirm('¿Está seguro de que desea eliminar el documento? Recuerde que al eliminarlo, la información de la nómina $file se podría perder de manera irremediable.');\">
                                <i class='bi bi-trash3'></i> Eliminar
                            </a>
                          </td>";
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../node_modules/@popperjs/core/dist/umd/popper.js"></script>

<script>
    function confirmDownload(file) {
        if (confirm('¿Estás seguro de que deseas descargar este archivo?')) {
            window.location.href = '?file=' + encodeURIComponent(file);
        }
    }
</script>
</body>
</html>

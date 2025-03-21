<?php

include("../../conexion/conexion.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--Aqui empiezan los links y referencias de estilo-->
<link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="../../node_modules/bootstrap-icons/font/bootstrap-icons.css">


    <title>Pag principal</title>
</head>
<body>
    <?php

include("menu.php")
?>

<div class="container mt-5">

        <div class="row justify-content-center">

            <div class="col-md-4">

                <div class="card mb-4">

                    <div class="card-body">

                        <h5 class="card-title">jubilados</h5>

                        <h6 class="card-subtitle mb-2 text-body-secondary">Personal jubilado</h6>

                        <p class="card-text"> Actualmente se cuenta con un total de 
                            <?php
                            $jubilados=100;
                            echo "<strong>".$jubilados."  </strong>";    ?>
                      
    
                    </p>

                        <a href="#" class="card-link">Card link</a>

                        <a href="#" class="card-link">Another link</a>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card mb-4">

                    <div class="card-body">

                        <h5 class="card-title">Card title</h5>

                        <h6 class="card-subtitle mb-2 text-body-secondary">Personal Activo</h6>

                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                        <a href="#" class="card-link">Card link</a>

                        <a href="#" class="card-link">Another link</a>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card mb-4">

                    <div class="card-body">

                        <h5 class="card-title">Card title</h5>

                        <h6 class="card-subtitle mb-2 text-body-secondary">Personal vacaciones</h6>

                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                        <a href="#" class="card-link">Card link</a>

                        <a href="#" class="card-link">Another link</a>

                    </div>

                </div>

            </div>

        </div>

    </div>

<!--Aqui se hace referencia a los escrips necesarios para que todo funcione-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>
</html>
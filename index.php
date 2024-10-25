<?php


include("modal/registroalumno.php");
include("modal/video.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://fonts.googleapis.com/css2?family=GMX&display=swap" rel="stylesheet">
</head>

<body>

    <header>
        <a href="https://tesi.org.mx/" target="_blank">TESI</a>
        <strong style="color:aliceblue;">|</strong>

        <!-- <a href="../main_page/index.php">Inicio</a>
        <strong style="color:aliceblue;">|</strong>
        <a href=""></a>
        
        <a href="../main_page/clinicas.php">Clínicas</strong>
        <strong style="color:aliceblue;">|</strong>
        <a href="" target="_blank"></a>

        <a href="../main_page/calidad.php">Calidad</strong>
        <strong style="color:aliceblue;">|</strong>
        <a href="" target="_blank"></a>

        <a href="../main_page/enfermeria.php">Enfermeria</strong>
        <strong style="color:aliceblue;">|</strong>
        <a href="" target="_blank"></a>

        <a href="../main_page/servicios.php">Servicios</strong>
        <strong style="color:aliceblue;">|</strong>
        <a href="" target="_blank"></a>

        <a href="../main_page/patologias.php">Patologías</strong>
        <strong style="color:aliceblue;">|</strong>
        <a href="" target="_blank"></a>

        <a href="../main_page/rehabilitacion.php">Rehabilitación</strong>
        <strong style="color:aliceblue;">|</strong>
        <a href="" target="_blank"></a> -->
    </header>



    <div class="login-container1">
        <div class="information">
            <div class="info-childs">
                <h2> Bienvenido </h2>
                <p> </p>
            </div>
        </div>
        <div class="login-container">
            <div class="row">
                <div class="col-md-12 mb-3">

                    <!-- Input de la matrícula -->
                    <div class="input-container">
                        <i class="fa-solid fa-user"></i>
                        <input type="number" id="username" name="username" required placeholder="Matrícula">
                    </div>

                    
                    <!-- Botón para iniciar sesión -->
                    <button type="button" class="btn elegant-button w-100" onclick="verificarMatricula()">Ingresar</button>

                    </div>
                </div>
            </div>








        </div>

        <div id="loading-overlay" style="display: none;" class="loading">
            <svg width="128px" height="96px">
                <polyline points="0.157 47.907, 28 47.907, 43.686 96, 86 0, 100 48, 128 48" id="back"></polyline>
                <polyline points="0.157 47.907, 28 47.907, 43.686 96, 86 0, 100 48, 128 48" id="front"></polyline>
            </svg>
        </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- <script src="js/visualizacion.js"></script> -->
    <script src="js/scriptvideo.js"></script>
    <script src="js/scriptregistro.js"></script>





</body>

</html>
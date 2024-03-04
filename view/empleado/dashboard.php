<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>
<style>
    .container-griyas {
        display: grid;
        width: 100%;
        grid-template-columns: repeat(3, 1fr);
        overflow: auto;
    }

    .card-body {
        overflow: auto;
    }

    @media (max-width: 700px) {
        .container-griyas {
            display: grid;
            width: 100%;
            place-items: center;
            display: block;
            grid-template-columns: 1fr !important;
            overflow: auto;
        }
    }
</style>

<body>
    <?php
    include("nav.php");
    ?>
    <div class="container-griyas mt-3">
        <div class="card">
            <div class="card-header">TOTAL DE EMPLEADOS</div>
            <div class="card-body">
                <?php
                include("empleadoCharts.php");
                ?>
            </div>
        </div>
        <div class="card">
            <div class="card-header">TOTAL DE PROYECTOS</div>
            <div class="card-body">
                <?php
                include("ProyectoCharts.php");
                ?>
            </div>
        </div>
        <div class="card">
            <div class="card-header">TOTAL DE EMPLEADOS Y PROYECTOS</div>
            <div class="card-body">
                <?php
                include("jointables.php");
                ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>
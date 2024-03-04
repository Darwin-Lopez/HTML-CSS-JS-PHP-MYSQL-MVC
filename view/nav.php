<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    *,
    *::after,
    *::before {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body{
        font-family: "poppins", sans-serif;
    }
</style>
<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Bisness</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="empleado.php">Empleados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="proyecto.php">Proyectos</a>
                </li>
                <li class="nav-item">
                    <button class="nav-link" onclick="log_out()">Cerrar Sesión</button>
                </li>
            </ul>
            <button type="button" class="btn btn-primary" disabled>
                    <?php
                    if (isset($_SESSION["SUCCESS-QUERY-USUARIO"])) {
                        echo $_SESSION["SUCCESS-QUERY-USUARIO"];
                    } else {
                        header("Location: login.php");
                        exit();
                    }
                    ?>
            </button>
        </div>
    </div>
</nav>

<script>
    function log_out(value) {
    swal({
        title: "¿Seguro que deseas cerrar tu sesión?",
        text: "No podras recuperar tus datos",
        icon: "error",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            window.location.href = `../controller/log_out.php`;
        }
    });
}
</script>


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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="../public/loginJS.js" defer></script>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    *,
    *::after,
    *::before {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "poppins", sans-serif;
    }

    html {
        font-size: 15px;
    }

    body {
        min-height: 100vh;
        display: grid;
        place-items: center;
        background-color: #2E4053;
    }

    .container-form {
        min-width: 270px;
        width: 400px;
        background-color: #283747;
        padding: 20px;
        border-radius: 10px;
    }

    .roles {
        min-width: 270px;
        width: 400px;
        height: 50px;
        background-color: #283747;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 1em;
        margin: 1em auto;
        border-radius: 10px;

    }

    hr {
        border: 1px solid #fff;
    }

    .small-usuario,
    .small-clave {
        color: lightcoral;
        display: none;
    }
</style>

<body>
    <?php
    if (isset($_SESSION["SUCCESS-QUERY-LOGIN"])) {
    ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Bienvenido <?php echo $_SESSION["SUCCESS-QUERY-USUARIO"] ?>',
                text: '¡Verificación Exitosa!',
                confirmButtonText: 'ok'
            }).then(function() {
                window.location = "home.php";
            })
        </script>
        <?php
        unset($_SESSION["SUCCESS-QUERY-LOGIN"]);
    } else {
        if (isset($_SESSION["ERROR-QUERY-LOGIN"])) {
        ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Usuario o contraseña incorrectas',
                    confirmButtonText: 'Volver a intentar'
                });
            </script>
            <?php

            unset($_SESSION["ERROR-QUERY-LOGIN"]);
        } else {
            if (isset($_SESSION["EMPTY-QUERY-LOGIN"])) {
            ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Por favor llene todos los campos',
                        confirmButtonText: 'ok'
                    });
                </script>
    <?php
                unset($_SESSION["EMPTY-QUERY-LOGIN"]);
            }
        }
    }
    ?>
    <div class="container mx-3">
        <div class="row justify-content-center">
            <div class="container-form">
                <div class="container-admin">
                    <form action="../controller/login.php" method="post">
                        <h1 class="text-center text-light my-3">Login Administrador</h1>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="usuario" id="usuario" placeholder="" required />
                            <label for="formId1">Admin</label>
                            <small class="small-usuario">Campo de usuario requerido</small>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="clave" id="clave" placeholder="" required />
                            <label for="formId1">*****</label>
                            <small class="small-clave">Campo de contraseña requerido</small>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label text-light" for="exampleCheck1">Recordarme </label>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary" id="btn-login" name="btn-login">Ingresar
                                <svg width="25" height="25" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                                    <path d="m10 17 5-5-5-5"></path>
                                    <path d="M15 12H3"></path>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
                
                <div class="container-empleado">
                    <form action="./empleado/controllerEmpleado/login.php" method="post">
                    <h1 class="text-center text-light my-3">Login<br> Empleado</h1>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="usuarioEmpleado" id="usuario" placeholder="" required />
                            <label for="formId1">Empleado</label>
                            <small class="small-usuario">Campo de usuario requerido</small>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="claveEmpleado" id="clave" placeholder="" required />
                            <label for="formId1">*****</label>
                            <small class="small-clave">Campo de contraseña requerido</small>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label text-light" for="exampleCheck1">Recordarme </label>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary" id="btn-login" name="btn-loginEmpleado">Ingresar
                                <svg width="25" height="25" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                                    <path d="m10 17 5-5-5-5"></path>
                                    <path d="M15 12H3"></path>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="contenet text-center">
                <div class="roles">
                    <div class="form-check">
                        <input type="radio" name="rol" class="form-check-input" id="admin" checked>
                        <label class="form-check-label text-light" for="admin">Administrador </label>
                    </div>
                    <div class=" form-check">
                        <input type="radio" name="rol" class="form-check-input" id="empleado">
                        <label class="form-check-label text-light" for="empleado">Empleado </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Obtener referencias a los elementos de radio y contenedores
            const adminRadio = document.getElementById('admin');
            const empleadoRadio = document.getElementById('empleado');
            const adminContainer = document.querySelector('.container-admin');
            const empleadoContainer = document.querySelector('.container-empleado');
            mostrarAdmin();
            // Función para mostrar el contenedor de administrador
            function mostrarAdmin() {
                adminContainer.style.display = 'block';
                empleadoContainer.style.display = 'none';
            }

            // Función para mostrar el contenedor de empleado
            function mostrarEmpleado() {
                adminContainer.style.display = 'none';
                empleadoContainer.style.display = 'block';
            }

            // Evento de cambio para el radio button de administrador
            adminRadio.addEventListener('change', function() {
                if (adminRadio.checked) {
                    mostrarAdmin();
                }
            });

            // Evento de cambio para el radio button de empleado
            empleadoRadio.addEventListener('change', function() {
                if (empleadoRadio.checked) {
                    mostrarEmpleado();
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>
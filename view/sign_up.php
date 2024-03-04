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
    <script src="../public/registroJS.js" defer></script>
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

    hr {
        border: 1px solid #fff;
    }

    #imagenUsuario{
        width: 128px;
        height: 127px;
        object-fit: cover;
        background-color: #2E4053;
    }

    .contenet{
        position: relative;
    }

    .content-small{
        position: absolute;
        bottom: 0;
        right: -50px;
        color: white;
        font-size: 10px;
        display: block;
    }

    .small-dni, .small-edad, .small-numero {
        display: none;
        color: lightcoral;
        margin-top: 3px;
    }

    @media (max-width: 576px) {
        #row {
            flex-direction: column;
        }
    }
</style>

<body>
    <div class="validation">
        <?php
        if (isset($_SESSION["ERROR-AUTENTICACION"])) {
        ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Las contraseñas no coinciden',
                    confirmButtonText: 'Volver a intentar'
                });
            </script>
            <?php
            unset($_SESSION["ERROR-AUTENTICACION"]);
        } else {
            if (isset($_SESSION["SUCCESS-QUERY-CREATE"])) {
            ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Bienvenido',
                        text: 'Su cuenta ha sido creada, por favor inicie sesión',
                        confirmButtonText: 'Ok'
                    })
                </script>
                <?php
                unset($_SESSION["SUCCESS-QUERY-CREATE"]);
            } else {
                if (isset($_SESSION["ERROR-QUERY"])) {
                ?>
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Se ha producido un error en la consulta, por favor intente de nuevo',
                            confirmButtonText: 'volver a intentarlo'
                        });
                    </script>
                    <?php
                    unset($_SESSION["ERROR-QUERY"]);
                } else {
                    if (isset($_SESSION["ERROR-QUERY-EXIST"])) {
                    ?>
                        <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Usuario ya existente, por favor intente de nuevo',
                                confirmButtonText: 'volver a intentarlo'
                            });
                        </script>
        <?php
                        unset($_SESSION["ERROR-QUERY-EXIST"]);
                    }
                }
            }
        }
        ?>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-light text-center p-3">CREARSE UNA CUENTA</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="../controller/registration.php" method="POST" enctype="multipart/form-data">
                    <div class="row" id="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="usuario" id="usuario" placeholder="" />
                                <label for="formId1">Usuario</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="full_name" id="formId1" placeholder="" />
                                <label for="formId1">Nombre completo</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" name="correo" id="formId1" placeholder="" required />
                                <label for="formId1">Correo electronico</label>
                            </div>

                            <div class="container d-flex justify-content-center align-items-center gap-3">
                                <div class="clasname">
                                    <span class="text-light">Imagen del usuario: </span>
                                </div>
                                <div class="contenet text-center">
                                    <img id="imagenUsuario" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" title="Dimensión de la imagen: 128px x 128px">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="fotos" class="form-label text-light">Insertar Foto</label>
                                <input type="file" class="form-control" id="fotos" name="foto" onchange="mostrarImagen(this)" accept="image/*" />
                            </div>

                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="dni" id="dni" placeholder="" />
                                <label for="formId1">DNI</label>
                                <small class="small-dni">Este campo solo se permite número enteros</small>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="especialidad" id="formId1" placeholder="" />
                                <label for="formId1">Especialidad</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="edad" id="edad" placeholder="" />
                                <label for="formId1">Edad</label>
                                <small class="small-edad">Este campo solo se permite número enteros</small>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="numero" id="numero" placeholder="" />
                                <label for="formId1">Número Telefónico</label>
                                <small class="small-numero">Este campo solo se permite números</small>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="clave" id="formId1" placeholder="" />
                                <label for="formId1">Contraseña</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="clave_confirm" id="formId1" placeholder="" />
                                <label for="formId1">Repetir la contraseña</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-end gap-3">
                        <a href="home.php" class="btn btn-danger">
                            <svg width="25" height="25" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2a10 10 0 1 0 0 20 10 10 0 1 0 0-20z"></path>
                                <path d="m12 8-4 4 4 4"></path>
                                <path d="M16 12H8"></path>
                            </svg>
                            Regresar
                        </a>
                        <button type="submit" name="btn-registrar" id="btn-registrar" class="btn btn-primary">
                            Registrarse
                            <svg width="25" height="25" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <path d="M8.5 3a4 4 0 1 0 0 8 4 4 0 1 0 0-8z"></path>
                                <path d="M20 8v6"></path>
                                <path d="M23 11h-6"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>
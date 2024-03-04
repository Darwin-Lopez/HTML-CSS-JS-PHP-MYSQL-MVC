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

    hr {
        border: 1px solid #fff;
    }

    .small-usuario , .small-clave{
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
                }).then(function(){
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
                <h1 class="text-center text-light">Login</h1>
                <form action="../controller/login.php" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="usuario" id="usuario" placeholder="" required   />
                        <label for="formId1">Username</label>
                        <small class="small-usuario">Campo de usuario requerido</small>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="clave" id="clave" placeholder="" required />
                        <label for="formId1">Password</label>
                        <small class="small-clave">Campo de contraseña requerido</small>
                    </div>
                    <small class="text-light">No tienes una cuenta? <a href="sign_up.php">creala aqui</a></small>
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
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>


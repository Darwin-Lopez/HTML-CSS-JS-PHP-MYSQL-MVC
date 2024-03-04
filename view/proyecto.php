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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap5.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../public/proyecto.js" defer></script>
</head>
<style>
    td,
    th {
        text-align: center !important;
        vertical-align: middle !important;
    }
</style>

<body>
    <?php
    include("nav.php");
    ?>

    <div class="container-fluid d-flex justify-content-between mt-3">
        <button type="button" class="btn btn-success " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Insertar Proyecto
            <svg width="25" height="25" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
                <path d="M12 11v6"></path>
                <path d="M9 14h6"></path>
            </svg>
        </button>
        <h3>Listado de Proyectos</h3>
    </div>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">INSERTAR PROYECTO</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../controller/proyecto.php" method="POST">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="nombre" id="formId1" placeholder="" />
                            <label for="formId1">Titulo del proyecto</label>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Descripción</label>
                            <textarea class="form-control" name="descripcion" id="" rows="3"></textarea>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" name="fecha_inicio" id="formId1" placeholder="" />
                            <label for="formId1">Fecha de inicio</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" name="fecha_final" id="formId1" placeholder="" />
                            <label for="formId1">Fecha final</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" name="btn-insertar-Proyecto" class="btn btn-primary">Insertar <svg width="25" height="25" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 2a10 10 0 1 0 0 20 10 10 0 1 0 0-20z"></path>
                                    <path d="M12 8v8"></path>
                                    <path d="M8 12h8"></path>
                                </svg></button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="container-fluid">
        <table id="proyecto" class="table table-striped table-bordered table-hover" style="width:100%">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Titulo</th>
                    <th>Descripción</th>
                    <th>Fecha Inicial</th>
                    <th>Fecha Final</th>
                    <th style="width: 170px;">-</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once("../model/ClassProyecto.php");
                $empleados = new Proyecto();
                $result = $empleados->getProyectos();
                foreach ($result as $row) {
                ?>
                    <tr>

                        <td><?= $row["id_proyecto"] ?></td>
                        </td>
                        <td><?= $row["titulo"] ?></td>
                        </td>
                        <td><?= $row["descripcion"] ?></td>
                        <td><?= $row["fecha_inicio"] ?></td>
                        </td>
                        <td><?= $row["fecha_final"] ?></td>
                        </td>
                        <td>
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#detalleProyecto_<?= $row["id_proyecto"] ?>">
                                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <path d="M12 9a3 3 0 1 0 0 6 3 3 0 1 0 0-6z"></path>
                                </svg>
                            </button>
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#actualizarProyecto_<?= $row["id_proyecto"] ?>">
                                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                            </button>
                            <button type="button" class="btn btn-danger" onclick="deleteProyecto(<?php echo $row['id_proyecto'] ?>)">
                                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3 6h18"></path>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    <path d="M10 11v6"></path>
                                    <path d="M14 11v6"></path>
                                </svg>
                            </button>
                        </td>
                    </tr>
                    <!-- DETALLE DE PROYECTO -->
                    <div class="modal fade" id="detalleProyecto_<?= $row["id_proyecto"] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">DETALLE DE PROYECTO</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="../controller/proyecto.php" method="POST">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" value="<?= $row["titulo"] ?>" name="titulo" id="formId1" placeholder="" disabled />
                                            <label for="formId1">Titulo del proyecto</label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Descripción</label>
                                            <textarea class="form-control" name="descripcion" id="" rows="3" disabled><?= $row["descripcion"] ?></textarea>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control" name="fecha_inicio" value="<?= $row["fecha_inicio"] ?>" id="formId1" placeholder="" disabled />
                                            <label for="formId1">Fecha de inicio</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control" name="fecha_final" value="<?= $row["fecha_final"] ?>" id="formId1" placeholder="" disabled />
                                            <label for="formId1">Fecha final</label>
                                        </div>

                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ACTUALIZAR PROYECTO -->

                    <div class="modal fade" id="actualizarProyecto_<?= $row["id_proyecto"] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">ACTUALIZAR PROYECTO</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="../controller/actualizarProyecto.php" method="POST">
                                        <input type="hidden" name="id_proyeto" value="<?= $row["id_proyecto"] ?>" id="">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" value="<?= $row["titulo"] ?>" name="titulo" id="formId1" placeholder="" />
                                            <label for="formId1">Titulo del proyecto</label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Descripción</label>
                                            <textarea class="form-control" name="descripcion" id="" rows="3"><?= $row["descripcion"] ?></textarea>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control" name="fecha_inicio" value="<?= $row["fecha_inicio"] ?>" id="formId1" placeholder="" />
                                            <label for="formId1">Fecha de inicio</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control" name="fecha_final" value="<?= $row["fecha_final"] ?>" id="formId1" placeholder="" />
                                            <label for="formId1">Fecha final</label>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" name="btn-actualizar-Proyecto" class="btn btn-success">Actualizar Proyecto <svg width="25" height="25" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12 2a10 10 0 1 0 0 20 10 10 0 1 0 0-20z"></path>
                                                    <path d="M12 8v8"></path>
                                                    <path d="M8 12h8"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap5.js"></script>
    <script>
        new DataTable("#proyecto");
    </script>
</body>

</html>

<?php

if (isset($_SESSION["SUCCESS-INSERT-QUERY"])) {
?>
    <script>
        swal("Proyecto Insertado", "El proyecto ha sido insertado exitosamente", "success");
    </script>
    <?php
    unset($_SESSION["SUCCESS-INSERT-QUERY"]);
} else {
    if (isset($_SESSION["ERROR-INSERT-QUERY"])) {
    ?>
        <script>
            swal("Error al insertar", "Ocurrio un error al insertar el proyecto", "error");
        </script>
        <?php
        unset($_SESSION["ERROR-INSERT-QUERY"]);
    } else {
        if (isset($_SESSION["EMPTY-INSERT-PROYECTO"])) {
        ?>
            <script>
                swal("Error al insertar", "Debe rellenar todos los campos", "error");
            </script>
            <?php
            unset($_SESSION["EMPTY-INSERT-PROYECTO"]);
        } else {
            if (isset($_SESSION["UPDATE_SUCCESS_PROYECTO"])) {
            ?>
                <script>
                    swal("Proyecto Actualizado", "El proyecto ha sido actualizado exitosamente", "success");
                </script>
                <?php
                unset($_SESSION["UPDATE_SUCCESS_PROYECTO"]);
            } else {
                if (isset($_SESSION["UPDATE_ERROR_PROYECTO"])) {
                ?>
                    <script>
                        swal("Error al actualizar", "Ocurrio un error al actualizar el proyecto", "error");
                    </script>
                <?php
                    unset($_SESSION["UPDATE_ERROR_PROYECTO"]);
                }
            }
        }
    }
}

?>
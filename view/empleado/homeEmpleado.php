<?php
session_start();
?>
<!doctype html>
<html lang="es">

<head>
    <title>Title</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap5.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="../public/home.js" defer></script>
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
    include("navbar.php");
    ?>

    <div class="container-fluid mt-3 d-flex justify-content-between">
        <h3>Listado de Gestión de Recursos</h3>
    </div>
    <div class="container-fluid mt-3" style="overflow: auto;">
        <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>foto</th>
                    <th>Salario</th>
                    <th>Proyecto</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Final</th>
                    <th> - </th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once("../../config/conexionMysqlProcedural.php");
                $sql = "SELECT e.id_empleado, e.nombre, e.foto, e.salario, e.telefono, p.titulo, p.descripcion, p.fecha_inicio, p.fecha_final FROM empleados e INNER JOIN proyectos p ON e.id_proyecto = p.id_proyecto";
                $query = mysqli_query($conn, $sql);
                $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
                foreach ($result as $row) {
                ?>
                    <tr>

                        <td><?= $row["id_empleado"] ?></td>
                        </td>
                        <td><?= $row["nombre"] ?></td>
                        </td>
                        
                        <td>
                            <?php
                            $fotoUrl = !empty($row["foto"]) && file_exists("../../controller/" . $row["foto"]) ? "../../controller/" . $row["foto"] : "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png";
                            ?>
                            <img src="<?= $fotoUrl ?>" width="60" height="60" style="object-fit: cover;" alt="Foto del empleado">
                        </td>
                        </td>
                        <td>S/.&nbsp;<?= $row["salario"] ?></td>
                        </td>
                        <td><?= $row["titulo"] ?></td>
                        </td>
                        <td><?= $row["fecha_inicio"] ?></td>
                        </td>
                        <td><?= $row["fecha_final"] ?></td>
                        </td>
                        <td>
                        <button href="" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edicion_<?= $row['id_empleado'] ?>">
                                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <path d="M12 9a3 3 0 1 0 0 6 3 3 0 1 0 0-6z"></path>
                                </svg>
                            </button>
                        </td>
                    </tr>
                    <div class="modal fade" id="edicion_<?= $row['id_empleado'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">DETALLE DE GESTTION DE RECURSOS</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" value="<?= $row["nombre"] ?>" name="formId1" id="formId1" placeholder="" disabled />
                                        <label for="formId1">Nombre</label>
                                    </div>
                                    <div class="text-center" style="border: 1px solid #ddd; border-radius: 4px">
                                        <img src="../../controller/<?= $row["foto"] ?>" width="100" height="100" style="object-fit: cover" alt="">
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control mt-3" value="<?= $row["salario"] ?>" name="formId1" id="formId1" placeholder="" disabled />
                                        <label for="formId1">Salario</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control mt-3" value="<?= $row["telefono"] ?>" name="formId1" id="formId1" placeholder="" disabled />
                                        <label for="formId1">Salario</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control mt-3" value="<?= $row["titulo"] ?>" name="formId1" id="formId1" placeholder="" disabled />
                                        <label for="formId1">Salario</label>
                                    </div>
                                    <textarea name="" id="" cols="30" class="form-control" rows="5" disabled><?= $row["descripcion"] ?></textarea>
                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control mt-3" value="<?= $row["fecha_inicio"] ?>" name="formId1" id="formId1" placeholder="" disabled />
                                        <label for="formId1">Fecha de Inicio</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control mt-3" value="<?= $row["fecha_final"] ?>" name="formId1" id="formId1" placeholder="" disabled />
                                        <label for="formId1">Fecha de Final</label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
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
        new DataTable('#example');
    </script>
</body>

</html>

<?php

if (isset($_SESSION["DELETE_EMPLOYEE_SUCCESS"])) {
?>
    <script>
        swal("Empleado Eliminado", "El Empleado ha sido eliminado", "success");
    </script>
    <?php
    unset($_SESSION["DELETE_EMPLOYEE_SUCCESS"]);
} else {
    if (isset($_SESSION["DELETE_EMPLOYEE_ERROR"])) {
    ?>
        <script>
            swal("Empleado No Eliminado", "El Empleado no ha sido eliminado", "error");
        </script>
<?php
        unset($_SESSION["DELETE_EMPLOYEE_ERROR"]);
    }
}

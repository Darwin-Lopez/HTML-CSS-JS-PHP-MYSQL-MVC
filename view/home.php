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
    include("nav.php");
    ?>
    <div class="modal fade" id="empleado" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">EMPLEADO NUEVO</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../controller/empleado.php" method="POST" enctype="multipart/form-data">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="nombre" id="formId1" placeholder="" />
                            <label for="formId1">Nombre Completo</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="salario" id="formId1" placeholder="" />
                            <label for="formId1">Salario</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select name="departamento" id="" class="form-select">
                                <option value="" disabled selected>--Elegir tu departamento--</option>
                                <option value="Peru">Perú</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Chile">Chile</option>
                                <option value="Ecuador">Ecuador</option>
                                <option value="brasil">Brasil</option>
                            </select>
                            <label for="formId1">Departamento</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="telefono" id="formId1" placeholder="" />
                            <label for="formId1">Teléfono</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="correo" id="formId1" placeholder="" />
                            <label for="formId1">Correo Electronico</label>
                        </div>

                        <input type="file" class="form-control mt-3" name="foto" accept="image/*" id="">

                        <div class="form-floating mt-3">
                            <select name="proyecto" id="proyectos" class="form-select">
                                <option value="" selected disabled>--Selecciona un Proyecto</option>
                                <?php
                                require_once("../model/ClassProyecto.php");
                                $empleado = new Proyecto();
                                $result = $empleado->getProyectos();

                                foreach ($result as $dato) {
                                ?>
                                    <option value="<?= $dato["id_proyecto"] ?>"><?= $dato["titulo"]; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <label for="formId1">Asignar Proyecto</label>
                        </div>
                        <div class="modal-footer mt-3">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" name="btn-insertar-empleado" class="btn btn-primary">Insertar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="proyecto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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

    <div class="container-fluid mt-3 d-flex justify-content-between">
        <div class="d-block">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#empleado">
                Insertar Empleado
                <svg width="25" height="25" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2a10 10 0 1 0 0 20 10 10 0 1 0 0-20z"></path>
                    <path d="M12 8v8"></path>
                    <path d="M8 12h8"></path>
                </svg>
            </button>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#proyecto">
                Insertar Proyecto
                <svg width="25" height="25" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
                    <path d="M12 11v6"></path>
                    <path d="M9 14h6"></path>
                </svg>
            </button>
        </div>
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
                    <th>-</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once("../model/ClassEmpleado.php");
                $empleados = new Empleado();
                $result = $empleados->getEmpleados();
                foreach ($result as $row) {
                ?>
                    <tr>

                        <td><?= $row["id_empleado"] ?></td>
                        </td>
                        <td><?= $row["nombre"] ?></td>
                        </td>
                        <td>
                            <?php
                            $fotoUrl = !empty($row["foto"]) && file_exists("../controller/" . $row["foto"]) ? "../controller/" . $row["foto"] : "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png";
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
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#Actualizacion_<?= $row['id_empleado'] ?>">
                                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                            </button>
                            <button type="button" class="btn btn-danger" onclick="deleteEmpPro(<?php echo $row['id_empleado'] ?>)">
                                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3 6h18"></path>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    <path d="M10 11v6"></path>
                                    <path d="M14 11v6"></path>
                                </svg>
                            </button>
                        </td>
                    </tr>
                    <!-- MODAL EDITAR -->
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
                                        <img src="../controller/<?= $row["foto"] ?>" width="100" alt="">
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control mt-3" value="<?= $row["salario"] ?>" name="formId1" id="formId1" placeholder="" disabled />
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

                    <div class="modal fade" id="Actualizacion_<?= $row['id_empleado'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">ACTUALIZACION DE GESTTION DE RECURSOS</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="../controller/actualizarHome.php" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="id_actualizar" value="<?= $row["id_empleado"] ?>">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" value="<?= $row["nombre"] ?>" name="nombre" id="formId1" placeholder="" />
                                            <label for="formId1">Nombre</label>
                                        </div>
                                        <div class="text-center" style="border: 1px solid #ddd; border-radius: 4px">
                                            <img id="imagen" src="../controller/<?= $row["foto"] ?>" width="100" height="100" style="object-fit: cover;" alt="">
                                        </div>
                                        <input id="input-imagen" type="file" class="form-control mt-3" name="foto" accept="image/*">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control mt-3" value="<?= $row["salario"] ?>" name="salario" id="formId1" placeholder="" />
                                            <label for="formId1">Salario</label>
                                        </div>
                                        <textarea name="descripcion" id="" cols="30" class="form-control" rows="5"><?= $row["descripcion"] ?></textarea>
                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control mt-3" value="<?= $row["fecha_inicio"] ?>" name="fecha_inicio" id="formId1" placeholder="" />
                                            <label for="formId1">Fecha de Inicio</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control mt-3" value="<?= $row["fecha_final"] ?>" name="fecha_final" id="formId1" placeholder="" />
                                            <label for="formId1">Fecha de Final</label>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" name="btn-actualizar" class="btn btn-success" data-bs-dismiss="modal">Actualizar</button>
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

/**
 * Deletes a project based on the provided value.
 *
 * @param {type} value - The value used to identify the project to be deleted
 * @return {type} 
 */
function deleteProyecto(value) {
    swal({
        title: "¿Estás seguro?",
        text: "Una vez hecho, no podrás revertirlo.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            window.location.href = `../controller/eliminarproyecto.php?id=${value}`;
        }
    });
}
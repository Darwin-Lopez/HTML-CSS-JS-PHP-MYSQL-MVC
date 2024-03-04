/**
 * Function to delete an employee with a confirmation dialog.
 *
 * @param {type} value - the value used to identify the employee to be deleted
 * @return {type} undefined
 */
function deleteEmpleado(value) {
    swal({
        title: "¿Estás seguro?",
        text: "Una vez hecho, no podrás revertirlo.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            window.location.href = `../controller/eliminarempleado.php?id=${value}`;
        }
    });
}
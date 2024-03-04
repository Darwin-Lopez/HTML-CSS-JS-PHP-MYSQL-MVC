document.getElementById('input-imagen').addEventListener('change', function(event) {
    const imagen = document.getElementById('imagen');
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function(e) {
        imagen.src = e.target.result;
    }

    reader.readAsDataURL(file);
});
/**
 * Function to delete employee profile.
 *
 * @param {type} value - The value to be used for deletion.
 * @return {type} undefined
 */
function deleteEmpPro(value) {
    swal({
        title: "¿Estás seguro?",
        text: "Una vez hecho, no podrás revertirlo.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            window.location.href = `../controller/home.php?id=${value}`;
        }
    });
}


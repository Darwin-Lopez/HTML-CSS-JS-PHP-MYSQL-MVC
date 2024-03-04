const dni = document.getElementById("dni");
const small_dni = document.querySelector(".small-dni");

dni.addEventListener("input", currentDniinput);
/**
 * Function to handle the current DNI input, validating and updating the UI accordingly.
 *
 * @param {void} 
 * @return {void} 
 */
function currentDniinput(){
    const currenDni = dni.value;
    if(isNaN(currenDni)){
        dni.classList.add("is-invalid");
        small_dni.style.display = "block";
    }else{
        dni.classList.remove("is-invalid");
        small_dni.style.display = "none";
    }
}

const edad = document.getElementById("edad");
const small_edad = document.querySelector(".small-edad");
edad.addEventListener("input", currentValidateEdad);
/**
 * Validates the current edad value and updates the UI accordingly.
 *
 * @param {type} edad - the current edad value
 * @return {void} 
 */
function currentValidateEdad(){
    const currentEdad = edad.value;
    if(isNaN(currentEdad)){
        edad.classList.add("is-invalid");
        small_edad.style.display = "block";
    }else{
        edad.classList.remove("is-invalid");
        small_edad.style.display = "none";
    }
}

const numero = document.getElementById("numero");
const small_numero = document.querySelector(".small-numero");

numero.addEventListener("input", currentValidateNumero);
/**
 * Validate the current value of the 'numero' input field.
 *
 * @param {} 
 * @return {} 
 */
function currentValidateNumero(){
    const currentNumero = numero.value;
    if(isNaN(currentNumero)){
        numero.classList.add("is-invalid");
        small_numero.style.display = "block";
    }else{
        numero.classList.remove("is-invalid");
        small_numero.style.display = "none";
    }
}
/**
 * Displays an image based on the input file selected by the user.
 *
 * @param {object} input - The input element for selecting the image file.
 * @return {void} 
 */
function mostrarImagen(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            document.getElementById('imagenUsuario').src = e.target.result;
        }

        reader.readAsDataURL(input.files[0]);
    }
}


const btn_registrar = document.getElementById("btn-registrar");

btn_registrar.addEventListener("click", function(e){
    if(dni.classList.contains("is-invalid") || edad.classList.contains("is-invalid") || numero.classList.contains("is-invalid")){
        e.preventDefault();
    }
})
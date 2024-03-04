const usuario = document.getElementById("usuario");
const smallusuario = document.querySelector(".small-usuario");

usuario.addEventListener("input", currentValidateUsuario);

/**
 * Validates the current usuario value. If the value is empty, adds "is-invalid" class to usuario and displays an error message; otherwise, removes the "is-invalid" class and hides the error message.
 *
 * @param {type} paramName - description of parameter
 * @return {type} description of return value
 */
function currentValidateUsuario(){
    const currentUsuario = usuario.value;
    if(currentUsuario === ""){
        usuario.classList.add("is-invalid")
        smallusuario.style.display = "block";
    }else{
        usuario.classList.remove("is-invalid");
        smallusuario.style.display = "none";
    }
}

const clave = document.getElementById("clave");
const smallPassword = document.querySelector(".small-clave");

clave.addEventListener("input", currentValidatePassword);
/**
 * Validates the current password input field and updates the UI accordingly.
 *
 * @param {type} paramName - description of parameter
 * @return {type} description of return value
 */

function currentValidatePassword(){
    const currentPassword = clave.value;
    if(currentPassword === ""){
        clave.classList.add("is-invalid")
        smallPassword.style.display = "block";
    }else{
        clave.classList.remove("is-invalid");
        smallPassword.style.display = "none";
    }
}

const btnLogin = document.getElementById("btn-login");

btnLogin.addEventListener("click", (e)=>{
    if(usuario.classList.contains("is-invalid") || clave.classList.contains("is-invalid")){
        e.preventDefault();
    }
})
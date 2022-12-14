//modal form

const ventana = document.querySelector(".modal");
const modal = document.querySelector(".modal-content");
const formRegistro = document.querySelector(".form-container");

function openModal() {
    modal.style.display = "block";
    ventana.style.display = "block";
    console.log('modal abierto');
}

function closeModal() {
    modal.style.display = "none";
    ventana.style.display = "none";
    form.reset(); /*mirar*/
    console.log('modal cerrado');
}

/* cierra el formulario cuando el usuario de click fuera de la ventana. */
ventana.onclick = function(event) {
    if (event.target == ventana) {
        ventana.style.display = "none";
        closeModal();
        console.log('cerrar todo');
    }
}

function limpiarForm() {
    form.reset();
}

function showPassword(){
    const inputPass = document.querySelector('#psw');
    if (inputPass.type === 'password') {
        inputPass.type = 'text';
    } else {
        inputPass.type = 'password';
    }
}

/*================================
Funciones para validar los campos
del formulario.
=================================*/
function validarFormulario(){

    const formulario = document.formulario;

// Validar confimación de contraseña
    if(formulario.contrasena.value != formulario.confirmarcontra.value){
        document.getElementById("alerta").innerHTML = '<div class="alert alert-danger alert-dismissible fade show"><span>Confirmación de contraseña incorrecta.</span><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button></div>';
        formulario.contrasena.value = "";     
        formulario.confirmarcontra.value = "";
        formulario.contrasena.focus();

    }

}
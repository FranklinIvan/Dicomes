document.getElementById("solicitudCambio").style.backgroundColor = "rgb(248,249,252)";
document.getElementById("solicitudCambioTitulo").style.color = "black";
document.getElementById("solicitudCambioIcono").style.color = "black";

function seleccionID(id){
  //Capturando los valores de la solicitud seleccionada
    var correo = "correo".concat(id);
    var nombre = "nombre".concat(id);
    var apellido = "apellido".concat(id);
    var a_fecha = "a_fecha".concat(id);
    var a_hora_inicio = "a_hora_inicio".concat(id);
    var a_hora_final = "a_hora_final".concat(id);
    var a_ubicacion = "a_ubicacion".concat(id);
    var a_descripcion = "a_descripcion".concat(id);
    var fecha = "fecha".concat(id);
    var hora_inicio = "hora_inicio".concat(id);
    var hora_final = "hora_final".concat(id);
    var ubicacion = "ubicacion".concat(id);
    var descripcion = "descripcion".concat(id);
    var idServicio = "idServicio".concat(id);
    var idSolicitud = "idSolicitud".concat(id);
    var idCliente = "idCliente".concat(id);

    //Asignando el contenido de la solicitud seleccionada a los elementos del MODAL
    document.getElementById("correo").innerHTML= document.getElementById(correo).value;
    document.getElementById("solicitante").innerHTML= document.getElementById(nombre).value + " " + document.getElementById(apellido).value;
    document.getElementById("a_fecha").innerHTML= document.getElementById(a_fecha).value;
    document.getElementById("a_hora_inicio").innerHTML= document.getElementById(a_hora_inicio).value;
    document.getElementById("a_hora_final").innerHTML= document.getElementById(a_hora_final).value;
    document.getElementById("a_ubicacion").innerHTML= document.getElementById(a_ubicacion).value;
    document.getElementById("a_descripcion").innerHTML= document.getElementById(a_descripcion).value;
    document.getElementById("fecha").innerHTML= document.getElementById(fecha).value;
    document.getElementById("hora_inicio").innerHTML= document.getElementById(hora_inicio).value; 
    document.getElementById("hora_final").innerHTML= document.getElementById(hora_final).value; 
    document.getElementById("ubicacion").innerHTML= document.getElementById(ubicacion).value;
    document.getElementById("descripcion").innerHTML= document.getElementById(descripcion).value;

    //Asignando los valores que seran enviados en el formulario
    //Esto se hace debido a que los elementos del MODAL son LABEL. 
    //Los LABEL no se le pueden hacer submit. POr lo tanto se colocaron input de tipo hidden.
    document.getElementById("idCliente").value= document.getElementById(idCliente).value;
    document.getElementById("idSolicitud").value= document.getElementById(idSolicitud).value;
    //ID del servicio no es tan necesario pero se maneja por si acaso.
    document.getElementById("idServicio").value= document.getElementById(idServicio).value;
    document.getElementById("a_fechaForm").value= document.getElementById(a_fecha).value;
    document.getElementById("a_hora_inicioForm").value= document.getElementById(a_hora_inicio).value;
    document.getElementById("a_hora_finalForm").value= document.getElementById(a_hora_final).value;
    document.getElementById("a_ubicacionForm").value= document.getElementById(a_ubicacion).value;
    document.getElementById("a_descripcionForm").value= document.getElementById(a_descripcion).value;

  }
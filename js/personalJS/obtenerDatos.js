
//OBTENER LOS DATOS Y AGREGARLOS AL MODAL PARA ACTUALIZAR LOS EVENTOS
function obtenerEvento(datosActualizar){
    
    //DESCONCATENAR
    d=datosActualizar.split('||');
    $('#id_servicioA').val(d[0]);
    $('#nuevaFecha').val(d[1]);
    $('#nuevaUbicacion').val(d[2]);
    $('#nuevaHoraInicial').val(d[3]);
    $('#nuevaHoraFinal').val(d[4]);
    $('#nuevaDescripcion').val(d[5]);

}


//OBTENER TODOS LOS DATOS Y MOSTRARLOS AL MODAL
function verEvento(datosMostrar){
    
    //DESCONCATENAR
    informacion=datosMostrar.split('||');
    $('#id_servicio').val(informacion[0]);
    $('#verNombre').val(informacion[1]);
    $('#verFecha').val(informacion[2]);
    $('#verUbicacion').val(informacion[3]);
    $('#verHoraInicial').val(informacion[4]);
    $('#verHoraFinal').val(informacion[5]);
    $('#verTipoEvento').val(informacion[6]);
    $('#verCantidadPersonas').val(informacion[7]);
    $('#verDescripcion').val(informacion[8]);
}


function actualizarEvento(){
    id_servicio=$('#id_servicioA').val();
    fecha=$('#nuevaFecha').val();
    ubicacion=$('#nuevaUbicacion').val();
    hora_inicial=$('#nuevaHoraInicial').val();
    hora_final=$('#nuevaHoraFinal').val();
    descripcion=$('#nuevaDescripcion').val();
}

function eliminaEvento(id_servicio){
    id=id_servicio;
    $('#id_servicioE').val(id);

/*
  cadena= "id_servicio=" + id_servicio

    $.ajax({
        type:"POST",
        url:"../../admin/eliminarEvento.php",
        data:cadena,
        success:function(r){
            if (r==1){
                alertify.success("Eliminado con exito");
            }else{
                alertify.error("Error al eliminar");
            }
        }
    });  */
}




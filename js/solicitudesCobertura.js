
function verEvento(datosMostrar){
    
   
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
    $('#id_cliente').val(informacion[9]);
};









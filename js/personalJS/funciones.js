/*================================
Funciones JS.
=================================*/
function mostrarInfo(datos) {
  d = datos.split('/');

  // Datos para mostrar info
  $('#solicitanteInfo').val(d[0] + " " + d[1]);
  $('#fechaInfo').val(d[2]);
  $('#ubicacionInfo').val(d[3]);
  $('#horaIniInfo').val(d[4]);
  $('#horaFinInfo').val(d[5]);
  $('#tipoServInfo').val(d[6]);
  $('#tipoEvenInfo').val(d[7]);
  $('#cantidadPerInfo').val(d[8]);
  $('#tituloInfo').val(d[9]);
  $('#descripcionInfo').val(d[10]);
  $('#estadoInfo').val(d[11]);
}

function actualizarInfo(datos) {
  d = datos.split('/');

  // Datos para actualizar
  $('#fechaU').val(d[2]);
  $('#ubicacionU').val(d[3]);
  $('#horaIniU').val(d[4]);
  $('#horaFinU').val(d[5]);
  $('#descripcionU').val(d[10]);
  $('#id_servicioU').val(d[12]);
}

function eliminarInfo(id){
  // Dato para eliminar
  $('#idEliminar').val(id);
}

/*================================
Notificaciones JS.
=================================*/
function mostrarNoti(datos){
  d = datos.split('/');

  //Datos para Notificación
  $('#msjNombre').html(d[0]+" "+d[1]);
  $('#msjFoto').html("src='../images/imagesDB/"+d[2]+"'");
  $('#msjMensaje').html(d[3]);
  $('#msjId_notificacion').val(d[4]);
  $('#msjId_cliente').val(d[5]);
}

/* $(document).ready(function(){
  $('#busqueda').keyup(function(event){
    event.preventDefault();
    let data = $('#formMessage').serializeArray();
    $.post({
      url:'../../views/prueba.php',
      data:data,
      success: function(response){
        $('#respuesta').html(response);
      }
    });
  });
}); */
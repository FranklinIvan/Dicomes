<?php

require('../views/sections/superior.php');

$solicitudes=$conex->query("SELECT * FROM solicitudes ");

?>


<script src="../js/solicitudesCobertura.js"></script>



<div class="container text-gray-900">

  <h2>Solicitudes de Coberturas</h2><br>


  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="text-gray-900 d-inline">Lista con las solicitudes de cobertura para eventos</h6>
      <span type="button" data-toggle="modal" data-target="#QCoberturas" class="font-weight-bold float-right">?</span>
  
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="text-gray-900" style="background-color: #e6e6e7;">
            <tr>
              <th>Ver</th>
              <th>Fecha</th>
              <th>Solicitante</th>
              <th>Descripción</th>
            </tr>
          </thead>
          <tbody class="text-gray-900">
          <?php foreach($solicitudes as $fila){ 

                      $datosMostrar=$fila['id']."||".
                      $fila['nombre']." ".$fila['apellido']."||".
                      $fila['start']."||".   
                      $fila['ubicacion']."||".
                      $fila['hora_inicio']."||".
                      $fila['hora_final']."||".
                      $fila['tipo_evento']."||".
                      $fila['cantidad_personas']."||".
                      $fila['descripcion'];
            ?>
          <tr>
              <td role="button" data-toggle="modal" data-target="#ModalInfo"  onclick="verEvento('<?php echo $datosMostrar; ?>')" class="ModalInfo"> <i class="fas fa-search fa-fw"></i> </td>
              <td>  <?php echo $fila["start"]?> </td>
              <td><?php echo $fila["nombre"] .$fila[ "apellido"] ?></td>
              <td><?php echo $fila["descripcion"]?></td>
            </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>



</div>

<form  method="POST" action="../admin/apruebarechazaEvento.php"  > 
<div class="modal fade text-gray-900" id="ModalInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Información</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <input type='hidden'  id="id_servicio" name="id_servicio" >
        <div class="form-group">
          <label> <span class="font-weight-bold">De:</span> </label>
          <input class="form-control font-italic" id="verNombre" disabled> 
        </div>
        <div class="form-group">
          <label> <span class="font-weight-bold">Fecha:</span> </label>
          <input class="form-control font-italic" id="verFecha" disabled> 
        </div>
        <div class="form-group">
          <label> <span class="font-weight-bold">Ubicación:</span> </label>
          <input class="form-control font-italic" id="verUbicacion" disabled> 
        </div>
        <div class="form-group">
          <label> <span class="font-weight-bold">Hora inicio:</span> </label>
          <input class="form-control font-italic" id="verHoraInicial" disabled> 
        </div>
        <div class="form-group">
          <label> <span class="font-weight-bold">Hora final:</span> </label>
          <input class="form-control font-italic" id="verHoraFinal" disabled> 
        </div>
        <div class="form-group">
          <label> <span class="font-weight-bold">Tipo de Evento: </span> </label>
          <input class="form-control font-italic" id="verTipoEvento" disabled> 
        </div>
        <div class="form-group">
          <label> <span class="font-weight-bold">Cantidad de Personas: </span> </label>
          <input class="form-control font-italic" id="verCantidadPersonas" disabled> 
        </div>
        <div class="form-group">
          <label> <span class="font-weight-bold">Descripción: </span> </label>
  
          <textarea  id="verDescripcion" cols="57" rows=5 disabled></textarea>
        </div>

      </div>
      <div class="modal-footer">
        <button  type="submit" id="Aceptar-submit" class="btn text-white" style="background-color: #0f9bd0;" value='Aceptar' name="submit">Aceptar</button>
        <button type="submit" id="Rechazar-submit" class="btn text-white" style="background-color: #b9181f;" value='Rechazar' name="submit">  Rechazar</button>
        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
</form>


<!-- QEstado Modal -->
<div class="modal fade text-gray-900" id="QCoberturas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Mis Solicitudes?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>
          llenar..
          <!-- Esta lista muestra las solicitudes de cobertura enviadas por ti.<br>---<br>Las solicitudes con estado "pendiente" puede ser canceladas.<br>Las solicitudes con estado "aceptado" pueden ser actualizadas o canceladas.<br>---<br>Las actualizaciones permiten modificar campos para la cobertura del evento. Una vez actualizada la información, el departamento de Dirección de Comunicación Estratégica (DICOMES) podrá aceptar o rechazar la solicitud de actualización. -->
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn text-white" data-dismiss="modal" style="background-color: #68086c;">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<?php
require('../views/sections/inferior.php');
?>
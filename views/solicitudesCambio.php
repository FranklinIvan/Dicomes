<?php
require('../admin/conexionDB.php');
require('../views/sections/superior.php');
$cambios = $conex->query("SELECT * FROM solicitudActualizar");
$contador = 0;
?>

<!-- Main Content -->
<div class="container text-gray-900">

  <h2>Solicitudes de Cambio</h2><br>
  <?php if (isset($_REQUEST['msg'])) { ?>
    <div class="alert <?php echo $_REQUEST['color']?> alert-dismissible fade show">
      <h5><?php echo $_REQUEST['msg']; ?></h5>
      <button type="button" class="close" data-dismiss="alert"><span>&times;</span>
      </button>
    </div>
  <?php }?>

  <!-- Table of Users DB -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="text-gray-900 d-inline">Lista con las solicitudes de cambio para eventos</h6>
      <span type="button" data-toggle="modal" data-target="#QCambios" class="font-weight-bold float-right">?</span>
      <!-- <span class="font-weight-bold">?</span> -->
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
            <?php foreach($cambios as $fila){ ?>
            <tr>
              <td id="<?php echo $contador?>" role="button" data-toggle="modal" data-target="#ModalInfo" onclick="seleccionID(<?php echo $contador?>)"> <i class="fas fa-search fa-fw"></i> </td>
              <td><?php echo $fila['start']; ?></td>
              <td><?php echo $fila['nombre']." ".$fila['apellido']; ?></td>
              <td><?php echo $fila['a_descripcion'];?></td>
            </tr>
            <!-- Registrando los datos de cada solicitud listada-->
            <input type="hidden" id="idCliente<?php echo $contador?>" value="<?php echo $fila['id_cliente']; ?>">
            <input type="hidden" id="idServicio<?php echo $contador?>" value="<?php echo $fila['id']; ?>">
            <input type="hidden" id="idSolicitud<?php echo $contador?>" value="<?php echo $fila['id_solicitud']; ?>">
            <input type="hidden" id="correo<?php echo $contador?>" value="<?php echo $fila['correo']; ?>">
            <input type="hidden" id="nombre<?php echo $contador?>" value="<?php echo $fila['nombre']; ?>">
            <input type="hidden" id="apellido<?php echo $contador?>" value="<?php echo $fila['apellido']; ?>">
            <input type="hidden" id="a_fecha<?php echo $contador?>" value="<?php echo $fila['a_fecha']; ?>">
            <input type="hidden" id="a_hora_inicio<?php echo $contador?>" value="<?php echo $fila['a_hora_inicio']; ?>">
            <input type="hidden" id="a_hora_final<?php echo $contador?>" value="<?php echo $fila['a_hora_final']; ?>">
            <input type="hidden" id="a_ubicacion<?php echo $contador?>" value="<?php echo $fila['a_ubicacion']; ?>">
            <input type="hidden" id="a_descripcion<?php echo $contador?>" value="<?php echo $fila['a_descripcion']; ?>">
            <input type="hidden" id="fecha<?php echo $contador?>" value="<?php echo $fila['start']; ?>">
            <input type="hidden" id="hora_inicio<?php echo $contador?>" value="<?php echo $fila['hora_inicio']; ?>">
            <input type="hidden" id="hora_final<?php echo $contador?>" value="<?php echo $fila['hora_final']; ?>">
            <input type="hidden" id="ubicacion<?php echo $contador?>" value="<?php echo $fila['ubicacion']; ?>"> 
            <input type="hidden" id="descripcion<?php echo $contador?>" value="<?php echo $fila['descripcion']; ?>">

            <?php $contador++; }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- End Table of Users DB -->

</div>

<!-- End of Main Content -->


<!-- Modals -->

<!-- Modal de informacion  -->

<div class="modal fade text-gray-900" id="QCambios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Qué son las solicitudes de cambios?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>
          Las solicitudes de cambio son peticiones enviadas por el/la solicitante requiriendo un cambio en la información del evento.<br>---<br>Usted puede puede aprobar o rechazar la solitud, independientemente de lo elegido, usted tendrá un campo para redactar el motivo, y este será enviado al solicitante.
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn text-white" data-dismiss="modal" style="background-color: #68086c;">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal De Informacion -->

<!-- Modal de solicitud de  cambio -->

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

        <div class="form-group">
          <label class="font-weight-bold">Solicitante:</label> <label id="solicitante" ></label> 
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Correo:</label> <label id="correo" ></label> 
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Nueva Ubicación:</label> <label id="a_ubicacion" ></label> <br>
          <label class="text-muted">Antigua Ubicación: <label id="ubicacion" ></label> </label>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Nueva Fecha del Evento:</label> <label id="a_fecha" ></label><br>
          <label class=" text-muted">Antigua Fecha del Evento: <label id="fecha" ></label></label>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Nueva Hora Inicio: </label> <label id="a_hora_inicio" ></label><br>
          <label class=" text-muted">Antigua Hora Inicio:<label id="hora_inicio" ></label> </label> 
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Nueva Hora Fin:</label> <label id="a_hora_final" ></label> <br>
          <label class=" text-muted">Antigua Hora Fin:  <label id="hora_final" ></label></label>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Nueva Descripción: </label> <label id="a_descripcion" ></label> <br>
          <label class=" text-muted">Antigua Descripción: <label id="descripcion"></label></label>
        </div>

        <div class="form-group">
          <label class="font-weight-bold">Motivo de la aprovación o rechazo:</label><br>
          <textarea name="mensaje" id="" cols="57" rows=5 form="formulario" required></textarea>
        </div>

      </div>
      <div class="modal-footer">
        <!-- FORMULARIO -->
        <form action="../admin/realizarCambioEvento.php" method="POST" id="formulario">
          <input type="hidden" name="idCliente" id="idCliente">
          <input type="hidden" name="idSolicitud" id="idSolicitud">
          <input type="hidden" name="idServicio" id="idServicio">
          <input type="hidden" name="a_ubicacionForm" id="a_ubicacionForm">
          <input type="hidden" name="a_fechaForm" id="a_fechaForm">
          <input type="hidden" name="a_hora_inicioForm" id="a_hora_inicioForm">
          <input type="hidden" name="a_hora_finalForm" id="a_hora_finalForm">
          <input type="hidden" name="a_descripcionForm" id="a_descripcionForm">

          <button name="accion" type="submit" value="aceptar" id="btnAgregar" class="btn text-white" style="background-color: #0f9bd0;">Aceptar</button>
          <button name="accion" type="submit" value="rechazar" id="btnEliminar" class="btn text-white" style="background-color: #b9181f;">Rechazar</button>
        </form>
        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal solicitud de cambio -->

<script src="../js/personalJS/solicitudesCambio.js"></script>

<?php
require('../views/sections/inferior.php');
?>
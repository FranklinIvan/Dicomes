<?php
require('../views/sections/superior.php');
?>

<!-- Main Content -->
<div class="container text-gray-900">

  <h2>Solicitudes de Cambio</h2><br>

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
            <tr>
              <td role="button" data-toggle="modal" data-target="#ModalInfo"> <i class="fas fa-search fa-fw"></i> </td>
              <td>29/11/20</td>
              <td>Franklin Iván</td>
              <td>Mira, te voy a decir algo, pero sólo te lo voy a decir una sola vez ¿ok?, cha el barca está mal loco y eso cómo me molesta, ya era eso jaja.</td>
            </tr>
            <tr>
              <td role="button" data-toggle="modal" data-target="#ModalInfo"> <i class="fas fa-search fa-fw"></i> </td>
              <td>01/12/20</td>
              <td>Jabier Harrue</td>
              <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet maxime qui excepturi esse natus quos temporibus distinctio minus, similique error dolores..</td>
            </tr>
            <tr>
              <td role="button" data-toggle="modal" data-target="#ModalInfo"> <i class="fas fa-search fa-fw"></i> </td>
              <td>14/12/20</td>
              <td>Rikardo Ñañes</td>
              <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet maxime qui excepturi esse natus quos temporibus distinctio minus.</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- End Table of Users DB -->

</div>

<!-- End of Main Content -->


<!-- Modals -->

<!-- Modal QCambios -->

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
<!-- End Modal QCambios -->

<!-- Modal info -->

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
          <label class="font-weight-bold">Solicitante:</label>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Correo:</label>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Nueva Ubicación:</label><br>
          <label class=" text-muted">Antigua Ubicación:</label>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Nueva Fecha del Evento:</label><br>
          <label class=" text-muted">Antigua Fecha del Evento:</label>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Nueva Descripción:</label><br>
          <label class=" text-muted">Antigua Descripción:</label>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Nueva Hora Inicio:</label><br>
          <label class=" text-muted">Antigua Hora Inicio:</label>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Nueva Hora Fin:</label><br>
          <label class=" text-muted">Antigua Hora Fin:</label>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Motivo de la aprovación o rechazo:</label><br>
          <textarea name="descripcion" id="" cols="57" rows=8></textarea>
        </div>

      </div>
      <div class="modal-footer">
        <button id="btnAgregar" class="btn text-white" style="background-color: #0f9bd0;">Aceptar</button>
        <button id="btnEliminar" class="btn text-white" style="background-color: #b9181f;">Rechazar</button>
        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal info -->

<?php
require('../views/sections/inferior.php');
?>
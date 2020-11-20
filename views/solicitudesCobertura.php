<?php

require('../views/sections/superior.php');
require('../admin/conexionDB.php');

$solicitudes=$conex->query("SELECT * FROM solicitudes ");

?>

<!-- Main Content -->
<div class="container text-gray-900">

  <h2>Solicitudes de Coberturas</h2><br>

  <!-- Table of Users DB -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="text-gray-900 d-inline">Lista con las solicitudes de cobertura para eventos</h6>
      <span type="button" data-toggle="modal" data-target="#QCoberturas" class="font-weight-bold float-right">?</span>
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
          <?php foreach($solicitudes as $fila){ ?>
          <tr>
              <td role="button" data-toggle="modal" data-target="#ModalInfo"> <i class="fas fa-search fa-fw"></i> </td>
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

  <!-- End Table of Users DB -->

</div>

<!-- End of Main Content -->


<!-- Modals -->

<!-- Modal QCoberturas -->

<div class="modal fade text-gray-900" id="QCoberturas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Coberturas?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>
          Las solicitudes de cobeturas son peticiones enviadas por algún miembro de la comunidad de la Universidad Tecnológica de Panamá, desde administrativos hasta estudiantes.<br>---<br>
          Usted puede puede aprobar o rechazar la solitud, independientemente de lo elegido, se le comunicará al solicitante.
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn text-white" data-dismiss="modal" style="background-color: #68086c;">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal QCoberturas -->

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
          <label> <span class="font-weight-bold">De:</span> </label>
        </div>
        <div class="form-group">
          <label> <span id= "fecha" class="font-weight-bold">Fecha:</span> </label>
        </div>
        <div class="form-group">
          <label> <span id= "ubicacion" class="font-weight-bold">Ubicación:</span> </label>
        </div>
        <div class="form-group">
          <label> <span id= "horainicio"  class="font-weight-bold">Hora inicio:</span> </label>
        </div>
        <div class="form-group">
          <label> <span  id= "horafinal"  class="font-weight-bold">Hora final:</span> </label>
        </div>
        <div class="form-group">
          <label> <span id= "tiposervicio" class="font-weight-bold">Tipo de Servicio: </span> </label>
        </div>
        <div class="form-group">
          <label> <span id= "tipoevento" class="font-weight-bold">Tipo de Evento: </span> </label>
        </div>
        <div class="form-group">
          <label> <span id= "cantperson" class="font-weight-bold">Cantidad de Personas: </span> </label>
        </div>
        <div class="form-group">
          <label> <span id= "descripcion" class="font-weight-bold">Descripción: </span> </label>
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
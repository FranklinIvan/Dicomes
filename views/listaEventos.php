<?php
require('../views/sections/superior.php');
?>

<!-- Main Content -->
<div class="container text-gray-900">

  <h2>Lista de Eventos</h2><br>

  <!-- Table of Users DB -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="text-gray-900" style="background-color: #e6e6e7;">
            <tr>
              <th>Ver</th>
              <th>Fecha</th>
              <th>Solicitante</th>
              <th>Descripción</th>
              <th>Actualizar</th>
              <th>Eliminar</th>
            </tr>
          </thead>
          <tbody class="text-gray-900">
            <tr>
              <td role="button" data-toggle="modal" data-target="#ModalInfo"> <i class="fas fa-search fa-fw"></i> </td>
              <td>22/11/20</td>
              <td>Franklin Iván</td>
              <td>Sinceramente creo que el barca, esta temporada, no ganará nada, me jode pero siendo honesto creo que será así.</td>
              <td>
                <button data-toggle="modal" data-target="#btnActualizar" class="btn text-white" style="background-color: #0f9bd0;">Actualizar</button>
              </td>
              <td class="text-center">
                <button data-toggle="modal" data-target="#btnEliminar" class="btn text-white" style="background-color: #b9181f;"><i class="fas fa-trash-alt fa-fw"></i></button>
              </td>
            </tr>
            <tr>
              <td role="button" data-toggle="modal" data-target="#ModalInfo"> <i class="fas fa-search fa-fw"></i> </td>
              <td>24/11/20</td>
              <td>Juan Zamora</td>
              <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est illo maxime quis harum amet sed culpa vero voluptates.</td>
              <td>
                <button data-toggle="modal" data-target="#btnActualizar" class="btn text-white" style="background-color: #0f9bd0;">Actualizar</button>
              </td>
              <td class="text-center">
                <button data-toggle="modal" data-target="#btnEliminar" class="btn text-white" style="background-color: #b9181f;"><i class="fas fa-trash-alt fa-fw"></i></button>
              </td>
            </tr>
            <tr>
              <td role="button" data-toggle="modal" data-target="#ModalInfo"> <i class="fas fa-search fa-fw"></i> </td>
              <td>26/11/20</td>
              <td>Ricardo Ye</td>
              <td>Cha pero ta priti loco, qué locura con los botones esos loco chaa la vida.</td>
              <td>
                <button data-toggle="modal" data-target="#btnActualizar" class="btn text-white" style="background-color: #0f9bd0;">Actualizar</button>
              </td>
              <td class="text-center">
                <button data-toggle="modal" data-target="#btnEliminar" class="btn text-white" style="background-color: #b9181f;"><i class="fas fa-trash-alt fa-fw"></i></button>
              </td>
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
          <label> <span class="font-weight-bold">Fecha:</span> </label>
        </div>
        <div class="form-group">
          <label> <span class="font-weight-bold">Ubicación:</span> </label>
        </div>
        <div class="form-group">
          <label> <span class="font-weight-bold">Hora inicio:</span> </label>
        </div>
        <div class="form-group">
          <label> <span class="font-weight-bold">Hora final:</span> </label>
        </div>
        <div class="form-group">
          <label> <span class="font-weight-bold">Tipo de Servicio: </span> </label>
        </div>
        <div class="form-group">
          <label> <span class="font-weight-bold">Tipo de Evento: </span> </label>
        </div>
        <div class="form-group">
          <label> <span class="font-weight-bold">Cantidad de Personas: </span> </label>
        </div>
        <div class="form-group">
          <label> <span class="font-weight-bold">Descripción: </span> </label>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal info -->

<!-- Modal btnActualizar -->

<div class="modal fade text-gray-900" id="btnActualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <label class="font-weight-bold">Fecha:</label>
          <input type="date" class="form-control font-italic" name="fecha" placeholder="fecha..." required>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Ubicación:</label>
          <input type="text" class="form-control font-italic" name="ubicacion" placeholder="ubicación..." required>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Hora Inicial:</label>
          <input type="time" class="form-control font-italic" name="horaInicial" placeholder="hora inicial..." required>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Hora Final:</label>
          <input type="time" class="form-control font-italic" name="horaFinal" placeholder="hora final..." required>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Descripción:</label><br>
          <textarea name="descripcion" id="" cols="57" rows=5></textarea>
        </div>
        <!-- <div class="form-group">
          <label class="font-weight-bold">Color</label>
          <input type="color" class="form-control font-italic" name="color" placeholder="color..." required>
        </div> -->

      </div>
      <div class="modal-footer">
        <button type="button" class="btn text-white" style="background-color: #0f9bd0;">Guardar Cambios</button>
        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal btnActualizar -->

<!-- Modal btnEliminar -->

<div class="modal fade text-gray-900" id="btnEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Estás seguro de que quieres eliminar este evento?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn text-white" style="background-color: #b9181f;">Eliminar</button>
        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal btnEliminar -->

<?php
require('../views/sections/inferior.php');
?>
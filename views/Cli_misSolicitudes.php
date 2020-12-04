<?php
require('../views/sections/superior.php');
//require('../admin/conexionDB.php');
$sql = $conex->query("SELECT * FROM misSolicitudes WHERE id_cliente =".$_SESSION['id']);
?>
<!-- Assets JS -->
<script src="../js/personalJS/funciones.js"></script>

<!-- Main Content -->
<div class="container text-gray-900">

  <?php
  $cantidad = $sql->rowCount();
  if($cantidad <= 0) {
  ?>

    <div class="">
      <h2>Sin Solicitudes</h2><br>
      <h6 class="mb-5">Para enviar solicitudes de coberturas de tus eventos, <span class="font-weight-bold">¡ve a la agenda y elige un día libre!</span></h6>
      <img class="img-fluid mx-auto d-block" src="../images/empty.png" alt="Imagen" style="width: 150px; height: 160px;">
    </div>

  <?php
  } else {
  ?>

    <h2>Mis Solicitudes</h2><br>

    <!-- Message -->
    <?php if (isset($_GET['solicitudEliminada'])) { ?>
      <div class="alert alert-success alert-dismissible fade show">
        <h6>La solicitud de cobertura ha sido eliminada con éxito</h6>
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span>
        </button>
      </div>
    <?php } else if (isset($_GET['error'])) { ?>
      <div class="alert alert-danger alert-dismissible fade show">
        <span>¡Ups, ha ocurrido un error!</span>
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span>
        </button>
      </div>
    <?php } ?>

    <!-- Tabla de solicitudes -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="text-gray-900 d-inline">Lista de todas las solicitudes enviadas por ti</h6>
        <span type="button" data-toggle="modal" data-target="#QEstado" class="font-weight-bold float-right">?</span>
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
                <th>estado</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
              </tr>
            </thead>
            <tbody class="text-gray-900">

              <?php
              foreach($sql as $resultados){

                $datos =  $resultados['nombre'] . "/" .
                  $resultados['apellido'] . "/" .
                  $resultados['start'] . "/" .
                  $resultados['ubicacion'] . "/" .
                  $resultados['hora_inicio'] . "/" .
                  $resultados['hora_final'] . "/" .
                  $resultados['tipo_servicio'] . "/" .
                  $resultados['tipo_evento'] . "/" .
                  $resultados['cantidad_personas'] . "/" .
                  $resultados['title'] . "/" .
                  $resultados['descripcion'] . "/" .
                  $resultados['estado'];

                $eliminar = $resultados['id'];
              ?>
                <tr>
                  <td onclick="mostrarInfo('<?php echo $datos ?>')" role="button" data-toggle="modal" data-target="#ModalInfo"> <i class="fas fa-search fa-fw"></i> </td>
                  <td><?php echo $resultados['start'] ?></td>
                  <td><?php echo $resultados['nombre'] . " " . $resultados['apellido'] ?></td>
                  <td><?php echo $resultados['descripcion'] ?></td>
                  <td><?php echo $resultados['estado'] ?></td>
                  <?php if ($resultados['estado'] == 'pendiente') { ?>
                    <td>
                      <button data-toggle="modal" data-target="#btnActualizar" disabled class="btn text-white" style="background-color: #0f9bd0;">Actualizar</button>
                    </td>
                  <?php
                  } else {
                  ?>
                    <td>
                      <button onclick="actualizarInfo('<?php echo $datos ?>')" data-toggle="modal" data-target="#btnActualizar" class="btn text-white" style="background-color: #0f9bd0;">Actualizar</button>
                    </td>
                  <?php
                  }
                  ?>
                  <td class="text-center">
                    <button onclick="eliminarInfo('<?php echo $eliminar ?>')" data-toggle="modal" data-target="#btnEliminar" class="btn text-white" style="background-color: #b9181f;"><i class="fas fa-trash-alt fa-fw"></i></button>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!--Fin tabla de solicitudes -->
  <?php
  }
  ?>

</div>
<!-- End of Main Content -->

<!-- QEstado Modal -->
<div class="modal fade text-gray-900" id="QEstado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          Esta lista muestra las solicitudes de cobertura enviadas por ti.<br>---<br>Las solicitudes con estado "pendiente" puede ser canceladas.<br>Las solicitudes con estado "aceptado" pueden ser actualizadas o canceladas.<br>---<br>Las actualizaciones permiten modificar campos para la cobertura del evento. Una vez actualizada la información, el departamento de Dirección de Comunicación Estratégica (DICOMES) podrá aceptar o rechazar la solicitud de actualización.
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn text-white" data-dismiss="modal" style="background-color: #68086c;">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- info Modal -->
<div class="modal text-gray-900" tabindex="-1" id="ModalInfo" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #68086c;">
        <h5 class="modal-title text-white">Información</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="text-white" aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <label class="font-weight-bold">Título Evento:</label>
          <input class="form-control font-italic bg-white" id="tituloInfo" readonly>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-6">
              <label class="font-weight-bold">Fecha del Evento:</label>
              <input class="form-control font-italic bg-white" id="fechaInfo" readonly>
            </div>
            <div class="col-md-6">
              <label class="font-weight-bold">Estado:</label>
              <input class="form-control font-italic" id="estadoInfo" readonly>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Ubicación:</label>
          <input class="form-control font-italic bg-white" id="ubicacionInfo" readonly>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-6">
              <label class="font-weight-bold">Hora Inicio:</label>
              <input class="form-control font-italic bg-white" id="horaIniInfo" readonly>
            </div>
            <div class="col-md-6">
              <label class="font-weight-bold">Hora Final:</label>
              <input class="form-control font-italic bg-white" id="horaFinInfo" readonly>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-6">
              <label class="font-weight-bold">Tipo de Servicio:</label>
              <input class="form-control font-italic bg-white" id="tipoServInfo" readonly>
            </div>
            <div class="col-md-6">
              <label class="font-weight-bold">Tipo de Evento:</label>
              <input class="form-control font-italic bg-white" id="tipoEvenInfo" readonly>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-6">
              <label class="font-weight-bold">Cantidad de Personas:</label>
              <input class="form-control font-italic bg-white" id="cantidadPerInfo" readonly>
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Update Modal -->
<div class="modal text-gray-900" tabindex="-1" id="btnActualizar" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #68086c;">
        <h5 class="modal-title text-white">Actualizar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="text-white" aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="#" method="POST">

        <div class="modal-body">
          <div class="form-group">
            <label class="font-weight-bold">Fecha:</label>
            <input type="date" class="form-control font-italic bg-white" id="fechaU">
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Ubicación:</label>
            <input class="form-control font-italic bg-white" id="ubicacionU">
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <label class="font-weight-bold">Hora Inicial:</label>
                <input type="time" class="form-control font-italic bg-white" id="horaIniU">
              </div>
              <div class="col-md-6">
                <label class="font-weight-bold">Hora Final:</label>
                <input type="time" class="form-control font-italic bg-white" id="horaFinU">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Descripción:</label>
            <textarea cols="57" rows=5 id="descripcionU"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn text-white" name="btnSolicitud" id="btnSolicitud" style="background-color: #0f9bd0;">Solicitud de cambio</button>
          <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cerrar</button>
        </div>

      </form>

    </div>
  </div>
</div>

<!-- Delete Modal -->
<div class="modal text-gray-900" tabindex="-1" id="btnEliminar" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #68086c;">
        <h5 class="modal-title text-white">Eliminar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="text-white" aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¿Quieres eliminar esta solicitud de cobertura?</p>
      </div>
      <div class="modal-footer">
        <form action="../admin/calendar/eventos.php?accion=eliminar" method="POST">
          <button type="submit" class="btn text-white" style="background-color: #b9181f">Eliminar
          </button>
          <input type="hidden" id="idEliminar" name="idEliminar">
        </form>
        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<?php
require('../views/sections/inferior.php');
?>
<?php
require('../views/sections/superior.php');
$solicitudes = $conex->query("SELECT * FROM missolicitudes WHERE estado='pendiente'");
?>

<script src="../js/solicitudesCobertura.js"></script>

<div class="container text-gray-900">

  <?php
  $cantidad = $solicitudes->rowCount();
  if ($cantidad <= 0) {
  ?>

    <div class="">
      <h2>Sin Solicitudes de Cobertura</h2><br>
      <h6 class="mb-5">Por el momento, no cuentas con solicitudes de cobertura.</h6>
      <img class="img-fluid mx-auto d-block" src="../images/empty.png" alt="Imagen" style="width: 150px; height: 160px;">
    </div>

  <?php
  } else {
  ?>
    <h2>Solicitudes de Coberturas</h2><br>

    <!-- Message -->
    <?php if (isset($_GET['solicitudAceptada'])) { ?>
      <div class="alert alert-success alert-dismissible fade show">
        <h6>La solicitud de cobertura ha sido aceptada con éxito.</h6>
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span>
        </button>
      </div>
    <?php } else if (isset($_GET['solicitudRechazada'])) { ?>
      <div class="alert alert-success alert-dismissible fade show">
        <span>La solicitud de cobertura ha sido rechazada con éxito.</span>
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
              <?php foreach ($solicitudes as $fila) {

                $datosMostrar = $fila['id'] . "||" .
                  $fila['nombre'] . " " . $fila['apellido'] . "||" .
                  $fila['start'] . "||" .
                  $fila['ubicacion'] . "||" .
                  $fila['hora_inicio'] . "||" .
                  $fila['hora_final'] . "||" .
                  $fila['tipo_evento'] . "||" .
                  $fila['cantidad_personas'] . "||" .
                  $fila['descripcion'] . "||" .
                  $fila['id_cliente'] . "||" .
                  $fila['tipo_servicio'];
              ?>
                <tr>
                  <td role="button" data-toggle="modal" data-target="#ModalInfo" onclick="verEvento('<?php echo $datosMostrar; ?>')" class="ModalInfo"> <i class="fas fa-search fa-fw"></i> </td>
                  <td> <?php echo $fila["start"] ?> </td>
                  <td><?php echo $fila["nombre"] . " " . $fila["apellido"] ?></td>
                  <td><?php echo $fila["descripcion"] ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  <?php
  }
  ?>
</div>

<form method="POST" action="../admin/apruebarechazaEvento.php">
  <div class="modal fade text-gray-900" id="ModalInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-white" style="background-color: #68086c;">
          <h5 class="modal-title" id="exampleModalLabel">Información</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="text-white" aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type='hidden' id="id_servicio" name="id_servicio">
          <input type='hidden' id="id_cliente" name="id_cliente">
          <input type='hidden' value="<?php echo $id ?>" name="id_personal">
          <div class="form-group">
            <label> <span class="font-weight-bold">De:</span> </label>
            <label id="verNombre"></label>
          </div>
          <div class="form-group">
            <label> <span class="font-weight-bold">Fecha:</span> </label>
            <input class="form-control font-italic bg-white" id="verFecha" disabled>
          </div>
          <div class="form-group">
            <label> <span class="font-weight-bold">Ubicación:</span> </label>
            <input class="form-control font-italic bg-white" id="verUbicacion" disabled>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <label> <span class="font-weight-bold">Hora inicio:</span> </label>
                <input class="form-control font-italic bg-white" id="verHoraInicial" disabled>
              </div>
              <div class="col-md-6">
                <label> <span class="font-weight-bold">Hora final:</span> </label>
                <input class="form-control font-italic bg-white" id="verHoraFinal" disabled>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <label> <span class="font-weight-bold">Tipo de Evento: </span> </label>
                <input class="form-control font-italic bg-white" id="verTipoEvento" disabled>
              </div>
              <div class="col-md-6">
                <label class="font-weight-bold">Tipo de Servicio: </label>
                <input class="form-control font-italic bg-white" name="verTipoServicio" id="verTipoServicio" readonly>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label> <span class="font-weight-bold">Cantidad de Personas: </span> </label>
              <input class="form-control font-italic bg-white" id="verCantidadPersonas" disabled>
            </div>
          </div>
          <div class="form-group">
            <label> <span class="font-weight-bold">Descripción: </span> </label>
            <textarea class="form-control bg-white font-italic" id="verDescripcion" cols="57" rows=5 readonly></textarea>
          </div>
          <a class="font-weight-bold text-gray-900" type="button" onclick="Motivo()">Redactar Motivo <i class="fas fa-pen fa-sm"></i><span class="small"> (opcional)</span> </a>
          <script>
            function Motivo() {
              document.getElementById('redactarMotivo').style.display = "block";
            }
          </script>
          <div class="form-group mt-2" id="redactarMotivo" style="display: none;">
            <textarea class="form-control text-dark" name="motivo" id="motivo" cols="57" rows=5></textarea>
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" id="Aceptar-submit" class="btn text-white" style="background-color: #0f9bd0;" value='Aceptar' name="submit">Aceptar</button>
          <button type="submit" id="Rechazar-submit" class="btn text-white" style="background-color: #b9181f;" value='Rechazar' name="submit"> Rechazar</button>
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
        <h5 class="modal-title" id="exampleModalLabel">¿Solicitudes de Cobertura?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>
          Esta lista muestra las solicitudes de cobertura enviadas por parte de la comunidad universitaria.<br>---<br>Las solicitudes podrán ser aceptadas o rechazadas.<br>---<br>Al seleccionar la lupa, se mostrará un cuadro de texto donde tendrás la opción de redactar el motivo de la aprovación o rechazo.
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn text-white" data-dismiss="modal" style="background-color: #68086c;">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script>
  document.getElementById("solicitudesCobertura").style.backgroundColor = "#91089669";
  document.getElementById("solicitudesCoberturaTitulo").style.color = "white";
  document.getElementById("solicitudesCoberturaIcon").style.color = "white";
</script>

<?php
require('../views/sections/inferior.php');
?>
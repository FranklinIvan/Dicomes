<?php
require('../views/sections/superior.php');
$servicios = $conex->query("SELECT * FROM tipo_Servicio");

if (isset($_REQUEST['evento'])) {
    $evento = $_REQUEST['evento'];
    $datosServicio = $conex->query("SELECT nombre,apellido,id,
                                                    cantidad_personas,
                                                    start,
                                                    TIME_FORMAT(hora_inicio,'%H:%i') AS hora_inicio,
                                                    TIME_FORMAT(hora_final,'%H:%i') AS hora_final,
                                                    ubicacion,
                                                    tipo_evento,
                                                    descripcion,
                                                    tipo_servicio 
                                                    FROM servicio JOIN cliente
                                                    ON servicio.id_cliente = cliente.id_cliente
                                                    WHERE tipo_servicio = '".$evento."' 
                                                    AND estado='aceptado'
                                                    AND start >= CURDATE()");

}

?>
<!-- HAGO EL LLAMADO AL JS PARA OBTENER LOS DATOS DE CADA CAMPO DEL MODAL -->
<script src="../js/personalJS/obtenerDatos.js"></script>

<!-- Main Content -->
<div class="container text-gray-900">
    <h2>Reportes</h2><br>
    <form action="reportes.php" method="get">
        <select name="evento" class="custom-select" required style="width: 300px;">
            <option value="" selected>Seleccione un tipo de evento</option>
            <?php foreach ($servicios as $fila) { ?>
            <option value="<?php echo $fila['tipo_servicio']?>"> <?php echo $fila['tipo_servicio']?> </option>
            <?php }?>
        </select>
 
        <button class="btn" type="submit" style="background-color: #0f9bd0; color:white;">Buscar</button>
    </form><br>

    <?php if (isset($_REQUEST['evento'])) { ?>
        <h5>Busando eventos : <?php echo $evento ?></h5>
    <!-- Table of Users DB -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="text-gray-900" style="background-color: #e6e6e7;">
              <tr>
                <th>Ver</th>
                <th>Fecha del evento</th>
                <th>Solicitante</th>
                <th>Descripción</th>
              </tr>
            </thead>
            <tbody class="text-gray-900">

              <?php

              while ($datos = $datosServicio->fetch(PDO::FETCH_ASSOC)) {
                $datosMostrar = $datos['id'] . "||" .
                  $datos['nombre'] . " " . $datos['apellido'] . "||" .
                  $datos['start'] . "||" .
                  $datos['ubicacion'] . "||" .
                  $datos['hora_inicio'] . "||" .
                  $datos['hora_final'] . "||" .
                  $datos['tipo_evento'] . "||" .
                  $datos['cantidad_personas'] . "||" .
                  $datos['descripcion'] . "||" .
                  $datos['tipo_servicio'];


                $datosActualizar = $datos['id'] . "||" .
                  $datos['start'] . "||" .
                  $datos['ubicacion'] . "||" .
                  $datos['hora_inicio'] . "||" .
                  $datos['hora_final'] . "||" .
                  $datos['descripcion'];

                $datosEliminar = $datos['id'];
              ?>

                <tr>
                  <td role="button" data-toggle="modal" data-target="#ModalInfo" onclick="verEvento('<?php echo $datosMostrar; ?>')" class="ModalInfo"> <i class="fas fa-search fa-fw ModalInfo"></i> </td>
                  <td><?php echo $datos['start']; ?></td>
                  <td><?php echo $datos['nombre'] . " " . $datos['apellido']; ?></td>
                  <td><?php echo $datos['descripcion']; ?></td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  <?php
  }else{
  ?>
    <div class="">
      <h6 class="mb-5">Selecciona un tipo de evento para comenzar la búsqueda.</h6>
      <img class="img-fluid mx-auto d-block" src="../images/empty.png" alt="Imagen" style="width: 150px; height: 160px;">
    </div>

  <?php }; ?>
  <!-- End Table of Users DB -->
</div>
<!-- End of Main Content -->

<!-- Modal info -->
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
        <input type="hidden" id="id_servicio" name="id_servicio"></input>
        <div class="form-group">
          <label class="font-weight-bold">De: </label>
          <label id="verNombre">
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Fecha: </label>
          <input class="form-control font-italic bg-white" id="verFecha" readonly>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Ubicación: </label>
          <input class="form-control font-italic bg-white" id="verUbicacion" readonly>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-6">
              <label class="font-weight-bold">Hora inicio: </label>
              <input class="form-control font-italic bg-white" id="verHoraInicial" readonly>
            </div>
            <div class="col-md-6">
              <label class="font-weight-bold">Hora final: </label>
              <input class="form-control font-italic bg-white" id="verHoraFinal" readonly>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-6">
              <label class="font-weight-bold">Tipo de Evento: </label>
              <input class="form-control font-italic bg-white" id="verTipoEvento" readonly>
            </div>
            <div class="col-md-6">
              <label class="font-weight-bold">Tipo de Servicio: </label>
              <input class="form-control font-italic bg-white" id="verTipoServicio" readonly>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Cantidad de Personas: </label>
          <input class="form-control font-italic bg-white" id="verCantidadPersonas" readonly>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Descripción: </label>
          <textarea class="form-control bg-white font-italic" id="verDescripcion" cols="57" rows=5 readonly></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal info -->

<script>
  document.getElementById("reportes").style.backgroundColor = "#91089669";
  document.getElementById("reportesTitulo").style.color = "white";
  document.getElementById("reportesIcono").style.color = "white";
</script>

<?php
require('../views/sections/inferior.php');
?>
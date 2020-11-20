<?php
//include("../admin/conexionDB.php");
require("../admin/mostrarEvento.php");
require('../views/sections/superior.php');
?>

<!-- HAGO EL LLAMADO AL JS PARA OBTENER LOS DATOS DE CADA CAMPO DEL MODAL -->
    <script src="../js/personalJS/obtenerDatos.js"></script>


    <?php
        $datosServicio = $conex->query("SELECT id,
                                                cantidad_personas,
                                                start,
                                                TIME_FORMAT(hora_inicio,'%H:%i') AS hora_inicio,
                                                TIME_FORMAT(hora_final,'%H:%i') AS hora_final,
                                                ubicacion,
                                                tipo_evento,
                                                descripcion 
                                                FROM servicio");   
        $datosCliente = $conex->query( "SELECT nombre,apellido FROM cliente");
    ?>

<!-- Main Content -->
<div class="container text-gray-900">

  <h2>Lista de Eventos</h2><br>


  <?php if (isset($_GET['msgEliminado'])) { ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <h5>El evento ha sido Eliminado</h5>
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span>
            </button>
        </div>
    <?php } else if (isset($_GET['msgActualizado'])) { ?>
        <div class="alert alert-success alert-dismissible fade show">
            <span>El evento ha sido actualizado</span>
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span>
            </button>
        </div>
    <?php } ?>


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

               <?php 

                  while($datos=$datosServicio->fetch(PDO::FETCH_ASSOC)) {
                  $clientes = $datosCliente->fetch(PDO::FETCH_ASSOC);

                  
                  $datosMostrar=$datos['id']."||".
                                $clientes['nombre']." ".$clientes['apellido']."||".
                                $datos['start']."||".   
                                $datos['ubicacion']."||".
                                $datos['hora_inicio']."||".
                                $datos['hora_final']."||".
                                $datos['tipo_evento']."||".
                                $datos['cantidad_personas']."||".
                                $datos['descripcion'];


                  $datosActualizar= $datos['id']."||".
                                    $datos['start']."||".   
                                    $datos['ubicacion']."||".
                                    $datos['hora_inicio']."||".
                                    $datos['hora_final']."||".
                                    $datos['descripcion'];
                                    
                  $datosEliminar=$datos['id'];
                  ?>                    

            <tr>
                  <td role="button" data-toggle="modal" data-target="#ModalInfo" onclick="verEvento('<?php echo $datosMostrar; ?>')" class="ModalInfo"> <i class="fas fa-search fa-fw ModalInfo"></i> </td>
                  <td><?php echo $datos['start']; ?></td>
                  <td><?php echo $clientes['nombre']." ".$clientes['apellido']; ?></td>
                  <td><?php echo $datos['descripcion']; ?></td>
              <td>
                <button data-toggle="modal" data-target="#btnActualizar" onclick="obtenerEvento('<?php echo $datosActualizar; ?>')" class="btn text-white" style="background-color: #0f9bd0;">Actualizar</button>
              </td>
              <td class="text-center">
                <button data-toggle="modal" data-target="#btnEliminar" onclick="eliminaEvento('<?php echo $datosEliminar; ?>')" class="btn text-white deletebtn" style="background-color: #b9181f;" ><i class="fas fa-trash-alt fa-fw"></i></button>
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
      <input type="hidden" id="id_servicio" name="id_servicio"></input>
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
      <!--    <label class="form-control font-italic" id="verDescripcion">-->
          <textarea  id="verDescripcion" cols="57" rows=5 disabled></textarea>
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
<form  method="POST" action="../admin/actualizarEvento.php"  > 
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
          <input type="hidden" id="id_servicioA" name="id_servicioA" required>
        <div class="form-group">
          <label class="font-weight-bold">Fecha:</label>
          <input type="date" class="form-control font-italic" id="nuevaFecha" name="nuevaFecha" required>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Ubicación:</label>
          <input type="text" class="form-control font-italic" id="nuevaUbicacion" name="nuevaUbicacion" required>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Hora Inicial:</label>
          <input type="time" class="form-control font-italic" id="nuevaHoraInicial" name="nuevaHoraInicial" required>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Hora Final:</label>
          <input type="time" class="form-control font-italic" id="nuevaHoraFinal" name="nuevaHoraFinal" required>
        </div>
        <div class="form-group">
          <label class="font-weight-bold" >Descripción:</label><br>
          <textarea  id="nuevaDescripcion" cols="57" rows=5 name="nuevaDescripcion"></textarea>
        </div>
        <!-- <div class="form-group">
          <label class="font-weight-bold">Color</label>
          <input type="color" class="form-control font-italic" name="color" placeholder="color..." required>
        </div> -->

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn text-white" style="background-color: #0f9bd0;">Guardar Cambios</button>
        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">cancelar</button>
      </div>
    </div>
  </div>
</div>
</form>
<!-- End Modal btnActualizar -->

<!-- Modal btnEliminar -->
<form  method="POST" action="../admin/eliminarEvento.php" > 
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
        <input type="hidden" name="id_servicioE" id="id_servicioE" required>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn text-white" style="background-color: #b9181f;">Eliminar</button>
        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
</form>
<!-- End Modal btnEliminar -->

    <script type="text/javascript">
    $(document).ready(function(){

        $('#actualizar').click(function(){
          actualizarEvento();
        });

      $('#eliminar').click(function(){
          eliminaEvento();
        });

      });

    </script>

<?php
require('../views/sections/inferior.php');
?>
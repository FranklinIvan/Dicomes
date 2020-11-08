<?php
require('../views/sections/superior.php');
?>

<!-- Main Content -->
<div class="container text-gray-900">

    <h2>Datos Personales</h2><br>

    <!-- Message -->
    <?php if (isset($_GET['actualizacion'])) { ?>
        <div class="alert alert-success alert-dismissible fade show">
            <h5>Tus datos han sido actualizados ¡exitosamente!</h5>
            <small>Los datos actualizados se verán refrejados cuando vuelvas a iniciar sesión.</small>
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span>
            </button>
        </div>
    <?php } else if (isset($_GET['errorActualizacion'])) { ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <span>¡Ups, ha ocurrido un error!</span>

            <button type="button" class="close" data-dismiss="alert"><span>&times;</span>
            </button>
        </div>
    <?php } ?>
    <!-- End Message -->

    <!-- Dates -->
    <div class="modal-body">
        <div class="text-center">
            <img class="rounded-circle" src="../images/imagesDB/6.png" alt="Fotografía" style="width: 150px; height: 150px">
        </div>
        <div class="form-group">
            <label> <span class="font-weight-bold">Nombre:</span> Admin </label>
        </div>
        <div class="form-group">
            <label> <span class="font-weight-bold">Apellido:</span> UTP </label>
        </div>
        <div class="form-group">
            <label> <span class="font-weight-bold">Correo:</span> admin@utp.ac.pa </label>
        </div>
        <hr>
    </div>
    
    <!-- Edit Data -->
    <div class="modal-body">
        <a class="font-weight-bold text-gray-900" type="button" onclick="mostrarEditar()">Editar Datos Personales <i class="fas fa-edit fa-sm"></i> </a>
        <script>
            function mostrarEditar() {
                document.getElementById('mostrarEditar').style.display = "block";
            }
        </script>
    </div>
            
    <form action="../admin/actualizarUsuario.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <div id="mostrarEditar" style="display: none;">
                <div class="form-group">
                    <label class="font-weight-bold">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="Admin" required>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Apellido</label>
                    <input type="text" class="form-control" name="apellido" value="UTP" required>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Correo</label>
                    <input type="email" class="form-control" name="correo" value="admin@utp.ac.pa" required>
                </div>

                <!-- <div class="form-group">
                <label class="font-weight-bold">Foto</label><br>
                <input type="file" name="foto">
                </div> -->
                <div class="modal-footer">
                    <button type="submit" name="actualizar" class="btn text-light" style="background-color: #0f9bd0;">Actualizar</button>
                    <button class="btn btn-dark" type="reset">Resetear</button>
                </div>
            </div>
        </div>
    </form>

    <!-- Edit Password -->
    <div class="modal-body">
        <a class="font-weight-bold text-gray-900" type="button" onclick="mostrarContra()">Cambiar contraseña <i class="fas fa-edit fa-sm"></i> </a>
        <script>
            function mostrarContra() {
                document.getElementById('mostrarContrasena').style.display = "block";
            }
        </script>
    </div>

    <form action="#">
        <div class="modal-body">
            <div id="mostrarContrasena" style="display: none;">
                <div class="form-group">
                    <label class="font-weight-bold">Contraseña</label>
                    <input type="password" class="form-control" name="correo" autocomplete="off" placeholder="Actual contraseña">
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Nueva Contraseña</label>
                    <input type="email" class="form-control" name="correo" autocomplete="off" placeholder="Nueva contraseña">
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Confirmar Nueva Contraseña</label>
                    <input type="email" class="form-control" name="correo" autocomplete="off" placeholder="Nueva contraseña">
                </div>
                <div class="modal-footer">
                    <button type="submit" name="actualizar" class="btn text-light" style="background-color: #0f9bd0;">Actualizar</button>
                </div>
            </div>
        </div>
    </form>

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
                    <label class="font-weight-bold">Correo:</label>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Nueva Ubicación:</label><br>
                    <label class=" text-muted">Antigua Ubicación:</label>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Nueva Fecha del Evento</label><br>
                    <label class=" text-muted">Antigua Fecha del Evento:</label>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Nueva Descripción:</label><br>
                    <label class=" text-muted">Antigua Descripción:</label>
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
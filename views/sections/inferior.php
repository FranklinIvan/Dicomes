</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade text-dark" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cerrar Sesión</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">¿Quieres terminar con la sesión actual de su cuenta?</div>

            <div class="modal-footer">
                <a class="btn text-light" style="background-color: #b9181f" href="../admin/procesarLogout.php">Salir</a>
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
            </div>

        </div>
    </div>
</div>

<!-- Message Modal-->
<div class="modal fade text-dark" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mensaje</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <a class="d-flex align-items-center">
                        <div class="mr-3">
                            <img class="img-profile rounded-circle" src="../images/imagesDB/logo_utp.jpg" style="width: 50px; height:50px ;">
                            <div class="status-indicator bg-success"></div>
                        </div>
                        <div class="font-weight-bold">
                            <div class="text-truncate">Activo</div>
                            <div class="small text-gray-500">Enviado hace · 58m</div>
                        </div>
                    </a>
                </div>
                <?php
                if ($tipoUsuario == 1) {
                ?>
                    <div class="form-group">
                        <label class="font-weight-bold">De: </label>
                        <label>DICOMES</label>
                    </div>
                <?php } ?>
                <div class="form-group">
                    <label class="font-weight-bold"> <?php echo $situacion ?> </label>
                    <label id="msjNombre"></label>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Mensaje:</label>
                    <label id="msjMensaje"></label>
                </div>
            </div>

            <div class="modal-footer">
            <form action="../admin/calendar/eventos.php?accion=notificaciones" method="POST">
                <button class="btn text-white"  style="background-color: #68086c;">Leido</button>
                <input type="hidden" name="msjId_notificacion" id="msjId_notificacion">
                <input type="hidden" name="msjId_cliente" id="msjId_cliente">
            </form>
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>

<!-- Send Messages -->
<div class="modal fade text-dark" id="sendMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color: #68086c;">
                <h5 class="modal-title" id="exampleModalLabel">Envíale sugerencia a DICOMES</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span class="text-white" aria-hidden="true">×</span>
                </button>
            </div>
            <form action="../admin/calendar/eventos.php?accion=notificaciones" method="POST">
                <div class="modal-body">
                    <div class="text-center">
                        <img class="rounded-circle" src="../images/imagesDB/logo_utp.jpg" alt="Fotografía" style="width: 140px; height: 140px">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">De: </label>
                        <label><?php echo $nombre . " " . $apellido ?></label>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Para: </label>
                        <label>DICOMES</label>
                        <input type="hidden" name="id_clienteSugerencia" value="<?php echo $id ?>">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Sugerencia: </label>
                        <textarea name="sugerencia" id="sugerencia" class="form-control text-gray-900" cols="57" rows="5"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn text-white" style="background-color: #0f9bd0;">Enviar</button>
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="../js/jquery/jquery.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../js/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../js/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="../js/demo/chart-area-demo.js"></script>
<script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>
<?php
include('footerPanel.html');
?>
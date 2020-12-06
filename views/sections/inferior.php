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
                            <img class="img-profile rounded-circle" src="../images/imagesDB/logo_utp.jpg" alt="" style="width: 50px; height:50px ;">
                            <div class="status-indicator bg-success"></div>
                        </div>
                        <div class="font-weight-bold">
                            <div class="text-truncate">Activo</div>
                            <div class="small text-gray-500">Enviado hace · 58m</div>
                        </div>
                    </a>
                </div>
                <?php 
                    if($tipoUsuario == 1){
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
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cerrar</button>
            </div>

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
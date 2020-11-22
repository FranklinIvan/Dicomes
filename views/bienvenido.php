<?php
require('../views/sections/superior.php');
?>

<link rel='stylesheet' type='text/css' href='fullcalendar.css' />
<script type='text/javascript' src='jquery.js'></script>
<script type='text/javascript' src='fullcalendar.js'></script>

<!-- Main Content -->
<div class="container text-gray-900">

  <h2>Calendario de Eventos</h2>
  <br>

  <!-- Calendar -->

  <!-- Assets FullCalender -->
  <link href='../fullCalendar/lib/main.css' rel='stylesheet' />
  <script src='../fullCalendar/lib/main.js'></script>

  <script src="../js/personalJS/calendarAdmin.js"></script>

  <!-- Calendar -->
  <div id='calendar' style="font-family:Arial, Helvetica, sans-serif"></div>

  <!-- Day Modal -->
  <div class="modal fade" id="dayModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #68086c;">
          <h5 class="modal-title text-white" id="dayModal">Agendar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="text-white" aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="../admin/calendar/eventos.php?accion=agregar" method="post">

          <div class="modal-body">

            <div class="form-group">
              <label> <span class="font-weight-bold">De: </span>Franklin Iván</label>
              <input type="hidden" name="nombre" id="nombre" value="Fraklooon loco">
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Fecha del Evento:</label>
              <input type="date" class="form-control font-italic" name="fecha" id="fecha" readonly>
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Ubicación:</label>
              <input type="text" class="form-control font-italic" name="ubicacion" id="ubicacion" placeholder="ubicación..." required>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label class="font-weight-bold">Hora Inicio:</label>
                  <input type="time" class="form-control font-italic" name="horaInicio" id="horaInicio" placeholder="hora inicial..." required>
                </div>
                <div class="col-md-6">
                  <label class="font-weight-bold">Hora Final:</label>
                  <input type="time" class="form-control font-italic" name="horaFinal" id="horaFinal" placeholder="hora final..." required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label class="font-weight-bold">Tipo de Servicio:</label>
                  <div class="input-group mb-3">
                    <select name="tipoServicio" class="custom-select">
                      <option value="Graduación">Graduación</option>
                      <option value="Congreso">Congreso</option>
                      <option value="seminario">Seminario</option>
                      <option value="Presentación">Presentación</option>
                      <option value="Evento">Evento</option>
                      <option value="Otro">Otro</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <label class="font-weight-bold">Tipo de evento:</label>
                  <div class="input-group mb-3">
                    <select name="tipoEvento" class="custom-select">
                      <option value="Público">Público</option>
                      <option value="Privado">Privado</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Cantidad de personas:</label>
              <input type="number" min="1" class="form-control font-italic" name="cantidadPersonas" id="cantidadPersonas" placeholder="cantidad..." required>
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Título Evento:</label><br>
              <input type="text" class="form-control font-italic" name="titulo" id="titulo" required>
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Descripción:</label><br>
              <textarea name="descripcion" id="descripcion" id="" cols="57" rows=5 required></textarea>
            </div>

          </div>

          <div class="modal-footer">
            <button class="btn text-white" name="btnEnviar" id="btnEnviar" style="background-color: #0f9bd0;">Enviar</button>
            <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cerrar</button>
          </div>

        </form>

      </div>
    </div>
  </div>

  <!-- Events Modal -->
  <div class="modal fade" id="eventsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #68086c;">
          <h5 class="modal-title text-white" id="tituloEvento"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="text-white" aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">

          <div class="form-group">
            <label> <span class="font-weight-bold">De:</span> Franklin Iván</label>
            <input type="hidden" name="nombre" id="nombre" value="Fraklooon loco">
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <label class="font-weight-bold">Fecha del Evento:</label>
                <label class="form-control font-italic" id="fechaEvento">
              </div>
              <div class="col-md-6">
                <label class="font-weight-bold">Estado:</label>
                <label class="form-control font-italic" readonly>Pendiente</label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Ubicación:</label>
            <label class="form-control font-italic" id="ubicacionEvento">
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <label class="font-weight-bold">Hora Inicio:</label>
                <label class="form-control font-italic" id="horaIniEvento">
              </div>
              <div class="col-md-6">
                <label class="font-weight-bold">Hora Final:</label>
                <label class="form-control font-italic" id="horaFinEvento">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <label class="font-weight-bold">Tipo de Servicio:</label>
                <label class="form-control font-italic" id="tipoServEvento">
              </div>
              <div class="col-md-6">
                <label class="font-weight-bold">Tipo de Evento:</label>
                <label class="form-control font-italic" id="tipoEvenEvento">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label> <span class="font-weight-bold">Cantidad de Personas:</span></label>
            <label class="form-control font-italic" id="cantidadPerEvento">
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Título Evento:</label><br>
            <label class="form-control font-italic" id="tituloEventoDes">
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Descripción:</label><br>
            <textarea class="form-control font-italic" readonly id="descripcionEvento" cols="57" rows=5></textarea>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cerrar</button>
        </div>

      </div>
    </div>
  </div>

  <!-- End Calendar -->

</div>

<!-- End of Main Content -->
<script>
  /* document.getElementById("agenda").style.backgroundColor = "#920896"; */
  document.getElementById("agenda").style.fontWeight = "bold"
  document.getElementById("agendaTitulo").style.color = "white";
  document.getElementById("agendaIcon").style.color = "white";
</script>

<?php
require('../views/sections/inferior.php');
?>
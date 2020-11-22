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

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        // Custom
        selectable: true,
        dayMaxEvents: true,
        businessHours: true,
        navLinks: true,
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,dayGridWeek,dayGridDay ayuda'
        },
        customButtons: {
          ayuda: {
            text: "help",
            click: function() {
              $('#QAyuda').modal();
            }
          }
        },
        
        // Mostrar datos al seleccionar evento
        eventClick: function(info) {
          day = (info.event.start.getDate());
          month = (info.event.start.getMonth() + 1);
          year = (info.event.start.getFullYear());

          $('#tituloEvento').html(info.event.title);
          $('#fechaEvento').html(month + "/" + day + "/" + year);
          $('#ubicacionEvento').html(info.event.extendedProps.ubicacion);
          $('#horaIniEvento').html(info.event.extendedProps.hora_inicio);
          $('#horaFinEvento').html(info.event.extendedProps.hora_final);
          $('#tipoServEvento').html(info.event.extendedProps.tipo_servicio);
          $('#tipoEvenEvento').html(info.event.extendedProps.tipo_evento);
          $('#cantidadPerEvento').html(info.event.extendedProps.cantidad_personas);
          $('#tituloEventoDes').html(info.event.title);
          $('#descripcionEvento').html(info.event.extendedProps.descripcion);
          $('#eventsModal').modal();
        },

        // Listar eventos desde la BD
        events: '../admin/calendar/eventos.php',
        //Color para en espera: lightslategray
        //Color para aceptados: mediumseagreen

        initialView: 'dayGridMonth'
        // End of Custom
      });
      calendar.setOption('locale', 'es');
      calendar.render();

    });
  </script>

  <!-- Calendar -->
  <div id='calendar' style="font-family:Arial, Helvetica, sans-serif"></div>

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
  document.getElementById("agenda").style.backgroundColor = "#920896";
  document.getElementById("agendaTitulo").style.color = "white";
  document.getElementById("agendaIcon").style.color = "white";
</script>

<?php
require('../views/sections/inferior.php');
?>
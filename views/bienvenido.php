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
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,dayGridWeek,dayGridDay'
        },

        dateClick: function(info) {
          $('#dayModal').modal();
          console.log(info);
          /* calendar.addEvent({
            title:"Evento x",
            date:info.dateStr
          }); */

          /* alert('Date: ' + info.dateStr);
          alert('Resource ID: ' + info.resource.id); */
        },

        eventClick: function(info) {
          //console.log(info);
          console.log(info.event.title);
          console.log(info.event.start);

          console.log(info.event.end);
          console.log(info.event.backgroundColor);
          console.log(info.event.extendedProps.description);
        },

        events: [{
            title: 'Jornada extensa',
            start: '2020-11-07',
            end: '2020-11-10',
            color: '#eb164b',
            description: 'Descripción del evento 1 mi loco'
          },
          {
            title: 'Repetir evento',
            start: '2020-11-09T16:00:00',
            description: 'Descripción del evento 1 mi loco'
          },
          {
            title: 'Repetir evento',
            start: '2020-11-11T16:00:00',
            description: 'Descripción del evento 2 mi loco'
          },
          {
            title: 'Todo el día loco',
            start: '2020-11-30',
            color: '#16eb3a',
            description: 'Descripción del evento 3 mi loco'
          }
        ],

        initialView: 'dayGridMonth'
        // End of Custom
      });
      calendar.setOption('locale', 'es');
      calendar.render();
    });
  </script>

  <!-- Calendar -->
  <div id='calendar' style="font-family:Arial, Helvetica, sans-serif"></div>

  <!-- Day Modal -->
  <div class="modal fade" id="dayModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Evento</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="form-group">
            <label> <span class="font-weight-bold">De:</span> Fial</label>
          </div>
          <div class="form-group">
            <label> <span class="font-weight-bold">Fecha:</span> 14/10/2025</label>
          </div>
          <div class="form-group">
            <label> <span class="font-weight-bold">Ubicación:</span> cha en mi casa loco</label>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Descripción:</label><br>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- End Day Modal -->

  <!-- End Calendar -->

</div>

<!-- End of Main Content -->


<?php
require('../views/sections/inferior.php');
?>
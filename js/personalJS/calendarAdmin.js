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
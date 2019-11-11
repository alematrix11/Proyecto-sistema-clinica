<?php 
    
    session_start();

?>

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <!--ESTAS NO ENTIENDO QUE UTILIDAD TIENEN XD-->
    <meta name="description" content="Sistema de gestion para Clinica Domingo Guzman Silva, para facilitar la busquedad de profesionales de la salud, organizacion de administrativos de la clinica y atencion de los pacientes">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Alejandro Iorlano, Carlos Gonzalez, Esteban Cantale">
    
    <!--File of Google Fonts-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <!--File of CSS Estilos-->
    <link rel="stylesheet" href="../css/estilos.css">
    
    <title>Solicitar turno</title>
    
    <!--File of Bootstrap CSS-->
    <link rel="stylesheet" href="Fullcalendar/bootstrap.min.css">
    
    <!--File of JQuery JS-->
    <script src="Fullcalendar/jquery.min.js"></script>
    
    <!--File of Moment JS-->
    <script src="Fullcalendar/moment.min.js"></script>
    
    <!--File of Fullcalendar CSS-->
    <link rel="stylesheet" href="Fullcalendar/fullcalendar.min.css">
    
    <!--File of Fullcalendar JS-->
    <script src="Fullcalendar/fullcalendar.min.js"></script>
    
    <!--File of Fullcalendar Idioma JS-->
    <script src="Fullcalendar/js-idioma/es.js"></script>
    
    <!--File of Bootstrap JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
</head>

<body>
    
    <div class="right-align">Usted inicio sesion con el usuario: <?php echo $_SESSION['usuario']; ?></div>
    
    <div class="container">
        
        <h2 class="text-center mt-4 mb-4">Ya puede elegir el dia que quiere solicitar el turno</h2>
        
        <br><br>
        
        <div class="row">
            
            <div class="col"></div>
            <div class="col-7"><div id="CalendarioWeb"></div></div>
            <div class="col"></div>
            
        </div>
        
    </div>
    
    
    
    <script>
        
        $(document).ready(function(){
            
            //Se llama al calendario
            $('#CalendarioWeb').fullCalendar({
            
            //Se le pasan los parametros al calendario
            header:{
                //Hoy, previo, siguiente
                left: 'today, prev,next, Miboton',
                
                //Titulo
                center: 'title',
                
                //Mes, semana, dia basico, agenda semanal, agenda del dia
                right: 'month, basicWeek, basicDay, agendaWeek,agendaDay'
                
            },
                
                //Se agregan los botones de eventos
                customButtons:{
                    Miboton:{
                        
                        //Se le pasa la funcion al boton
                        text: "Boton 1",
                        click: function(){
                            alert("Accion de la boton");    
                        }   
                    }
                },
                  
                //Llamamos a una funcion cuando se presionan los botones del calendario
                dayClick: function(date,jsEvent,view){
                    alert("Usted esta por solicitar un turno para el dia: "+date.format());
                    alert("Usted esta por solicitar un turno para el dia: "+view.name);
                    $(this).css('background-color', 'gray');
                    $("#modalCalendario").modal();
                },
                
                //Se establece los eventos
                eventSources:[{
                    events:[
                        {
                            title: 'Se inicio el sistema de turno por primera vez',
                            descripcion: "El sistema esta listo para empezar a ser usado",
                            start: '2019-11-10',
                            color: "green",
                            textColor: "yellow"
                            
                        },
                        
                        {
                            title: 'Se empezo a usar el sistema de turnos',
                            descripcion: "El sistema ya se encuentra en funcionamiento",
                            start: '2019-11-10',
                            end: '2019-11-11',
                            color: "#FF0F0",
                            textColor: "#FFFFFF"
                        },
                        {
                            title: 'El sistema sigue funcionando correctamente',
                            descripcion: "Actualmente el sistema funciona correctamente",
                            start: '2019-11-12T12:30:00',
                            allDay: false,
                            color: "yellow",
                            textColor: "blue"
                        }  
                    ],
                    
                    //Se establece los colores que son por defecto en el sistema
                    color: "#FF0F0",
                    textColor: "#FFFFFF"
                    
                }],
                
                //Se establece en el modal los datos de los eventos del calendario
                eventClick: function(calEvent,jsEvent,view){
                    
                    //Se pide el titulo y la descirpcion del evento
                    $('#tituloEvento').html(calEvent.title);
                    $('#descripcionEvento').html(calEvent.descripcion);
                    $('#modalCalendario').modal('show');
                
                },
                
            });
            
        });
        
    </script>
    
    
    
    <!-- Modal para el calendario -->
    <div class="modal fade" id="modalCalendario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            
          <div class="modal-header">
            <h5 class="modal-title" id="tituloEvento"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            
            <div class="modal-body">
                <div id="descripcionEvento"></div>
            </div>
                    
          <div class="modal-footer">
            <button type="button" class="btn btn-success">Confirmar</button>
            <button type="button" class="btn btn-primary">Modificar</button>
            <button type="button" class="btn btn-warning">Borrar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          </div>
            
        </div>
      </div>
    </div>
    
    
</body>
    
</html>
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
    
    <!--File of Moment JS-->
    <script src="Fullcalendar/moment.min.js"></script>
    
    
    <!--File of Bootstrap CSS-->
    <link rel="stylesheet" href="Fullcalendar/bootstrap.min.css">
    
    <!--File of JQuery JS-->
    <script src="Fullcalendar/jquery.min.js"></script>
    
    
    
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
                    
                    //Le establecemos la fecha para que sea automatica
                    $('#txtFecha').val(date.format());
                    
                    //Modal para realizar actualizaciones de turnos
                    $("#modalCalendarioUsuario").modal('show');
                    
                },
                
                
                //Se establece los eventos llamando al archivo de la conexion
                events: 'http://localhost/investigacion-aplicada/calendario-usuarios/eventos-conexion.php',
                
                
                //Se establece en el modal los datos de los eventos del calendario
                eventClick: function(calEvent,jsEvent,view){
                    
                    //Se pide el titulo y la descirpcion del evento
                    $('#tituloEvento').html(calEvent.title);
                    $('#descripcionEvento').html(calEvent.descripcion);
                    $('#modalCalendarioUsuario').modal();
                
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
    
    
    <!-- Modal para actualizar informacion del calendario -->
    <div class="modal fade" id="modalCalendarioUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            
          <div class="modal-header">
            <h5 class="modal-title" id="tituloEvento">Complete los siguentes datos para solicitar el turno</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            
            <div class="modal-body">
                <div id="descripcionEvento"></div>
                    
                    <!--Formulario para agengar eventos de turnos a la base de datos 11/11/2019-->
                    <form>
                    
                        <div class="form-group">
                        Fecha:<input type="text" class="form-control" id="txtFecha" name="textFecha"><br><br>
                        </div>

                        <div class="form-group">    
                        Profesional:<input type="text" class="form-control" id="txtTitulo"><br><br>
                        </div>

                        <div class="form-group">    
                        Hora:<input type="text" class="form-control" id="txtHora" name="textFecha" value="06:30"><br><br>
                        </div>

                        <div class="form-group">
                        Motivo: <textarea class="form-control" id="txtMotivo" rows="3"></textarea><br><br>
                        </div>

                        <div class="form-group">
                        Color:<input type="color" class="form-control" value="#FF0000" id="textColor"><br><br>
                        </div>
                     
                    </form>
                    
            </div>
                    
          <div class="modal-footer">
            <button type="button" id="btnAgregarInfo" class="btn btn-success">Agregar</button>
            <button type="button" class="btn btn-primary">Modificar</button>
            <button type="button" class="btn btn-warning">Borrar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          </div>
            
        </div>
      </div>
    </div>
    
    
    <script>
        
        //Se capturan los datos del modal para luego mandarlos a fullCalendar y guardarlos la base de datos
        $('#btnAgregarInfo').click(function(){
            
            var NuevoEvento = {
                
                title: $('#txtTitulo').val(),
                start: $('#txtFecha').val(),
                color: $('#txtColor').val(),
                descripcion: $('#txtMotivo').val(),
                textColor: "#FFFFFF"
            };
            
            //Se estable en el calendario el evente que se quiere agregar
            $('#CalendarioWeb').fullCalendar('renderEvent',NuevoEvento);
            
            $("#modalCalendarioUsuario").modal('toggle');
            
        });
        
    </script>
    
</body>
    
</html>
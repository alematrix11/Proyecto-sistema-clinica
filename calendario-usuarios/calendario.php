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
                    
                    //Se pide el titulo y la el motico del evento
                    $('#tituloEvento').html(calEvent.title);
                    
                    $('#txtMotivo').val(calEvent.descripcion);
                    $('#txtid').val(calEvent.id);
                    $('#txtTitulo').val(calEvent.title);
                    $('#txtColor').val(calEvent.color);
                    $('#txtFecha').val(calEvent.id);
                    
                    $('#modalCalendarioUsuario').modal();
                
                    FechaHora = calEvent.start._i.split(" ");
                    
                    $('#txtFecha').val(FechaHora[0]);
                    $('#txtHora').val(FechaHora[1]);
                    
                },
                
            });
            
        });
        
    </script>
    
    
    <!-- Modal para actualizar informacion del calendario -->
    <div class="modal fade" id="modalCalendarioUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
        
          <div class="modal-header">
            <h4 class="modal-title">Complete los siguentes datos para solicitar el turno</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
              
            
              
          </div>
            
            <br><br>
            <h5 class="ml-4">Su turno es con el profesional: <p id="tituloEvento"></p></h5>
            
            <div class="modal-body">
                    
                    <!--Formulario para agengar eventos de turnos a la base de datos 11/11/2019-->
                    <form>
                        
                        <div class="form-group">
                        Id:<input type="hidden" class="form-control" id="txtId" name="textID"><br><br>
                        </div>
                        
                        <div class="form-group">
                        Fecha:<input type="text" class="form-control" id="txtFecha" name="textFecha"><br><br>
                        </div>

                        <div class="form-group">    
                        Profesional:<input type="text" class="form-control" id="txtTitulo"><br><br>
                        </div>

                        <div class="form-group">    
                        Hora:<input type="text" class="form-control" id="txtHora" name="textHora" value="06:30"><br><br>
                        </div>

                        <div class="form-group">
                        Motivo: <textarea class="form-control" id="txtMotivo" rows="3"></textarea><br><br>
                        </div>

                        <div class="form-group">
                        Color:<input type="color" class="form-control" value="#FF0000" id="txtColor"><br><br>
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
    
    
    <!--Script para los datos de fullCalendar-->
    <script>
        
        var NuevoEvento;
        
        //Se capturan los datos del modal para luego mandarlos a fullCalendar y guardarlos la base de datos
        $('#btnAgregarInfo').click(function(){
            recolectarDatosGUI();
            enviarInformacion('agregar', NuevoEvento);
        });
        
        
        function recolectarDatosGUI(){
            
            //Se recupera informacion del modal en el objeto NuevoEvento, despues se envia a la base de datos
            var NuevoEvento = {
                id: $('#txtID').val(),
                title: $('#txtTitulo').val(),
                start: $('#txtFecha').val() +" "+$('#txtHora').val(),
                color: $('#txtColor').val(),
                descripcion: $('#txtMotivo').val(),
                textColor: "#FFFFFF",
                end: $('#txtFecha').val() +" "+$('#txtHora').val()
            };
        }
        
        
        function enviarInformacion(accion, objEvento){
        
            //Se implementa el uso de AJAX para enviar informacion sin actualizar la pagina
            $.ajax({
                type: 'POST',
                url: 'eventos-conexion.php?accion='+accion,
                data: objEvento,
                success: function(msg){
                    if(msg){
                        
                        //Se estable el metodo refetchEvents para refrescar los eventos del calendario
                        $('#CalendarioWeb').fullCalendar('refetchEvents');
                        
                        //Una vez agregado el evento se cierra el modal
                        $("#modalCalendarioUsuario").modal('toggle');
                        
                    }
                },
                
                //Se establece un mensaje para errores
                error: function(){
                    
                    alert("Hay un error");
                    
                }
                
            });
            
        }
        
        
    </script>
    
</body>
    
</html>
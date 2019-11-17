<?php 

    session_start();

?>

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <meta name="description" content="Sistema de gestion para Clinica Domingo Guzman Silva, para facilitar la busquedad de profesionales de la salud, organizacion de administrativos de la clinica y atencion de los pacientes">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Alejandro Iorlano, Carlos Gonzalez, Esteban Cantale">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="stylesheet" href="../css/estilos.css">
    
    <!--File of Materialize-->
    <script type="text/javascript" src="../js/inicializadores-para-materialize.js"></script>
    
    <title>Solicitando turno - Clinica medica</title>

</head>

<body>

    <!--SECCION DEL MENU, LOGO Y OPCIONES 03/09/19-->

    <!-- Dropdown Structure -->
    <ul id="dropdown1" class="dropdown-content">
      <li><a href="#!">Obras Sociales</a></li>
      <li><a href="#!">Especialistas</a></li>
    </ul>

    <!--Nav que contiene la opciones del menú-->
    <nav class="teal lighten-2" style="min-height: 150px">

    <div class="row">
        <div class="col l12 m12 s12">
            <div class="col l5 m5 s5">
            <a href="index.php" class="brand-logo valign-wrapper"><img class="logo" src="../img/logo.png"></a>
            </div>


            <div class="col l7 m7 s7">
                <div class="nav-wrapper right">
                    <ul class="right hide-on-med-and-down">
                        <li><a class="waves-effect waves-light blue darken-2 btn-large" href="../index.php">Inicio</a></li>
                        <li><a href="#">Quienes Somos</a></li>
                        <li><a href="#">Especialidades</a></li>
                        
                        <!-- Dropdown Trigger -->
                        <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Más Información<i class="material-icons right">arrow_drop_down</i></a></li>
                        
                        <li><a class="waves-effect waves-light blue darken-2 btn-large" href="../cerrar.php">Cerrar sesión</a></li>
                        
                    </ul>

                </div>
            </div>

        </div>
    </div>

    </nav>
    
    <br>
    
    <div class="row">
        <div class="col s12 m12">
            <div class="card blue-grey darken-1 z-depth-4">
                <div class="card-content">
                    
                        <span class="card-title white-text">Confirme fecha y hora &nbsp <img src="iconos/calendar.png"></span>
                    
                        <p class="white-text">Para poder confirmar el turno con el profesional de clinica medica debe seleccionar fecha y hora!</p>
                        <div class="row">
                            
                            <!--Calendario para solicitar turnos 15/11/2019-->
                            <form action="turnos_clinica_medica.php" method="POST">
                                
                                <div class="input-field col l4 s12">
                                    
                                    <?php 
                                    
                                    $_SESSION['usuarioId'];
                                    
                                    ?>
                                    
                                    <input type="hidden" value="$_SESSION['usuarioId']" name="id-usuario">
                                    
                                    <input type="text" class="white-text" value="Profesional clinica medica" name="profesional-turno" placeholder="Seleccione la fecha en que desea solicitar el turno" disabled>
                                    
                                    <input type="text" class="datepicker" name="fecha-turno" placeholder="Seleccione la fecha en que desea solicitar el turno" required>
                                    
                                    <input type="text" class="timepicker" name="hora-turno" placeholder="Seleccione la hora en que desea solicitar el turno" required>
                                    
                                    <br><br>
                                    
                                    <button class="btn" type="submit">Confirmar turno</button>
                                    
                                </div>
                                
                                <div class="col l8 s12 right-align">
                                    
                                    <img src="imagenes/doctor.png" width="194">
                                    
                                    <br>
                                    
                                    <a class="btn" href="../usuarios_validos.php">Cambiar especialidad</a>
                                    
                                </div>
                                
                            </form>
                            
                        </div>
                        
                        <br>
                        
                        <div class="card-action">
                            <a href="../index.php">Regresar a la pagina principal</a>
                        </div>
                    
                </div>
                
            </div>
        </div>
    </div>
    
    
    <!--SECCION DEL FOOTER 06/09/19-->
    <footer class="page-footer teal lighten-2">
        <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Información</h5>
                <p class="grey-text text-lighten-4 valign-wrapper"><i class="material-icons">access_time</i>&nbsp Atencion al publico de lunes a viernes</p>
                <p class="grey-text text-lighten-4 valign-wrapper"><i class="material-icons">location_on</i>&nbsp Provincia de Santa Fe, ciudad de Santa Fe</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Opciones</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Inicio</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Turnos</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Especialidades</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Profesionales</a></li>
                </ul>
              </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
            © 2019 Copyright - Todos los derechos reservados a clinica "Domingo Guzman Silva"
            <a class="grey-text text-lighten-4 right" href="#!">Mas informacion</a>
            </div>
        </div>
    </footer>
    
    <!--Se agrega un script para el calendario de Materialize 15/11/2019-->
    <script>
    
    var FechaActual = new Date();
            console.log(FechaActual.getDate() + "/" + (FechaActual.getMonth() +1) + "/" + FechaActual.getFullYear());
        
    //Se inicializa el modal para selecionar una fecha para que el usuario solicite un turno
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.datepicker');
        var instances = M.Datepicker.init(elems, {
            format: 'dddd dd mmmm yyyy',
            disableWeekends: true,
            minDate: FechaActual,
            i18n: {
                
                months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                weekdays: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Vienes', 'Sabado'],
                weekdaysShort: ['Domingo', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab', 'Dom'],
                weekdaysAbbrev: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
                
                done: 'Confirmar',
                cancel: 'Cancelar',
                clear: 'Borrar',
                previousMonth: '< Ant',
                nextMonth: ' sig >',
                
            }
        });
    });
        
    //Se inicializa el modal para selecionar un horarios para que el usuario solicite el turno
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.timepicker');
        var instances = M.Timepicker.init(elems);
    });
        
    </script> 

    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../js/app.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>

</body>

</html>
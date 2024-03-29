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
    
    <title>Error al solicitar un turno</title>

</head>

<body>
    
    <!--SECCION DEL MENU, LOGO Y OPCIONES 03/09/19-->

    

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
                    
                        <span class="card-title white-text">Ha ocurrido un error al intentar confirmar el turno &nbsp <img src="iconos/remove.png"></span>
                    
                        <p class="white-text">Error, no se logro agregar el turno con exito</p>
                        
                        <br><br>
                    
                    <a href="javascript:history.go(-1);" class="btn right">Volver a intentar</a>
                    
                        <br><br>
                        
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
                  <li><a class="grey-text text-lighten-3" href="../index.php">Inicio</a></li>
                  <li><a class="grey-text text-lighten-3 modal-trigger" href="#solicitar_turno">Turnos</a></li>
                    
                    <!-- Solicitar turno - Iniciar sesion 14/10/2019 -->
                            <div id="solicitar_turno" class="modal">
                                <div class="modal-content">
                                    <h4 class="black-text center">Debes iniciar sesion para poder solicitar turnos</h4>
                                    <p class="black-text">Para iniciar sesion debes ingresar con tu usuario y contraseña</p>

                                    <!--------------------------------------->
                                    <!--------------------------------------->
                                    <!--Formulario de login de los paciente-->
                                    <!--------------------------------------->
                                    <!--------------------------------------->

                                    <form action="../loguear-paciente.php" method="POST">

                                        <input id="loginEmail" type="email" name="usuario_paciente" placeholder="Ingrese su email">
                                        <label for="loginEmail"></label>

                                        <input id="loginContrasena" type="password" name="contrasena_paciente" placeholder="Ingrese su contraseña">
                                        <label for="loginContrasena"></label>

                                        <button class="btn light-blue darken-4" type="submit">Iniciar sesion</button>

                                    </form>

                                    <!---------------------------------------------------->
                                    <!---------------------------------------------------->
                                    <!--Finaliza el formulario de login de los pacientes-->
                                    <!---------------------------------------------------->
                                    <!---------------------------------------------------->

                                </div>
                                <div class="modal-footer">
                                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                                </div>
                            </div>
                    
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
        
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../js/app.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    
    <!--Se inicializa el select-->
    <script type="text/javascript" src="../js/inicializador-select.js"></script>

</body>

</html>
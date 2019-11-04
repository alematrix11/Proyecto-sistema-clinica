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
    <link href="../css/index.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="stylesheet" href="../css/estilos.css">
    
    <!--File of Materialize-->
    <script type="text/javascript" src="../js/inicializadores-para-materialize.js"></script>
    
    <title>Usted ha ingresado al usuario administrador</title>

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
                        <li><a class="waves-effect waves-light blue darken-2 btn btn-large modal-trigger" href="#agregar_turno">Agregar turno</a></li>
                        
                        
                        
                        <li><a href="#">Quienes Somos</a></li>
                        <li><a href="#">Especialidades</a></li>

                    <!-- Dropdown Trigger -->
                    <li><a class="waves-effect waves-light blue darken-2 btn-large" href="cerrar_admin.php">Cerrar sesión</a></li>
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
                <div class="card-content white-text">
                    <span class="card-title">
                        <?php 
                        
                            //Continuamos con la sesion del administrado y mostramos un mensaje con el nombre del usuario admin
                        
                            session_start();
                        
                            echo "Accedio correctamente a la sesion del ".$_SESSION['admin']; 
                        
                            //Tambien agregamos la opcion para que el admin pueda cerrar sesion
                        
                            //echo '<br><br><a href="cerrar_admin.php">Cerrar sesión</a>';-->
                        
                        ?>
                    </span>
                    <p>Usted ha ingresado con un usuario admin, ya puede realizar actualizaciones y modificaciones del personal</p>
                    
                    <br>
                    
                    <button data-target="actualizaciones-de-profesionales" class="waves-effect waves-light btn blue modal-trigger">Actualizar Profesionales</button>

                    <!-- Modal de botones de profesionales -->
                    <div id="actualizaciones-de-profesionales" class="modal">
                        <div class="modal-content">
                            <h4 class="black-text">Administracion de personal</h4>
                            <p class="black-text">En esta sesion puede agregar nuevos profesionales al sistema de la clinica, realizar modificaciones y dar de baja profesionales.</p>
                            
                            <br>
                            
                            
                            <!--Botones para actualizar el personal de la clinica 26/10/19-->
                            
                            <a class="waves-effect waves-light btn blue" href="../profesionales/profesional_leer.php">Ver listado de profesionales</a>
                            <a class="waves-effect waves-light btn light-green accent-4" href="../profesionales/profesional_nuevo.php">Nuevo profesional</a>
                            <a class="waves-effect waves-light btn yellow accent-4" href="../profesionales/profesional_editar.php">Editar profesional</a>
                            <a class="waves-effect waves-light btn red">Eliminar profesional</a>
                        
                        </div>
                        <div class="modal-footer">
                            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                        </div>
                    </div>
                    
                    
                    <!-- Solicitar turno - Iniciar sesion 14/10/2019 -->
                    <!-- El modal de iniciar sesion se debe agregar despues del modal de actualizar profesionales para evitar errores con el mensaje de la sesion del usuario administrador cuando ingresa al sistema 02/11/2019-->
                            <div id="agregar_turno" class="modal">
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
                                        
                                        <button type="submit">Iniciar sesion</button>
                                        
                                    </form>
                                    
                                    <!---------------------------------------------------->
                                    <!---------------------------------------------------->
                                    <!--Finaliza el formulario de login de los pacientes-->
                                    <!---------------------------------------------------->
                                    <!---------------------------------------------------->
                                    
                                </div>
                                <div class="modal-footer">
                                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Iniciar sesion</a>
                                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                                </div>
                            </div>
                    
                    
                    <br>
                    
                </div>
                <div class="card-action">
                    <a href="../index.php">Regresar a la pagina principal</a>
                </div>
            </div>
        </div>
    </div>

    <!--SECCION DEL BANNER Y SUS IMAGENES 04/09/19-->
    <div class="full-silder">
        
        <div class="carousel carousel-slider" data-indicators="true">
    		<a href="#" class="carousel-item"><img class="responsive-img clinica-img1"></a>
    		<a href="#" class="carousel-item"><img class="responsive-img clinica-img2"></a>
    		<a href="#" class="carousel-item"><img class="responsive-img clinica-img3"></a>
    		<a href="#" class="carousel-item"><img class="responsive-img clinica-img4"></a>
    		<a href="#" class="carousel-item"><img class="responsive-img clinica-img5"></a>
    	</div>
        
        <div class="next"><i class="material-icons large">navigate_next</i></div>
     	<div class="prev"><i class="material-icons large">navigate_before</i></div>
        
    </div>
    
    <!--SECCION DEL FOOTER 06/09/19-->
    <footer class="page-footer teal lighten-2">
        <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Información</h5>
                <p class="grey-text text-lighten-4 valign-wrapper"><i class="material-icons">access_time</i>&nbsp Atencion al publico de lunes a sabados</p>
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
    
    
    <!--Files of JQuery-->
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <!--<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>-->
    <script type="text/javascript" src="../js/app.js"></script>
    <!--File of JS (Se debe cargar ultimo para que se visualize correctamente el carrusel)-->
    <script type="text/javascript" src="../js/materialize.min.js"></script>

</body>

</html>
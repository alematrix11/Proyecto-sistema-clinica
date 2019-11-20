<?php

  include_once 'conexion.php';

  //Se realiza una consulta selecionando los datos de la tabla de las obras sociales

  $consulta_obra_social = "SELECT id, nombre FROM obra_social ORDER BY `id` ASC";
  $consultando_obra_social = $conexion_bdd-> prepare($consulta_obra_social);
  $consultando_obra_social -> execute();
  $datos_obras_sociales = $consultando_obra_social -> fetchALL(PDO::FETCH_ASSOC);

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

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="stylesheet" href="css/estilos.css">

    <!--File of Materialize-->
    <script type="text/javascript" src="js/inicializadores-para-materialize.js"></script>

    <!--File of Scroll-->
    <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll@15/dist/smooth-scroll.polyfills.min.js"></script>

    <!--Setting of Scroll-->
    <script>
        var scroll = new SmoothScroll('a[href*="#quieroRegistrarme"]', {
            speed: 3000,
            speedAsDuration: true,
            offset: 160
        });
        document.addEventListener('DOMContentLoaded', function() {
          var elems = document.querySelectorAll('select');
          var instances = M.FormSelect.init(elems);
        });

    </script>

    <title>Clinica</title>

</head>

<body>

    <!--SECCION DEL MENU, LOGO Y OPCIONES 03/09/19-->

    <!-- Dropdown Structure -->
    <ul id="dropdown1" class="dropdown-content">
      <li><a href="#!">Obras Sociales</a></li>
      <li><a href="#!">Especialistas</a></li>
    </ul>

    <!--Nav que contiene la opciones del menú-->
    <nav class="teal lighten-2" style="min-height: 160px">

    <div class="row">
        <div class="col l12 m12 s12">
            <div class="col l5 m5 s5">
                <div class="brand-logo">
                    <a href="index.php" class="brand-logo valign-wrapper"><img class="logo" src="img/logo.png"></a>
                </div>
            </div>


            <div class="col l7 m7 s7">
                <div class="nav-wrapper right">
                    <ul class="right hide-on-med-and-down">
                        <li><a class="waves-effect waves-light blue darken-2 btn-large" href="#quieroRegistrarme" data-scroll>Quiero registrarme</a></li>
                        <li><a class="waves-effect waves-light blue darken-2 btn btn-large modal-trigger" href="#solicitar_turno">Solicitar turno</a></li>

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

                                    <form action="loguear-paciente.php" method="POST">

                                        <input id="loginEmail" type="email" name="usuario_paciente" placeholder="Ingrese su email">
                                        <label for="loginEmail"></label>

                                        <input id="loginContrasena" type="password" name="contrasena_paciente" placeholder="Ingrese su contraseña">
                                        <label for="loginContrasena"></label>

                                        <button class="btn" type="submit">Iniciar sesion</button>
                                        
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

                        <li><a href="#">Quienes Somos</a></li>
                        <li><a href="#">Especialidades</a></li>

                    <!-- Dropdown Trigger -->
                    <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Más Información<i class="material-icons right">arrow_drop_down</i></a></li>
                    </ul>

                </div>
            </div>



        </div>
    </div>

    </nav>


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


    <section class="blue">

    <br>

    <!--SECCION DE LAS TARGETAS DE ESPECIALIDADES 04/09/19-->
    <div class="container blue darken-1 z-depth-4">

        <h2>Nuestras especialidades</h2>

        <div class="row ">
            <div class="col l4 m4 s4">
                 <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator responsive-img" src="img/img-profesionales/doctor.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Cargiología<i class="material-icons right">more_vert</i></span>
                        <p><a href="#">This is a link</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                        <p>Here is some more information about this product that is only revealed once clicked on.</p>
                    </div>
                </div>
            </div>
            <div class="col l4 m4 s4">
                 <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator responsive-img" src="img/img-profesionales/doctora.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Nutricionista<i class="material-icons right">more_vert</i></span>
                        <p><a href="#">This is a link</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                        <p>Here is some more information about this product that is only revealed once clicked on.</p>
                    </div>
                </div>
            </div>
            <div class="col l4 m4 s4">
                 <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator responsive-img" src="img/img-profesionales/traumatologo.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Traumatólogo<i class="material-icons right">more_vert</i></span>
                        <p><a href="#">This is a link</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                        <p>Here is some more information about this product that is only revealed once clicked on.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>

    <!--SECCION DE LAS TARGETAS DE OTRAS ESPECIALIDADES 05/09/19-->
    <div class="container blue darken-1 z-depth-4">

        <h2>Beneficios de asociarse</h2>

        <div class="row">

            <div class="col l4 m4 s4">

                    <div class="contenedor-carta">
                        <div class="contenedor-especialidad">
                            <div class="lado adelante center-align">
                                <h3>Atencion personalizada</h3>
                            </div>
                            <div class="lado atras"></div>
                        </div>
                    </div>

            </div>

            <div class="col l4 m4 s4">

                    <div class="contenedor-carta">
                        <div class="contenedor-especialidad">
                            <div class="lado adelante center-align">
                                <h3>Descuentos en las citas con todos los profesionales</h3>
                            </div>
                            <div class="lado atras"></div>
                        </div>
                    </div>

            </div>

            <div class="col l4 m4 s4">

                    <div class="contenedor-carta">
                        <div class="contenedor-especialidad">
                            <div class="lado adelante center-align">
                                <h3>Visitas de profesionales a domicilio</h3>
                            </div>
                            <div class="lado atras"></div>
                        </div>
                    </div>

            </div>

        </div>
        <br>
    </div>

    <br>

    </section>


    <!--SECCION DE PARALLAX 06/09/19-->
    <section class="parallax-container">
        <div class="parallax">
            <img src="img/img-parallax/estetoscopio.jpg">
        </div>
    </section>

    <!----------------------------------->
    <!----------------------------------->
    <!--SECCION DEL FORMULARIO 06/09/19-->
    <!----------------------------------->
    <!----------------------------------->
    <section class="blue">
      <div class="container blue darken-1 z-depth-4 registro">
        <br><br>
        <h2>Registro de usuarios</h2>
        <br><br>

          <!--<a href="iniciar.php" class="black-text">Iniciar Sesion</a>-->
          <!--<a href="paciente.php" class="black-text">Contenido protegido</a>-->

        <div class="row white section scrollspy" id="quieroRegistrarme">

            <br><br>

            <form class="col s12" action="agregar_paciente.php" method="POST">
                <div class="row">

                    <div class="input-field col s6">
                      <input id="first_name" type="text" class="validate" name="nombre_paciente" placeholder="Ingrese aquí su nombre" required>
                      <label for="first_name">Nombre</label>
                    </div>

                    <div class="input-field col s6">
                      <input id="first_name" type="text" class="validate" name="apellido_paciente" placeholder="Ingrese aquí su nombre" required>
                      <label for="first_name">Apellido</label>
                    </div>

                </div>

                <div class="row">

                    <div class="input-field col s6">
                        <input id="password" type="password" class="validate" name="nueva_contrasena" placeholder="Ingrese aquí su contraseña" required>
                        <label for="password">Nueva contraseña</label>
                    </div>

                    <div class="input-field col s6">
                        <input id="password" type="password" class="validate" name="confirmacion_contrasena" placeholder="Ingrese aquí nuevamente su contraseña" required>
                        <label for="password">Confirmacion contraseña</label>
                    </div>

                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <input id="email" type="email" class="validate" name="email_paciente" placeholder="Ingrese su email aquí" required>
                        <label for="email">Email</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="dni" type="number" class="validate" maxlength="8" name="dni_paciente" placeholder="Ingrese su DNI aquí" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                        <label for="dni">DNI</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s1">
                      <input type="tel" disabled value="+54" id="disabled">
                      <label for="telefono">Telefono</label>
                    </div>
                    <div class="input-field col s5">
                        <input id="telefono" type="tel" class="validate" name="telefono_paciente" placeholder="Ingrese su telefono aquí" maxlength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                    </div>
                    <div class="input-field col s6">
                        <select name="obrasocial1">
                          <?php foreach ($datos_obras_sociales as $nombre_obra_social){ ?>
                            <option value="<?php echo $nombre_obra_social ["id"] ?>">
                              <?php
                                echo $nombre_obra_social ["nombre"];
                             ?>
                           </option>
                          <?php
                            }
                          ?>
                        </select>
                        <label>Obra Social</label>
                    </div>
                </div>

                <div class="row center">
                    <button class="btn waves-effect waves-light" type="submit" name="registrar">Registrar
                        <i class="material-icons right">send</i>
                    </button>
                </div>

                <br><br>

            </form>

            <br><br>

          </div>

        <br><br>

      </div>

    </section>

    <!----------------------------------------------->
    <!----------------------------------------------->
    <!--FINALIZA LA SECCION DEL FORMULARIO 06/09/19-->
    <!----------------------------------------------->
    <!----------------------------------------------->


    <!--SECCION DE PARALLAX 06/09/19-->
    <section class="parallax-container">
        <div class="parallax">
            <img src="img/img-parallax/clinica.jpg">
        </div>
    </section>

    <!--SECCION DEL FOOTER 06/09/19-->
    <footer class="page-footer teal lighten-2">
        <div class="container">
            <div class="row">

                <div class="col l6 s12">
                    <h5 class="white-text">Información</h5>
                    <p class="grey-text text-lighten-4 valign-wrapper"><i class="material-icons">access_time</i>&nbsp Atencion al publico de lunes a viernes</p>
                    <p class="grey-text text-lighten-4 valign-wrapper"><i class="material-icons">location_on</i>&nbsp Provincia de Santa Fe, ciudad de Santa Fe</p>
                </div>

                <div class="col l3 s12">
                    <h5 class="white-text">Opciones</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="index.php">Inicio</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Turnos</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Especialidades</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Profesionales</a></li>
                    </ul>
                </div>

                <div class="col l3 s12">
                    <h5 class="white-text">Sistema</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="index.php">Actualizaciones</a></li>
                        <li><a class="grey-text text-lighten-3 modal-trigger" href="#loginAdministrador">Administracion</a></li>

                              <!-- Se agrega el login de administrador 20/10/19 -->
                              <div id="loginAdministrador" class="modal">
                                <div class="modal-content">

                                    <h3 class="black-text center-align">Ingrese los datos de administrador</h3>

                                    <br><br>

                                    <form action="administrador/loguear-admin.php" method="POST">

                                    <div class="input-field col l12 s12">
                                        <input type="text" id="adminNombre" name="nombre_administrador" placeholder="Usuario de administrador">
                                        <label for="adminNombre">Administrador</label>
                                    </div>

                                    <div class="input-field col l12 s12">
                                        <input type="text" id="adminInstitucion" name="institucion_administrador" placeholder="Institucion de administrador">
                                        <label for="adminInstitucion">Institucion</label>
                                    </div>

                                    <div class="input-field col l12 s12">
                                        <input type="password" id="adminContrasena" name="contrasena_administrador" placeholder="Contraseña de administrador">
                                        <label for="adminContrasena">Contraseña</label>
                                    </div>

                                    <div class="center-align">

                                        <button class="btn blue waves-effect waves-light" type="submit">Ingresar</button>

                                    </div>

                                    </form>

                                </div>

                                    <div class="modal-footer">
                                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                                    </div>

                              </div>


                        <li><a class="grey-text text-lighten-3" href="#!">Desarrolladores</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Tecnologias</a></li>
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
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <!--File of JS (Se debe cargar ultimo para que se visualize correctamente el carrusel)-->
    <script type="text/javascript" src="js/app.js"></script>
    
</body>

</html>

<?php

    //6_ Se llama al archivo de conexion a la base de datos (si se coloca en el comienzo del index desconfigura el tamaño de las imagenes del banner)
    include_once 'conexion.php';

?>

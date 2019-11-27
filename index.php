<?php

  include_once 'conexion.php';

  //Se realiza una consulta selecionando los datos de la tabla de las obras sociales

  $consulta_obra_social = "SELECT id, nombre FROM obra_social ORDER BY `id` ASC";
  $consultando_obra_social = $conexion_bdd-> prepare($consulta_obra_social);
  $consultando_obra_social -> execute();
  $datos_obras_sociales = $consultando_obra_social -> fetchALL(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <!--ESTAS NO ENTIENDO QUE UTILIDAD TIENEN XD-->
    <meta name="description" content="Sistema de gestion para Clinica Domingo Guzman Silva, para facilitar la busquedad de profesionales de la salud, organizacion de administrativos de la clinica y atencion de los pacientes">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Alejandro Iorlano, Carlos Gonzalez, Esteban Cantale">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="css/index.css" type="text/css" rel="stylesheet" media="screen,projection" />
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
    <title>Clinica Domingo Guzman Silva</title>

</head>

<body id="subir">
    
    <!--SECCION DEL MENU, LOGO Y OPCIONES 03/09/19-->

    <!--Nav que contiene la opciones del menú-->
    <nav class="teal lighten-2" style="min-height: 100px">
        <div class="row">
            <div class="col l12 m12 s12">
                <div class="logo">
                    <a href="index.php"><img src="img/logo.png"></a>
                </div>
                <div class="item_menu">
                    <div class="caja_menu">
                        <ul class="menu">
                            <li><a class="waves-effect waves-light blue darken-2 btn-large" href="nosotros.php" data-scroll>Quienes Somos</a></li>
                            <li><a class="waves-effect waves-light blue darken-2 btn-large" href="especialidades.php" data-scroll>Especialidades</a></li>
                            <li><a class="waves-effect waves-light blue darken-2 btn-large" href="pro.php" data-scroll>Profesionales</a></li>
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

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    
    
    <!--SECCION DEL BANNER Y SUS IMAGENES 04/09/19-->
    <div class="full-silder">
        <div class="carousel carousel-slider" data-indicators="true">
            <a href="#" class="carousel-item"><img class="responsive-img" src="img/img-banner/img1.jpg"></a>
            <a href="#" class="carousel-item"><img class="responsive-img" src="img/img-banner/img2.jpg"></a>
            <a href="#" class="carousel-item"><img class="responsive-img" src="img/img-banner/img3.jpg"></a>
            <a href="#" class="carousel-item"><img class="responsive-img" src="img/img-banner/img4.jpg"></a>
            <a href="#" class="carousel-item"><img class="responsive-img" src="img/img-banner/img5.jpg"></a>
        </div>
        <div class="next"><i class="material-icons large">navigate_next</i></div>
        <div class="prev"><i class="material-icons large">navigate_before</i></div>
    </div>
    
    
    <div class="section center" id="circulo_clinica">
        <div class="preloader-wrapper big active">
            <div class="spinner-layer spinner-blue-only">
              <div class="circle-clipper left">
                <div class="circle"></div>
              </div><div class="gap-patch">
                <div class="circle"></div>
              </div><div class="circle-clipper right">
                <div class="circle"></div>
              </div>
            </div>
        </div>
    </div>
    
    <div class="hide" id="contenido_clinica">
    
    
    <section class="blue, fx">

        <br><br><br><br><br><br><br><br>

        <!--SECCION DE LAS TARGETAS DE ESPECIALIDADES 04/09/19-->
        <div class="container blue darken-1 z-depth4">

            <h2>Nuestras Especialidades</h2>

            <div class="row ">
                <div class="col l4 m4 s4">
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator responsive-img" src="img/img-profesionales/doctor.jpg">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">Odontologia<i class="material-icons right">more_vert</i></span>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4"><b>Prestaciones</b><i class="material-icons right">close</i></span>
                            <ul class="box">
                                <li>Urgencias</li>
                                <li>Endodoncias</li>
                                <li>Odontopediatría</li>
                                <li>Operatoria dental</li>
                                <li>Radiología</li>
                                <li>Cirugía</li>
                                <li><a href="especialidades.php">Ver Mas Especialidades</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col l4 m4 s4">
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator responsive-img" src="img/img-profesionales/doctora.jpg">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">Pediatria<i class="material-icons right">more_vert</i></span>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4"><b>Prestaciones</b><i class="material-icons right">close</i></span>
                            <ul class="box">
                                <li>Cirugía General</li>
                                <li>Emergentología</li>
                                <li>Traumatología</li>
                                <li>Cardiología</li>
                                <li>Hemoterapia</li>
                                <li>Hemodiálisis</li>
                                <li><a href="especialidades.php">Ver Mas Especialidades</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col l4 m4 s4">
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator responsive-img" src="img/img-profesionales/laboratory.jpg">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">Laboratorio<i class="material-icons right">more_vert</i></span>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4"><b>Prestaciones</b><i class="material-icons right">close</i></span>
                            <ul class="box">
                                <li>Aminotransferasa</li>
                                <li>Albúmina</li>
                                <li>Creatinina</li>
                                <li>Fosfatasa alcalina</li>
                                <li>Glucosa</li>
                                <li>Colesterol</li>
                                <li><a href="especialidades.php">Ver Mas Especialidades</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <!--SECCION DE LAS TARGETAS DE OTRAS ESPECIALIDADES 05/09/19-->
        <div class="container blue darken-1 z-depth4">

            <h2>Otras Especialidades</h2>

            <div class="row">

                <div class="col l4 m4 s4">

                    <div class="contenedor-carta">
                        <div class="contenedor-especialidad">
                            <div class="lado adelante center-align">
                                <h5>Internación Adultos y Pediátrica</h5>
                                <p>Maternidad</p>
                                <p>Terapia Intermedia</p>
                                <p>Agudos</p>
                                <p>Terapia Neonatológica</p>
                            </div>
                            <div class="lado atras"><img src="img/img-otras/internacion.jpg" height="250px" width="250px"></div>
                        </div>
                    </div>

                </div>

                <div class="col l4 m4 s4">

                    <div class="contenedor-carta">
                        <div class="contenedor-especialidad">
                            <div class="lado adelante center-align">
                                <h5>Estudios de Diagnóstico</h5>
                                <p>Ecocardiografía</p>
                                <p>Citodiagnóstico</p>
                                <p>Bioimpedancia</p>
                                <p>Electroencefalograma</p>
                            </div>
                            <div class="lado atras"><img src="img/img-otras/diagnostico.jpg" height="250px" width="250px"></div>
                        </div>
                    </div>

                </div>

                <div class="col l4 m4 s4">

                    <div class="contenedor-carta">
                        <div class="contenedor-especialidad">
                            <div class="lado adelante center-align">
                                <h5>Radiología</h5>
                                <p>General Simple y Contrastada</p>
                                <p>Intervencionista</p>
                                <p>Test de Evaluación de la Función Respiratoria</p>
                                <p>Video Endoscopía Digestiva</p>
                            </div>
                            <div class="lado atras"><img src="img/img-otras/radiologia.jpg" height="250px" width="250px"></div>
                        </div>
                    </div>

                </div>

            </div>
            <br>
        </div>

        <br>

        <!--------REGISTRO DE USUARIO------>
        <div class="container blue darken-1 z-depth4 registro">
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
                            <input id="dni" type="number" class="validate" name="dni_paciente" placeholder="Ingrese su DNI aquí">
                            <label for="dni">DNI</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="telefono" type="tel" class="validate" name="telefono_paciente" placeholder="Ingrese su telefono aquí">
                            <label for="telefono">Telefono</label>
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
        <!---------FIN REGISTRO DE USUARIO------>
    </section>
    <!--SECCION DEL FOOTER 06/09/19-->
    <footer class="page-footer teal lighten-2">
        <div class="container">
            <div class="row">

                <div class="col l6 s12">
                    <h5 class="white-text">Información</h5>
                    <p class="grey-text text-lighten-4 valign-wrapper"><i class="material-icons">access_time</i>&nbsp Atencion al publico de lunes a viernes</p>
                    <p class="grey-text text-lighten-4 valign-wrapper"><i class="material-icons">location_on</i>&nbsp Provincia de Santa Fe, ciudad de Santa Fe</p>
                    <p class="grey-text text-lighten-4 valign-wrapper"><i class="material-icons">email</i>&nbsp Correo para consultas: &nbsp<strong>somosclinicadgs@gmail.com</strong></p>
                </div>

                <div class="col l3 s12">
                    <h5 class="white-text">Opciones</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3 modal-trigger" href="#solicitar_turno">Turnos</a></li>
                        <li><a class="grey-text text-lighten-3" href="especialidades.php">Especialidades</a></li>
                        <li><a class="grey-text text-lighten-3" href="pro.php">Profesionales</a></li>
                    </ul>
                </div>

                <div class="col l3 s12">
                    
                    <h5 class="white-text">Sistema</h5>
                    
                    <a class="btn-floating btn-large waves-effect waves-light right pulse modal-trigger" href="#loginAdministrador"><i class="material-icons"><img class="center" src="administrador/iconos/admin.png"></i></a>
                    
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="#!">Actualizaciones</a></li>
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
                                        <button class="btn light-green accent-4 waves-effect waves-light" type="submit">Ingresar</button>
                                    </div>
                                </form>
                                
                            </div>

                            <div class="modal-footer">
                                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                            </div>
                        </div>

                        <li><a class="grey-text text-lighten-3 modal-trigger" href="#tecnologias">Tecnologias</a></li>
                        
                        <div id="tecnologias" class="modal">
                            
                            <img src="img/img-otras/teconologias-desarrollo-web.webp">
                            
                        </div>
                    </ul>
                </div>
                
            </div>
            
            <div class="subir"><a class="waves-effect waves-light blue darken-2 btn-large" href="#subir"><i class="material-icons right">arrow_upward</i>Subir</a></div>
            
            <br>
            
           </div>
        <div class="footer-copyright">
            <div class="container">
                © 2019 Copyright - Todos los derechos reservados a clinica "Domingo Guzman Silva"
                
                
                <!-- Modal Trigger -->
                  <a class="grey-text text-lighten-4 right modal-trigger" href="#modal1">Mas información</a>

                  <!-- Modal Structure -->
                  <div id="modal1" class="modal bottom-sheet">
                    <div class="modal-content black-text">
                        
                        <div class="row">
                            <div class="col l12 m12 s12">
                                <div class="col l6 m6 s6">
                                    <h4>Información sobre la clinica</h4>
                                    <p class="valign-wrapper"><i class="material-icons">place</i>&nbsp Visitanos en la siguiente direccion: 4 de enero 2830, Ciudad de Santa Fe</p>
                                    <p class="valign-wrapper"><i class="material-icons">phone</i>&nbsp Tambien podes llamar a nuestra linea de consultas: 0342 457-2912</p>
                                    
                                    <br><br>
                                    
                                    <h4>Seguinos en nuestras redes sociales</h4>
                                    <a href="#"><img src="img/iconos/facebook.png"></a>
                                    <a href="#"><img src="img/iconos/twitter.png"></a>
                                    <a href="#"><img src="img/iconos/instagram.png"></a>
                                    
                                </div>
                                <div class="col l6 m6 s6">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3396.694812666719!2d-60.71287168416939!3d-31.642205414378573!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95b5a9b0b05cbbd5%3A0x9770b9413258c6e!2sEscuela%20Normal%20Superior%20de%20Comercio%20Domingo%20Guzman%20Silva!5e0!3m2!1ses!2sar!4v1574775818842!5m2!1ses!2sar" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                                </div>
                            </div>
                        </div>
                            
                    </div>
                    <div class="modal-footer">
                      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                    </div>
                  </div>
                
            </div>
        </div>
    </footer>
        
    </div>

    <!--Files of JQuery-->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <!--File of JS (Se debe cargar ultimo para que se visualize correctamente el carrusel)-->
    <script type="text/javascript" src="js/app.js"></script>
    
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    
    <!--Script para el preloader-->
    <script>
    
        window.addEventListener('load', () => {
            
            setTimeout(cargarSitio, 1600);
            
            //cargarSitio();
            
            function cargarSitio(){
                document.getElementById('circulo_clinica').className = 'hide';
                document.getElementById('contenido_clinica').className = 'center';
            }
        })
    
    </script>

</body>

</html>

<?php

//6_ Se llama al archivo de conexion a la base de datos (si se coloca en el comienzo del index desconfigura el tamaño de las imagenes del banner)
include_once 'conexion.php';

?>
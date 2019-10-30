<?php 

    include_once 'mostrar_listado.php';
    
    //Se llama a la conexion a la base de datos
    $object = new Connection();
    $connection = $object ->Connect();
    
    //Se realiza una consultando selecionando los datos de la tabla de los profesionales
    $consulta_profesionales = "SELECT id_profesional, nombre_p, apellido_p, especialidad_p, dni_p, telefono_p, email_p, matricula_p FROM profesionales";
    $consultando_profesionales = $connection-> prepare($consulta_profesionales);
    $consultando_profesionales -> execute();
    $datos_profesionales = $consultando_profesionales -> fetchALL(PDO::FETCH_ASSOC);
    
?>

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    
    <meta name="description" content="Sistema de gestion para Clinica Domingo Guzman Silva, para facilitar la busquedad de profesionales de la salud, organizacion de administrativos de la clinica y atencion de los pacientes">
    
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    
    <meta name="author" content="Alejandro Iorlano, Carlos Gonzalez, Esteban Cantale">
    
    <!--File of Google Fonts-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <!--File of Materialize-->
    <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    
    <!--File of Materialize-->
    <script type="text/javascript" src="../js/inicializadores-para-materialize.js"></script>
    
    <!--File of Estilos CSS-->
    <link rel="stylesheet" href="../css/estilos.css">
    
    <!--File of JQuery-->
    <script src="js/jquery-3.4.1.min.js"></script>
    
    <!--File of Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.css">
    
    <!--File of DataTables CSS-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
        
    <title>Agregar nuevo profesional</title>

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
                        <li><a class="waves-effect waves-light blue darken-2 btn-large" href="#">Solicitar turno</a></li>
                        <li><a href="#">Quienes Somos</a></li>
                        <li><a href="#">Especialidades</a></li>

                    <!-- Dropdown Trigger -->
                    <li><a class="waves-effect waves-light blue darken-2 btn-large" href="../administrador/cerrar_admin.php">Cerrar sesión</a></li>
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
                        
                            /*session_start();
                        
                            echo "Actualizaciones del personal de la clinica con el usuario ".$_SESSION['admin'];*/ 
                        
                            //Tambien agregamos la opcion para que el admin pueda cerrar sesion
                        
                            //echo '<br><br><a href="cerrar_admin.php">Cerrar sesión</a>';-->
                        
                        ?>
                    </span>
                    
                    <p>Usted ha ingresado a la sesion donde se modifican los datos de los profesionales que tiene la clinica</p>
                    
                    <br>
                    
                </div>
                <div class="card-action">
                    <a href="../index.php">Regresar a la pagina principal</a>
                </div>
            </div>
        </div>
    </div>
    
    
    <!--Se agrega tabla para los profesionales de la clinica 28/10/2019-->
    <div class="container">
        <div class="row">
            <div class="col s12 m12">
              <div class="card">
                <div class="card-content white-text light-blue lighten-1">
                  <span class="card-title"><i class="far fa-list-alt"></i>&nbsp Listado de profesionales</span>
                  <p>En la siguiente tabla se encuentran los datos de todos los profesionales</p> 
                </div>
                <div class="card-content white-text light-blue lighten-2">
                    
                    <div class="tablaProfesionales">
                        <nav class="white">
                            <div class="container">
                                <div class="nav-wrapper">
                                        <a href="#" class="brand-logo black-text">Sistema de la clinica "Domingo Guzman Silva"</a>
                                </div>
                             </div>
                        </nav>
                                     <table id="datosProfesionales" class="responsive-table highlight">
                                        <thead>
                                          <tr>
                                              <th class="black-text">Numero</th>
                                              <th class="black-text">Nombre</th>
                                              <th class="black-text">Apellido</th>
                                              <th class="black-text">Especialidad</th>
                                              <th class="black-text">DNI</th>
                                              <th class="black-text">Telefono</th>
                                              <th class="black-text">Email</th>
                                              <th class="black-text">Matricula</th>
                                          </tr>
                                        </thead>

                                        <tbody>
                                        
                                            <?php
                                            
                                                //Se establece un foreach para recorrer todos los datos de los profesionales que hay en la base de datos
                                                foreach($datos_profesionales as $dato_profesional){
                                            
                                            ?>
                                            
                                              <tr>
                                                <td><?php echo $dato_profesional['id_profesional'] ?></td>
                                                <td><?php echo $dato_profesional['nombre_p'] ?></td>
                                                <td><?php echo $dato_profesional['apellido_p'] ?></td>
                                                <td><?php echo $dato_profesional['especialidad_p'] ?></td>
                                                <td><?php echo $dato_profesional['dni_p'] ?></td>
                                                <td><?php echo $dato_profesional['telefono_p'] ?></td>
                                                <td><?php echo $dato_profesional['email_p'] ?></td>
                                                <td><?php echo $dato_profesional['matricula_p'] ?></td>
                                              </tr>
                                              
                                            <?php } ?>
                                                
                                        </tbody>
                                      
                                    </table>
                                    
                               
                                   
                        
                    </div>
                    
                </div>
                <div class="card-action">
                    <a class="btn blue" href="#">Descargar listado</a>
                    <a class="btn blue" href="../administrador/administrador_valido.php">Ir a actualizaciones de profesionales</a>
                    <span class="right">Sistema actualizado 2019</span>
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
    
    
    <!--File of de JS-->
    <script type="text/javascript" src="../js/app.js"></script>
    
    <!--File of JS Materialize (Se debe cargar ultimo para que se visualize correctamente el carrusel)-->
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    
    <!--<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>-->
    
    <!--File of DataTables JS-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js">
    
</body>

</html>
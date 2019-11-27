<?php 

    include_once '../conexion-admin.php';

    $consulta_turnos_cardiologia = "SELECT id_turno, id_profesional, id_paciente, fecha, hora, nombre, apellido FROM cardiologia_turnos INNER JOIN registro_pacientes ON cardiologia_turnos.id_paciente = registro_pacientes.id ORDER BY `id_turno` DESC LIMIT 10";
    $consultando_turnos_cardiologia = $conexion_bdd_admin -> prepare($consulta_turnos_cardiologia);
    $consultando_turnos_cardiologia -> execute();
    $datos_turnos_cardiologia = $consultando_turnos_cardiologia -> fetchALL(PDO::FETCH_ASSOC);

    $consulta_turnos_clinica_medica = "SELECT id_turno, id_profesional, id_paciente, fecha, hora, nombre, apellido FROM clinica_medica_turnos INNER JOIN registro_pacientes ON clinica_medica_turnos.id_paciente = registro_pacientes.id ORDER BY `id_turno` DESC LIMIT 10";
    $consultando_turnos_clinica_medica = $conexion_bdd_admin -> prepare($consulta_turnos_clinica_medica);
    $consultando_turnos_clinica_medica -> execute();
    $datos_turnos_clinica_medica = $consultando_turnos_clinica_medica -> fetchALL(PDO::FETCH_ASSOC);

    $consulta_turnos_nutricion = "SELECT id_turno, id_profesional, id_paciente, fecha, hora, nombre, apellido FROM nutricion_turnos INNER JOIN registro_pacientes ON nutricion_turnos.id_paciente = registro_pacientes.id ORDER BY `id_turno` DESC LIMIT 10";
    $consultando_turnos_nutricion = $conexion_bdd_admin -> prepare($consulta_turnos_nutricion);
    $consultando_turnos_nutricion -> execute();
    $datos_turnos_nutricion = $consultando_turnos_nutricion -> fetchALL(PDO::FETCH_ASSOC);

    $consulta_turnos_traumatologia = "SELECT id_turno, id_profesional, id_paciente, fecha, hora, nombre, apellido FROM traumatologia_turnos INNER JOIN registro_pacientes ON traumatologia_turnos.id_paciente = registro_pacientes.id ORDER BY `id_turno` DESC LIMIT 10";
    $consultando_turnos_traumatologia = $conexion_bdd_admin -> prepare($consulta_turnos_traumatologia);
    $consultando_turnos_traumatologia -> execute();
    $datos_turnos_traumatologia = $consultando_turnos_traumatologia -> fetchALL(PDO::FETCH_ASSOC);

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
    <link rel="stylesheet" href="../../css/estilos.css">
    
    <link href="../../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    
    <!--File of Materialize-->
    <script type="text/javascript" src="../../js/inicializadores-para-materialize.js"></script>
    
    <title>Turnos</title>
    
    <style>
    
        .imgf{
            background-image: url(imagenes/fondo_turnos_del_dia.jpg);
            background-attachment: scroll;
            background-repeat: no-repeat;
            background-size: cover;
            
        }
    
    </style>

</head>

<body class="imgf">
    
    <script type="text/javascript" src="../../js/materialize.min.js"></script>
    
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
            <a href="../../index.php" class="brand-logo valign-wrapper"><img class="logo" src="../../img/logo.png"></a>
            </div>


            <div class="col l7 m7 s7">
                <div class="nav-wrapper right">
                    <ul class="right hide-on-med-and-down">
                        <li><a class="waves-effect waves-light blue darken-2 btn-large" href="../../index.php">Inicio</a></li>
                        <li><a href="../../nosotros.php">Quienes Somos</a></li>
                        <li><a href="../../especialidades.php">Especialidades</a></li>
                        
                        <li><a class="waves-effect waves-light blue darken-2 btn-large" href="../cerrar_admin.php">Cerrar sesión</a></li>
                        
                    </ul>

                </div>
            </div>

        </div>
    </div>

    </nav>
    
    
    <div class="row ">
        <div class="col s12 m12">
            
            <div class="">
                <br>
                <a class="tooltipped" data-position="top" data-tooltip="Elegir otra especialidad" href="../administrador_valido.php"><img src="../iconos/left-arrow.png"></a>
                <br><br>
            </div>
            
            <div class="container">
                <div class="card-content white-text indigo accent-4 z-depth-4">
                    <div class="center-align">
                        <br>
                        <h3 class="card-title">Lista de turnos recientes de los profesionales</h3>
                        <br>
                    </div>
                </div>
                                
                <div class="card-tabs">
                    <ul class="tabs tabs-fixed-width tab-demo z-depth-1 z-depth-2">
                        <li class="tab"><a href="#test1">Turnos Cardiología</a></li>
                        <li class="tab"><a href="#test2">Turnos Clinica Medica</a></li>
                        <li class="tab"><a href="#test3">Turnos Nutrición</a></li>
                        <li class="tab"><a href="#test4">Turnos Traumatología</a></li>
                        
                    </ul>
                </div>
                
                <div class="card-content white-text">
                
                    <!--Turnos de Cardiología-->
                    <div id="test1" class="col s12 indigo accent-4 z-depth-4">
                        <p>Turnos de Cardiología</p>
                        <table>
                            <thead>
                              <tr>
                                  <th>Turno</th>
                                  <th>Profesionales</th>
                                  <th>Fecha</th>
                                  <th>Hora</th>
                                  <th>Paciente</th>
                              </tr>
                            </thead>

                            <tbody>
                                <?php
                                    foreach($datos_turnos_cardiologia as $dato_turno_cardiologia){  
                                ?>
                                    
                                    <tr>
                                        <td><?php echo $dato_turno_cardiologia['id_turno'] ?></td>
                                        <td><?php switch ($dato_turno_cardiologia['id_profesional']) {
                                                    case 1:
                                                        echo "Agustín Javier Picolini";
                                                        break;
                                                    case 2:
                                                        echo "Matias Bosio";
                                                        break;
                                        } ?></td>
                                        <td><?php echo $dato_turno_cardiologia['fecha'] ?></td>
                                        <td><?php echo $dato_turno_cardiologia['hora'] ?></td>
                                        <td><?php echo $dato_turno_cardiologia['nombre'] ?></td>
                                        <td><?php echo $dato_turno_cardiologia['apellido'] ?></td>
                                    </tr>
                                    
                                   
                                <?php 
                                    }
                                ?>
                            </tbody>
                            
                        </table>
                        <br><br>
                    </div>
                    
                    <!--Turnos de de Clinica Medica-->
                    <div id="test2" class="col s12 indigo accent-4 z-depth-4">
                        <p>Turnos de de Clinica Medica</p>
                        <table>
                            <thead>
                              <tr>
                                  <th>Turno</th>
                                  <th>Profesionales</th>
                                  <th>Fecha</th>
                                  <th>Hora</th>
                                  <th>Paciente</th>
                              </tr>
                            </thead>

                            <tbody>
                              <?php
                                    foreach($datos_turnos_clinica_medica as $dato_turno_clinica_medica){  
                                ?>
                                    
                                    <tr>
                                        <td><?php echo $dato_turno_clinica_medica['id_turno'] ?></td>
                                        <td><?php switch ($dato_turno_clinica_medica['id_profesional']) {
                                                    case 6:
                                                        echo "Agustina Yodice";
                                                        break;
                                                    case 7:
                                                        echo "Veronica Zurvarra";
                                                        break;
                                        } ?></td>
                                        <td><?php echo $dato_turno_clinica_medica['fecha'] ?></td>
                                        <td><?php echo $dato_turno_clinica_medica['hora'] ?></td>
                                        <td><?php echo $dato_turno_clinica_medica['nombre'] ?></td>
                                        <td><?php echo $dato_turno_clinica_medica['apellido'] ?></td>
                                    </tr>
                                    
                                   
                                <?php 
                                    }
                                ?>
                            </tbody>
                            
                        </table>
                        <br><br>
                    </div>

                    <!--Turnos de Nutrición-->
                    <div id="test3" class="col s12 indigo accent-4 z-depth-4">
                        <p>Turnos de Nutrición</p>
                        <table>
                            <thead>
                              <tr>
                                  <th>Turno</th>
                                  <th>Profesionales</th>
                                  <th>Fecha</th>
                                  <th>Hora</th>
                                  <th>Paciente</th>
                              </tr>
                            </thead>

                            <tbody>
                              <?php
                                    foreach($datos_turnos_nutricion as $dato_turno_nutricion){  
                                ?>
                                    
                                    <tr>
                                        <td><?php echo $dato_turno_nutricion['id_turno'] ?></td>
                                        <td><?php switch ($dato_turno_nutricion['id_profesional']) {
                                                    case 3:
                                                            echo "Marcelo Blank";
                                                        break;
                                                    case 4:
                                                        echo "Virginia Borga";
                                                        break;
                                        } ?></td>
                                        <td><?php echo $dato_turno_nutricion['fecha'] ?></td>
                                        <td><?php echo $dato_turno_nutricion['hora'] ?></td>
                                        <td><?php echo $dato_turno_nutricion['nombre'] ?></td>
                                        <td><?php echo $dato_turno_nutricion['apellido'] ?></td>
                                    </tr>
                                    
                                   
                                <?php 
                                    }
                                ?>
                            </tbody>
                            
                        </table>
                        <br><br>
                    </div>

                    <!--Turnos de Traumatologia-->
                    <div id="test4" class="col s12 indigo accent-4 z-depth-4">
                        <p>Turnos de Traumatologia</p>
                        <table>
                            <thead>
                              <tr>
                                  <th>Turno</th>
                                  <th>Profesionales</th>
                                  <th>Fecha</th>
                                  <th>Hora</th>
                                  <th>Paciente</th>
                              </tr>
                            </thead>

                            <tbody>
                              <?php
                                    foreach($datos_turnos_traumatologia as $dato_turno_traumatologia){  
                                ?>
                                    
                                    <tr>
                                        <td><?php echo $dato_turno_traumatologia['id_turno'] ?></td>
                                        <td><?php switch ($dato_turno_traumatologia['id_profesional']) {
                                                    case 8:
                                                        echo "Ignacio Dallo";
                                                        break;
                                                    case 9:
                                                        echo "Gabriel Gaggiotti Pierini";
                                                        break;
                                        } ?></td>
                                        <td><?php echo $dato_turno_traumatologia['fecha'] ?></td>
                                        <td><?php echo $dato_turno_traumatologia['hora'] ?></td>
                                        <td><?php echo $dato_turno_traumatologia['nombre'] ?></td>
                                        <td><?php echo $dato_turno_traumatologia['apellido'] ?></td>
                                    </tr>
                                    
                                   
                                <?php 
                                    }
                                ?>
                            </tbody>
                            
                        </table>
                        <br><br>
                    </div>
                    </div>
            </div>
        </div>
    </div>
    
    <br><br><br><br>
    <br><br><br><br>
    <br><br><br><br>
    <br><br><br><br>
    <br><br><br><br>
    <br><br><br><br>
    <br><br><br><br>
    <br><br><br><br>
    
    <div class="container">
        
        <form action="" me>
        </form>
        
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
    
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    
    <script>
        
        //var instance = M.Tabs.init(el);
        
        document.addEventListener('DOMContentLoaded', function() {
             M.AutoInit();
          });
        
    </script>

    <script type="text/javascript" src="../../js/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<!--    <script type="text/javascript" src="../../js/app.js"></script>-->
    

</body>

</html>
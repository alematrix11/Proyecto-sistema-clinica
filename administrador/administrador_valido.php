<?php

    include_once '../profesionales/mostrar_listado.php';

    //Se llama a la conexion a la base de datos
    $object = new Connection();
    $connection = $object ->Connect();
        
        
        //Sentencias para consultar turnos de las especialidades de la clinica
        
        //Se realiza una consulta selecionando los datos de la tabla de los turnos de cardiologia, y se ordenan por fechas mas recientes
        $consulta_turnos_cardiologia = "SELECT id_turno, id_profesional, id_paciente, fecha, hora FROM cardiologia_turnos ORDER BY `fecha` ASC";
        $consultando_turnos_cardiologia = $connection-> prepare($consulta_turnos_cardiologia);
        $consultando_turnos_cardiologia -> execute();
        $datos_turnos_cardiologia = $consultando_turnos_cardiologia -> fetchALL(PDO::FETCH_ASSOC);
        
        //Se realiza una consulta selecionando los datos de la tabla de los turnos de clinica medica, y se ordenan por fechas mas recientes
        $consulta_turnos_clinica_medica = "SELECT id_turno, id_profesional, id_paciente, fecha, hora FROM clinica_medica_turnos ORDER BY `fecha` ASC";
        $consultando_turnos_clinica_medica = $connection-> prepare($consulta_turnos_clinica_medica);
        $consultando_turnos_clinica_medica -> execute();
        $datos_turnos_clinica_medica = $consultando_turnos_clinica_medica -> fetchALL(PDO::FETCH_ASSOC);
        
        //Se realiza una consulta selecionando los datos de la tabla de los turnos de nutricion, y se ordenan por fechas mas recientes
        $consulta_turnos_nutricion = "SELECT id_turno, id_profesional, id_paciente, fecha, hora FROM nutricion_turnos ORDER BY `fecha` ASC";
        $consultando_turnos_nutricion = $connection-> prepare($consulta_turnos_nutricion);
        $consultando_turnos_nutricion -> execute();
        $datos_turnos_nutricion = $consultando_turnos_nutricion -> fetchALL(PDO::FETCH_ASSOC);
        
        //Se realiza una consultan selecionando los datos de la tabla de los turnos de traumatologia, y se ordenan por fechas mas recientes
        $consulta_turnos_traumatologia = "SELECT id_turno, id_profesional, id_paciente, fecha, hora FROM traumatologia_turnos ORDER BY `fecha` ASC";
        $consultando_turnos_traumatologia = $connection-> prepare($consulta_turnos_traumatologia);
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
    <link rel="stylesheet" href="../css/estilos.css">
    <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    
    
    <!--File of Materialize-->
    <script type="text/javascript" src="../js/inicializadores-para-materialize.js"></script>
    
    <title>Usted ha ingresado al usuario administrador</title>
    
    <!-- Script para inicializar el pegable-->
    <script>
        
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.collapsible');
            var instances = M.Collapsible.init(elems);
        });
        
    </script>
    
    
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
            <a href="../index.php" class="brand-logo valign-wrapper"><img class="logo" src="../img/logo.png"></a>
            </div>


            <div class="col l7 m7 s7">
                <div class="nav-wrapper right">
                    <ul class="right hide-on-med-and-down">
                        <li><a class="waves-effect waves-light blue darken-2 btn btn-large modal-trigger" href="">Turnos del día</a></li>
                        
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
                        
                            $adminSesion = 'Administrador';
                        
                            $_SESSION['admin'] = $adminSesion;
                        
                            echo "<h4>Accedio correctamente a la sesion del ".$_SESSION['admin']."</h4>"; 
                            
                            //echo "El id del administrador es: ".$_SESSION['adminId'];
                        
                            //Tambien agregamos la opcion para que el admin pueda cerrar sesion
                        
                            //echo '<br><br><a href="cerrar_admin.php">Cerrar sesión</a>';-->
                        
                        ?>
                    </span>
                        
                    <p>Usted ha ingresado con un usuario admin, ya puede realizar actualizaciones y modificaciones del personal</p>
                    
                    <br>
                    
                    <a class="waves-effect waves-light btn-large blue modal-trigger" href="#actualizaciones-de-profesionales"><i class="material-icons right">sync</i>Actualizar profesionales</a>
                    
                    <br><br><br><br>
                
                        <!--Pegable para administrar los turnos de la clinica 17/11/2019-->
                        <div class="container blue darken-4">
                            <ul class="collapsible">
                                
                                <li>
                                  <div class="collapsible-header black-text"><i class="material-icons">add</i>Cardiología</div>
                                  <div class="collapsible-body">
                                      <span>
                                          
                                        <div class="row">
                                          <div class="col l8 s8">
                                            <button class="btn modal-trigger" data-target="modal1">Ver turnos</button>
                                            <button class="btn modal-trigger" data-target="agregar_turnos_cardiologia">Agregar turnos</button>
                                              
                                            <!--Inicio modal para agregar turnos-->
                                                <div id="agregar_turnos_cardiologia" class="modal">
                                                    <div class="modal-content black-text">
                                                      <h4>Agregar turno con el profesional de Cardiología</h4>
                                                      
                                                        <!--Calendario para solicitar turnos 18/11/2019-->
                                                            <form action="../especialidades/turnos_admin/turnos_admin_cardiologia.php" method="POST">
                                                                
                                                                <div class="input-field col l4 s12">
                                    
                                                                    <?php 

                                                                    $_SESSION['adminId'];

                                                                    ?>

                                                                    <input type="hidden" value="$_SESSION['adminId']" name="id-usuario">

                                                                    <!--<input type="text" class="white-text" value="Profesional nutricion" name="profesional-turno" placeholder="Seleccione la fecha en que desea solicitar el turno" disabled>-->

                                                                    <br>

                                                                    <div class="input-field col s12 m12">
                                                                        <select class="icons" name="profesionalId">
                                                                          <option disabled selected>Seleccione el profesional de Cardilogía</option>
                                                                          <option value="1" data-icon="../especialidades/imagenes/Agustin%20Javier%20Picolini.jpg">Agustin Javier Picolini</option>
                                                                          <option value="2" data-icon="../especialidades/imagenes/Matias%20Bosio.jpg">Matias Bosio</option>
                                                                        </select>
                                                                    </div>

                                                                    <br>

                                                                    <input type="text" class="datepicker" name="fecha-turno" placeholder="Seleccione la fecha en que desea solicitar el turno" required>

                                                                    <!--<input type="text" class="timepicker" name="hora-turno" placeholder="Seleccione la hora en que desea solicitar el turno" required>-->

                                                                    <br><br>

                                                                    <div class="input-field col s12">
                                                                        <select name="hora-turno">
                                                                          <optgroup label="Horarios de mañana">
                                                                            <option value="07:00 AM">07:00 HS</option>
                                                                            <option value="07:30 AM">07:30 HS</option>
                                                                            <option value="08:00 AM">08:00 HS</option>
                                                                            <option value="08:30 AM">08:30 HS</option>
                                                                            <option value="09:00 AM">09:00 HS</option>
                                                                            <option value="09:30 AM">09:30 HS</option>
                                                                            <option value="10:00 AM">10:00 HS</option>
                                                                            <option value="10:30 AM">10:30 HS</option>
                                                                            <option value="11:00 AM">11:00 HS</option>
                                                                            <option value="11:30 AM">11:30 HS</option>
                                                                            <option value="12:00 AM">12:00 HS</option>
                                                                            <option value="12:30 AM">12:30 HS</option>
                                                                          </optgroup>
                                                                          <optgroup label="Horario de tarde">
                                                                            <option value="04:00 PM">04:00 HS</option>
                                                                            <option value="04:30 PM">04:30 HS</option>
                                                                            <option value="05:00 PM">05:00 HS</option>
                                                                            <option value="05:30 PM">05:30 HS</option>
                                                                            <option value="06:00 PM">06:00 HS</option>
                                                                            <option value="06:30 PM">06:30 HS</option>
                                                                            <option value="07:00 PM">07:00 HS</option>
                                                                            <option value="07:30 PM">07:30 HS</option>
                                                                            <option value="08:00 PM">08:00 HS</option>
                                                                            <option value="08:30 PM">08:30 HS</option>
                                                                          </optgroup>
                                                                        </select>
                                                                        <label>Seleccione un horario:</label>
                                                                    </div>

                                                                    <br><br><br><br>

                                                                    <button class="btn" type="submit">Confirmar turno</button>
                                                                    
                                                                    <br><br>

                                                                </div>
                                                                
                                                            </form>
                                                        
                                                    </div>
                                                    <div class="modal-footer">
                                                      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                                                    </div>
                                                </div>
                                            <!--Finaliza modal para agregar turnos-->
                                              
                                            <a class="btn" href="cancelar_turnos/cancelar_turnos_cardiologia.php">Cancelar turno</a>
                                          </div>
                                              
                                          <div class="col l4 s4">
                                            <div class="right-align">
                                                <img src="iconos/cardiogram.png">
                                            </div>
                                          </div>
                                            
                                            <!--Inicio del modal para turnos de cardiologia-->
                                                
                                                <div id="modal1" class="modal">
                                                <div class="modal-content">
                                            
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col s12 m12">
                                                          <div class="card">
                                                            <div class="card-content white-text light-blue lighten-1">
                                                              <span class="card-title"><i class="far fa-list-alt"></i>&nbsp Listado de turnos confirmados</span>
                                                              <p>En la siguiente tabla se encuentran los datos de los turnos con el profesional de cardiología</p>
                                                            </div>
                                                            <div class="card-content white-text light-blue lighten-2">

                                                                <div class="tablaProfesionales">
                                                                    
                                                                                 <table id="datosProfesionales" class="responsive-table highlight">
                                                                                    <thead>
                                                                                      <tr>
                                                                                          <th class="black-text">Turno</th>
                                                                                          <th class="black-text">Profesional</th>
                                                                                          <th class="black-text">Paciente</th>
                                                                                          <th class="black-text">Fecha</th>
                                                                                          <th class="black-text">Hora</th>
                                                                                      </tr>
                                                                                    </thead>

                                                                                    <tbody>

                                                                                        <?php

                                                                                            //Se establece un foreach para recorrer todos los datos de los profesionales que hay en la base de datos
                                                                                            foreach($datos_turnos_cardiologia as $dato_turno_cardiologia){

                                                                                        ?>

                                                                                          <tr>
                                                                                            <td><?php echo $dato_turno_cardiologia['id_turno'] ?></td>
                                                                                            
                                                                                            <td><?php

                                                                                            switch ($dato_turno_cardiologia['id_profesional']) {
                                                                                                case 1:
                                                                                                    echo "Agustín Javier Picolini";
                                                                                                    break;
                                                                                                case 2:
                                                                                                    echo "Matias Bosio";
                                                                                                    break;
                                                                                                default: 
                                                                                                    echo "Profesional Nuevo";
                                                                                                    break;
                                                                                            }
                                                                                            
                                                                                            
                                                                                                
                                                                                             ?></td>
                                                                                            <td><?php echo $dato_turno_cardiologia['id_paciente'] ?></td>
                                                                                            <td><?php echo $dato_turno_cardiologia['fecha'] ?></td>
                                                                                            <td><?php echo $dato_turno_cardiologia['hora'] ?></td>
                                                                                          </tr>

                                                                                        <?php } ?>

                                                                                    </tbody>

                                                                                </table>
                                                                </div>

                                                            </div>
                                                            <div class="card-action">
                                                                <!--<a class="btn blue" href="reportes-profesionales/reportes_profesionales.php">Descargar listado</a>
                                                                <a class="btn blue" href="reportes-profesionales/reportes_profesionales_matriculas.php">Descargar listado matriculas</a>-->
                                                                <a class="btn blue" href="../administrador/administrador_valido.php">Ir a actualizaciones de profesionales</a>
                                                                <span class="right">Sistema actualizado 2019</span>
                                                            </div>
                                                          </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                    
                                                <div class="modal-footer">
                                                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                                                </div>
                                            </div>
                                            
                                            </div>
                                          
                                            <!--Finaliza el modal para turnos de cardiologia-->
                                            
                                        </div>
                                      </span>
                                    </div>
                                </li>
                                
                                <li>
                                  <div class="collapsible-header black-text"><i class="material-icons">add</i>Clinica Medica</div>
                                  <div class="collapsible-body">
                                      <span>
                                          
                                        <div class="row">
                                          <div class="col l8 s8">
                                            <button class="btn modal-trigger" data-target="modal2">Ver turnos</button>
                                            <button class="btn modal-trigger" data-target="agregar_turnos_clinica_medica">Agregar turnos</button>
                                            
                                            <!--Inicio modal para agregar turnos-->
                                                <div id="agregar_turnos_clinica_medica" class="modal">
                                                    <div class="modal-content black-text">
                                                      <h4>Agregar turno con el profesional de Clinica Medica</h4>
                                                      
                                                        <!--Calendario para solicitar turnos 18/11/2019-->
                                                            <form action="../especialidades/turnos_admin/turnos_admin_clinica_medica.php" method="POST">
                                                                
                                                                <div class="input-field col l4 s12">
                                    
                                                                    <?php 

                                                                    $_SESSION['adminId'];

                                                                    ?>

                                                                    <input type="hidden" value="$_SESSION['adminId']" name="id-usuario">

                                                                    <!--<input type="text" class="white-text" value="Profesional nutricion" name="profesional-turno" placeholder="Seleccione la fecha en que desea solicitar el turno" disabled>-->

                                                                    <br>

                                                                    <div class="input-field col s12 m12">
                                                                        <select class="icons" name="profesionalId">
                                                                          <option disabled selected>Seleccione el profesional de Clinica Medica</option>
                                                                          <option value="6" data-icon="../especialidades/imagenes/Agustina%20Yodice.jpg">Agustina Yodice</option>
                                                                          <option value="7" data-icon="../especialidades/imagenes/Veronica%20Zurvarra.jpg">Veronica Zurvarra</option>
                                                                        </select>
                                                                    </div>

                                                                    <br>

                                                                    <input type="text" class="datepicker" name="fecha-turno" placeholder="Seleccione la fecha en que desea solicitar el turno" required>

                                                                    <!--<input type="text" class="timepicker" name="hora-turno" placeholder="Seleccione la hora en que desea solicitar el turno" required>-->

                                                                    <br><br>

                                                                    <div class="input-field col s12">
                                                                        <select name="hora-turno">
                                                                          <optgroup label="Horarios de mañana">
                                                                            <option value="07:00 AM">07:00 HS</option>
                                                                            <option value="07:30 AM">07:30 HS</option>
                                                                            <option value="08:00 AM">08:00 HS</option>
                                                                            <option value="08:30 AM">08:30 HS</option>
                                                                            <option value="09:00 AM">09:00 HS</option>
                                                                            <option value="09:30 AM">09:30 HS</option>
                                                                            <option value="10:00 AM">10:00 HS</option>
                                                                            <option value="10:30 AM">10:30 HS</option>
                                                                            <option value="11:00 AM">11:00 HS</option>
                                                                            <option value="11:30 AM">11:30 HS</option>
                                                                            <option value="12:00 AM">12:00 HS</option>
                                                                            <option value="12:30 AM">12:30 HS</option>
                                                                          </optgroup>
                                                                          <optgroup label="Horario de tarde">
                                                                            <option value="04:00 PM">04:00 HS</option>
                                                                            <option value="04:30 PM">04:30 HS</option>
                                                                            <option value="05:00 PM">05:00 HS</option>
                                                                            <option value="05:30 PM">05:30 HS</option>
                                                                            <option value="06:00 PM">06:00 HS</option>
                                                                            <option value="06:30 PM">06:30 HS</option>
                                                                            <option value="07:00 PM">07:00 HS</option>
                                                                            <option value="07:30 PM">07:30 HS</option>
                                                                            <option value="08:00 PM">08:00 HS</option>
                                                                            <option value="08:30 PM">08:30 HS</option>
                                                                          </optgroup>
                                                                        </select>
                                                                        <label>Seleccione un horario:</label>
                                                                    </div>

                                                                    <br><br><br><br>

                                                                    <button class="btn" type="submit">Confirmar turno</button>
                                                                    
                                                                    <br><br>

                                                                </div>
                                                                
                                                            </form>
                                                        
                                                    </div>
                                                    <div class="modal-footer">
                                                      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                                                    </div>
                                                </div>
                                            <!--Finaliza modal para agregar turnos-->
                                            
                                            <a class="btn" href="cancelar_turnos/cancelar_turnos_clinica_medica.php">Cancelar turno</a>
                                          </div>
                                              
                                          <div class="col l4 s4">
                                            <div class="right-align">
                                                <img src="iconos/hospital.png">
                                            </div>
                                          </div>
                                            
                                            <!--Inicio del modal para turnos de clinica medica-->
                                                
                                                <div id="modal2" class="modal">
                                                <div class="modal-content">
                                            
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col s12 m12">
                                                          <div class="card">
                                                            <div class="card-content white-text light-blue lighten-1">
                                                              <span class="card-title"><i class="far fa-list-alt"></i>&nbsp Listado de turnos confirmados</span>
                                                              <p>En la siguiente tabla se encuentran los datos de los turnos con el profesional de clinica medica</p>
                                                            </div>
                                                            <div class="card-content white-text light-blue lighten-2">

                                                                <div class="tablaProfesionales">
                                                                    
                                                                                 <table id="datosProfesionales" class="responsive-table highlight">
                                                                                    <thead>
                                                                                      <tr>
                                                                                          <th class="black-text">Turno</th>
                                                                                          <th class="black-text">Profesional</th>
                                                                                          <th class="black-text">Paciente</th>
                                                                                          <th class="black-text">Fecha</th>
                                                                                          <th class="black-text">Hora</th>
                                                                                      </tr>
                                                                                    </thead>

                                                                                    <tbody>

                                                                                        <?php

                                                                                            //Se establece un foreach para recorrer todos los datos de los profesionales que hay en la base de datos
                                                                                            foreach($datos_turnos_clinica_medica as $dato_turno_clinica_medica){

                                                                                        ?>

                                                                                          <tr>
                                                                                            <td><?php echo $dato_turno_clinica_medica['id_turno'] ?></td>
                                                                                            
                                                                                            <td><?php

                                                                                            switch ($dato_turno_clinica_medica['id_profesional']) {
                                                                                                case 6:
                                                                                                    echo "Agustina Yodice";
                                                                                                    break;
                                                                                                case 7:
                                                                                                    echo "Veronica
                                                                                                    Zurvarra";
                                                                                                    break;
                                                                                                default:
                                                                                                    echo "Profesional Nuevo";
                                                                                                    break;

                                                                                            }
                                                                                            
                                                                                            
                                                                                                
                                                                                             ?></td>
                                                                                            <td><?php echo $dato_turno_clinica_medica['id_paciente'] ?></td>
                                                                                            <td><?php echo $dato_turno_clinica_medica['fecha'] ?></td>
                                                                                            <td><?php echo $dato_turno_clinica_medica['hora'] ?></td>
                                                                                          </tr>

                                                                                        <?php } ?>

                                                                                    </tbody>

                                                                                </table>
                                                                </div>

                                                            </div>
                                                            <div class="card-action">
                                                                <!--<a class="btn blue" href="reportes-profesionales/reportes_profesionales.php">Descargar listado</a>
                                                                <a class="btn blue" href="reportes-profesionales/reportes_profesionales_matriculas.php">Descargar listado matriculas</a>-->
                                                                <a class="btn blue" href="../administrador/administrador_valido.php">Ir a actualizaciones de profesionales</a>
                                                                <span class="right">Sistema actualizado 2019</span>
                                                            </div>
                                                          </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                    
                                                <div class="modal-footer">
                                                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                                                </div>
                                            </div>
                                            
                                            </div>
                                          
                                            <!--Finaliza el modal para turnos de clinica medica-->
                                            
                                            
                                            
                                            
                                            
                                        </div>
                                          
                                      </span>
                                    </div>
                                </li>
                                <li>
                                  <div class="collapsible-header black-text"><i class="material-icons">add</i>Nutrición</div>
                                  <div class="collapsible-body">
                                      <span>
                                          
                                          <div class="row">
                                          <div class="col l8 s8">
                                            <button class="btn modal-trigger" data-target="modal3">Ver turnos</button>
                                              
                                            <button class="btn modal-trigger" data-target="agregar_turnos_nutricion">Agregar turnos</button>
                                            
                                            <!--Inicio modal para agregar turnos-->
                                                <div id="agregar_turnos_nutricion" class="modal">
                                                    <div class="modal-content black-text">
                                                      <h4>Agregar turno con el profesional de Nutrición</h4>
                                                      
                                                        <!--Calendario para solicitar turnos 18/11/2019-->
                                                            <form action="../especialidades/turnos_admin/turnos_admin_nutricion.php" method="POST">
                                                                
                                                                <div class="input-field col l4 s12">
                                    
                                                                    <?php 

                                                                    $_SESSION['adminId'];

                                                                    ?>

                                                                    <input type="hidden" value="$_SESSION['adminId']" name="id-usuario">

                                                                    <!--<input type="text" class="white-text" value="Profesional nutricion" name="profesional-turno" placeholder="Seleccione la fecha en que desea solicitar el turno" disabled>-->

                                                                    <br>

                                                                    <div class="input-field col s12 m12">
                                                                        <select class="icons" name="profesionalId">
                                                                          <option disabled selected>Seleccione el profesional de Nutrición</option>
                                                                          <option value="3" data-icon="../especialidades/imagenes/Marcelo%20Blank.jpg">Marcelo Blank</option>
                                                                          <option value="4" data-icon="../especialidades/imagenes/Virginia%20Borga.jpg">Virginia Borga</option>
                                                                        </select>
                                                                    </div>

                                                                    <br>

                                                                    <input type="text" class="datepicker" name="fecha-turno" placeholder="Seleccione la fecha en que desea solicitar el turno" required>

                                                                    <!--<input type="text" class="timepicker" name="hora-turno" placeholder="Seleccione la hora en que desea solicitar el turno" required>-->

                                                                    <br><br>

                                                                    <div class="input-field col s12">
                                                                        <select name="hora-turno">
                                                                          <optgroup label="Horarios de mañana">
                                                                            <option value="07:00 AM">07:00 HS</option>
                                                                            <option value="07:30 AM">07:30 HS</option>
                                                                            <option value="08:00 AM">08:00 HS</option>
                                                                            <option value="08:30 AM">08:30 HS</option>
                                                                            <option value="09:00 AM">09:00 HS</option>
                                                                            <option value="09:30 AM">09:30 HS</option>
                                                                            <option value="10:00 AM">10:00 HS</option>
                                                                            <option value="10:30 AM">10:30 HS</option>
                                                                            <option value="11:00 AM">11:00 HS</option>
                                                                            <option value="11:30 AM">11:30 HS</option>
                                                                            <option value="12:00 AM">12:00 HS</option>
                                                                            <option value="12:30 AM">12:30 HS</option>
                                                                          </optgroup>
                                                                          <optgroup label="Horario de tarde">
                                                                            <option value="04:00 PM">04:00 HS</option>
                                                                            <option value="04:30 PM">04:30 HS</option>
                                                                            <option value="05:00 PM">05:00 HS</option>
                                                                            <option value="05:30 PM">05:30 HS</option>
                                                                            <option value="06:00 PM">06:00 HS</option>
                                                                            <option value="06:30 PM">06:30 HS</option>
                                                                            <option value="07:00 PM">07:00 HS</option>
                                                                            <option value="07:30 PM">07:30 HS</option>
                                                                            <option value="08:00 PM">08:00 HS</option>
                                                                            <option value="08:30 PM">08:30 HS</option>
                                                                          </optgroup>
                                                                        </select>
                                                                        <label>Seleccione un horario:</label>
                                                                    </div>

                                                                    <br><br><br><br>

                                                                    <button class="btn" type="submit">Confirmar turno</button>
                                                                    
                                                                    <br><br>

                                                                </div>
                                                                
                                                            </form>
                                                        
                                                    </div>
                                                    <div class="modal-footer">
                                                      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                                                    </div>
                                                </div>  
                                            <!--Finaliza modal para agregar turnos-->
                                              
                                            <a class="btn" href="cancelar_turnos/cancelar_turnos_nutricion.php">Cancelar turno</a>
                                          </div>
                                              
                                          <div class="col l4 s4">
                                            <div class="right-align">
                                                <img src="iconos/plan.png">
                                            </div>
                                          </div>
                                              
                                                <!--Inicio del modal para turnos de nutricion-->
                                                
                                                    <div id="modal3" class="modal">
                                                <div class="modal-content">
                                            
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col s12 m12">
                                                          <div class="card">
                                                            <div class="card-content white-text light-blue lighten-1">
                                                              <span class="card-title"><i class="far fa-list-alt"></i>&nbsp Listado de turnos confirmados</span>
                                                              <p>En la siguiente tabla se encuentran los datos de los turnos con el profesional de cardiología</p>
                                                            </div>
                                                            <div class="card-content white-text light-blue lighten-2">

                                                                <div class="tablaProfesionales">
                                                                    
                                                                                 <table id="datosProfesionales" class="responsive-table highlight">
                                                                                    <thead>
                                                                                      <tr>
                                                                                          <th class="black-text">Turno</th>
                                                                                          <th class="black-text">Profesional</th>
                                                                                          <th class="black-text">Paciente</th>
                                                                                          <th class="black-text">Fecha</th>
                                                                                          <th class="black-text">Hora</th>
                                                                                      </tr>
                                                                                    </thead>

                                                                                    <tbody>

                                                                                        <?php

                                                                                            //Se establece un foreach para recorrer todos los datos de los profesionales que hay en la base de datos
                                                                                            foreach($datos_turnos_nutricion as $dato_turnos_nutricion){

                                                                                        ?>

                                                                                          <tr>
                                                                                            <td><?php echo $dato_turnos_nutricion['id_turno'] ?></td>
                                                                                            
                                                                                            <td><?php

                                                                                            switch ($dato_turnos_nutricion['id_profesional']) {
                                                                                                case 3:
                                                                                                    echo "Marcelo
                                                                                                    Blank";
                                                                                                    break;
                                                                                                case 4:
                                                                                                    echo "Virginia Borga";
                                                                                                    break;
                                                                                                default:
                                                                                                    echo "Profesional Nuevo";
                                                                                                    break;

                                                                                            }
                                                                                            
                                                                                            
                                                                                                
                                                                                            ?></td>
                                                                                            <td><?php echo $dato_turnos_nutricion['id_paciente'] ?></td>
                                                                                            <td><?php echo $dato_turnos_nutricion['fecha'] ?></td>
                                                                                            <td><?php echo $dato_turnos_nutricion['hora'] ?></td>
                                                                                          </tr>

                                                                                        <?php } ?>

                                                                                    </tbody>

                                                                                </table>
                                                                </div>

                                                            </div>
                                                            <div class="card-action">
                                                                <!--<a class="btn blue" href="reportes-profesionales/reportes_profesionales.php">Descargar listado</a>
                                                                <a class="btn blue" href="reportes-profesionales/reportes_profesionales_matriculas.php">Descargar listado matriculas</a>-->
                                                                <a class="btn blue" href="../administrador/administrador_valido.php">Ir a actualizaciones de profesionales</a>
                                                                <span class="right">Sistema actualizado 2019</span>
                                                            </div>
                                                          </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                    
                                                <div class="modal-footer">
                                                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                                                </div>
                                            </div>
                                            
                                            </div>
                                          
                                                <!--Finaliza el modal para turnos de nutricion-->
                                              
                                        </div>
                                      </span>
                                      
                                    </div>
                                </li>
                                <li>
                                  <div class="collapsible-header black-text"><i class="material-icons">add</i>Traumatología</div>
                                  <div class="collapsible-body">
                                      <span>
                                          
                                          <div class="row">
                                          <div class="col l8 s8">
                                            <button class="btn modal-trigger" data-target="modal4">Ver turnos</button>
                                            <button class="btn modal-trigger" data-target="agregar_turnos_traumatologia">Agregar turnos</button>
                                            
                                            <!--Inicio modal para agregar turnos-->
                                                <div id="agregar_turnos_traumatologia" class="modal">
                                                    <div class="modal-content black-text">
                                                      <h4>Agregar turno con el profesional de Traumatología</h4>
                                                      
                                                        <!--Calendario para solicitar turnos 18/11/2019-->
                                                            <form action="../especialidades/turnos_admin/turnos_admin_traumatologia.php" method="POST">
                                                                
                                                                <div class="input-field col l4 s12">
                                    
                                                                    <?php 

                                                                    $_SESSION['adminId'];

                                                                    ?>

                                                                    <input type="hidden" value="$_SESSION['adminId']" name="id-usuario">

                                                                    <!--<input type="text" class="white-text" value="Profesional nutricion" name="profesional-turno" placeholder="Seleccione la fecha en que desea solicitar el turno" disabled>-->

                                                                    <br>

                                                                    <div class="input-field col s12 m12">
                                                                        <select class="icons" name="profesionalId">
                                                                          <option disabled selected>Seleccione el profesional de Cardilogía</option>
                                                                          <option value="8" data-icon="../especialidades/imagenes/Ignacio%20Dallo.jpg">Ignacio Dallo</option>
                                                                          <option value="9" data-icon="../especialidades/imagenes/Gabriel Gaggiotti Pierini.jpg">Matias Bosio</option>
                                                                        </select>
                                                                    </div>

                                                                    <br>

                                                                    <input type="text" class="datepicker" name="fecha-turno" placeholder="Seleccione la fecha en que desea solicitar el turno" required>

                                                                    <!--<input type="text" class="timepicker" name="hora-turno" placeholder="Seleccione la hora en que desea solicitar el turno" required>-->

                                                                    <br><br>

                                                                    <div class="input-field col s12">
                                                                        <select name="hora-turno">
                                                                          <optgroup label="Horarios de mañana">
                                                                            <option value="07:00 AM">07:00 HS</option>
                                                                            <option value="07:30 AM">07:30 HS</option>
                                                                            <option value="08:00 AM">08:00 HS</option>
                                                                            <option value="08:30 AM">08:30 HS</option>
                                                                            <option value="09:00 AM">09:00 HS</option>
                                                                            <option value="09:30 AM">09:30 HS</option>
                                                                            <option value="10:00 AM">10:00 HS</option>
                                                                            <option value="10:30 AM">10:30 HS</option>
                                                                            <option value="11:00 AM">11:00 HS</option>
                                                                            <option value="11:30 AM">11:30 HS</option>
                                                                            <option value="12:00 AM">12:00 HS</option>
                                                                            <option value="12:30 AM">12:30 HS</option>
                                                                          </optgroup>
                                                                          <optgroup label="Horario de tarde">
                                                                            <option value="04:00 PM">04:00 HS</option>
                                                                            <option value="04:30 PM">04:30 HS</option>
                                                                            <option value="05:00 PM">05:00 HS</option>
                                                                            <option value="05:30 PM">05:30 HS</option>
                                                                            <option value="06:00 PM">06:00 HS</option>
                                                                            <option value="06:30 PM">06:30 HS</option>
                                                                            <option value="07:00 PM">07:00 HS</option>
                                                                            <option value="07:30 PM">07:30 HS</option>
                                                                            <option value="08:00 PM">08:00 HS</option>
                                                                            <option value="08:30 PM">08:30 HS</option>
                                                                          </optgroup>
                                                                        </select>
                                                                        <label>Seleccione un horario:</label>
                                                                    </div>

                                                                    <br><br><br><br>

                                                                    <button class="btn" type="submit">Confirmar turno</button>
                                                                    
                                                                    <br><br>

                                                                </div>
                                                                
                                                            </form>
                                                        
                                                    </div>
                                                    <div class="modal-footer">
                                                      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                                                    </div>
                                                </div>
                                            <!--Finaliza modal para agregar turnos-->
                                              
                                            <a class="btn" href="cancelar_turnos/cancelar_turnos_traumatologia.php">Cancelar turno</a>
                                          </div>
                                              
                                          <div class="col l4 s4">
                                            <div class="right-align">
                                                <img src="iconos/radiography.png">
                                            </div>
                                          </div>
                                              
                                                <!--Inicio del modal para turnos de traumatologia-->
                                                
                                                    <div id="modal4" class="modal">
                                                <div class="modal-content">
                                            
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col s12 m12">
                                                          <div class="card">
                                                            <div class="card-content white-text light-blue lighten-1">
                                                              <span class="card-title"><i class="far fa-list-alt"></i>&nbsp Listado de turnos confirmados</span>
                                                              <p>En la siguiente tabla se encuentran los datos de los turnos con el profesional de traumatología</p>
                                                            </div>
                                                            <div class="card-content white-text light-blue lighten-2">

                                                                <div class="tablaProfesionales">
                                                                    
                                                                                 <table id="datosProfesionales" class="responsive-table highlight">
                                                                                    <thead>
                                                                                      <tr>
                                                                                          <th class="black-text">Turno</th>
                                                                                          <th class="black-text">Profesional</th>
                                                                                          <th class="black-text">Paciente</th>
                                                                                          <th class="black-text">Fecha</th>
                                                                                          <th class="black-text">Hora</th>
                                                                                      </tr>
                                                                                    </thead>

                                                                                    <tbody>

                                                                                        <?php

                                                                                            //Se establece un foreach para recorrer todos los datos de los profesionales que hay en la base de datos
                                                                                            foreach($datos_turnos_traumatologia as $dato_turno_traumatologia){

                                                                                        ?>

                                                                                          <tr>
                                                                                            <td><?php echo $dato_turno_traumatologia['id_turno'] ?></td>
                                                                                            
                                                                                            <td><?php

                                                                                            switch ($dato_turno_traumatologia['id_profesional']) {
                                                                                                case 8:
                                                                                                    echo "Ignacio Dallo";
                                                                                                    break;
                                                                                                case 9:
                                                                                                    echo "Gabriel Gaggiotti Pierini";
                                                                                                    break;
                                                                                                default:
                                                                                                    echo "Profesioanal Nuevo";
                                                                                                    break;

                                                                                            }
                                                                                            
                                                                                            
                                                                                                
                                                                                             ?></td>
                                                                                            <td><?php echo $dato_turno_traumatologia['id_paciente'] ?></td>
                                                                                            <td><?php echo $dato_turno_traumatologia['fecha'] ?></td>
                                                                                            <td><?php echo $dato_turno_traumatologia['hora'] ?></td>
                                                                                          </tr>

                                                                                        <?php } ?>

                                                                                    </tbody>

                                                                                </table>
                                                                </div>

                                                            </div>
                                                            <div class="card-action">
                                                                <!--<a class="btn blue" href="reportes-profesionales/reportes_profesionales.php">Descargar listado</a>
                                                                <a class="btn blue" href="reportes-profesionales/reportes_profesionales_matriculas.php">Descargar listado matriculas</a>-->
                                                                <a class="btn blue" href="../administrador/administrador_valido.php">Ir a actualizaciones de profesionales</a>
                                                                <span class="right">Sistema actualizado 2019</span>
                                                            </div>
                                                          </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                    
                                                <div class="modal-footer">
                                                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                                                </div>
                                            </div>
                                            
                                            </div>
                                          
                                                <!--Finaliza el modal para turnos de traumatologia-->
                                              
                                        </div>
                                        
                                      </span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                      
                    
                    <!-- Modal de botones de profesionales -->
                    <div id="actualizaciones-de-profesionales" class="modal">
                        <div class="modal-content center">
                            <h4 class="black-text center">Administracion de personal</h4>
                            <p class="black-text">En esta sesion puede agregar nuevos profesionales al sistema de la clinica, realizar modificaciones y dar de baja profesionales.</p>
                            
                            <br>
                            
                            
                            <!--Botones para actualizar el personal de la clinica 26/10/19-->
                            <a class="waves-effect waves-light btn light-green accent-4" href="../profesionales/profesional_leer.php" href="../profesionales/profesional_nuevo.php"><i class="material-icons right">list</i>Ver listado de profesionales</a>
                            <a class="waves-effect waves-light btn blue" href="../profesionales/profesional_nuevo.php"><i class="material-icons right">add</i>Nuevo profesional</a>
                            <a class="waves-effect waves-light btn yellow accent-4 modal-trigger" href="../profesionales/profesional_editar.php"><i class="material-icons right">edit</i>Editar profesional</a>
                            <a class="waves-effect waves-light btn red" href="../profesionales/profesional_eliminado.php"><i class="material-icons right">clear</i>Eliminar profesional</a>
                            
                           
                        </div>
                        <div class="modal-footer">
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
    
    <!--Se agrega un script para el calendario de Materialize 15/11/2019-->
    <script>
    
    var FechaActual = new Date();
            console.log(FechaActual.getDate() + "/" + (FechaActual.getMonth() +1) + "/" + FechaActual.getFullYear());
        
    //Se inicializa el modal para selecionar una fecha para que el usuario solicite un turno
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.datepicker');
        var instances = M.Datepicker.init(elems, {
            format: 'dd/mm/yyyy',
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
    
    <!--Files of JQuery-->
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <!--<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>-->
    <script type="text/javascript" src="../js/app.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <!--Se inicializa el select-->
    <script type="text/javascript" src="../js/inicializador-select.js"></script>

</body>

</html>
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
    
    <title>Cancelar turnos</title>
    
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


    <!--Nav que contiene la opciones del menú-->
    <nav class="teal lighten-2" style="min-height: 160px">

    <div class="row">
        <div class="col l12 m12 s12">
            <div class="col l5 m5 s5">
            <a href="../../index.php" class="brand-logo valign-wrapper"><img class="logo" src="../../img/logo.png"></a>
            </div>


            <div class="col l7 m7 s7">
                <div class="nav-wrapper right">
                    <ul class="right hide-on-med-and-down">
                        <li><a class="waves-effect waves-light blue darken-2 btn btn-large modal-trigger" href="../administrador_valido.php">Turnos del día</a></li>
                        
                    <!-- Dropdown Trigger -->
                    <li><a class="waves-effect waves-light blue darken-2 btn-large" href="cerrar_admin.php">Cerrar sesión</a></li>
                    </ul>

                </div>
            </div>

        </div>
    </div>

    </nav>
    
    <br>

                                            <!--Inicio tabla para cancelar turnos-->
                                            
                                            <div class="container">
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

                                                        //Incluimos para conexion a la base de datos
                                                        include_once '../../conexion.php';

                                                        //Establecemos una sentencia para seleccionar la tabla de los profesionales
                                                        $seleccionar_turnos = "SELECT * FROM traumatologia_turnos ORDER BY `id_turno` ASC";
                                                        $resultados_turnos = $conexion_bdd->query($seleccionar_turnos);

                                                        //Recorremos todos los datos de la tabla con un while
                                                        while($filas_turnos = $resultados_turnos->fetch(PDO::FETCH_ASSOC)){
                                                        ?>

                                                        <tr>
                                                            <td><?php echo $filas_turnos['id_turno'] ?></td>
                                                            <td><?php
                                                            switch ($filas_turnos['id_profesional']) {
                                                                case 1:
                                                                    echo "Traumatologia";
                                                                    break;
                                                                case 2:
                                                                    echo "Cardiologia";
                                                                    break;
                                                                case 3:
                                                                    echo "Nutricion";
                                                                    break;
                                                                case 4:
                                                                    echo "Clinica Medica";
                                                                    break;

                                                            }
                                                                ?></td>
                                                            <td><?php echo $filas_turnos['id_paciente'] ?></td>
                                                            <td><?php echo $filas_turnos['fecha'] ?></td>
                                                            <td><?php echo $filas_turnos['hora'] ?></td>
                                                            
                                                            <td><?php echo '<a class="waves-effect waves-light red btn btn-eliminar modal-trigger" href="#cancelar_turnos">Cancelar</a>' ?></td>
                                                        </tr>

                                                        <?php } ?>

                                                    <!--Sesion de formulario para eliminar datos-->
                                                    <div id="cancelar_turnos" class="modal">

                                                        <div class="modal-content">

                                                            <div class="row">

                                                            <h4 class="black-text">Cancelar turno</h4>

                                                                <br><br>

                                                                <div class="center-align">
                                                                    <span class="black-text">¿Esta seguro que desea cancelar un turno?</span>
                                                                </div>

                                                                <br><br><br><br>

                                                            <!--Formulario para eliminar datos de los profesionales-->
                                                            <form action="eliminar_turnos_traumatologia.php" method="POST">
                                                                
                                                                <input type="hidden" id="deleteId" name="id_turno">
                                                                
                                                                <input type="hidden" id="cancelar_fecha" name="fecha_turno">
                                                                
                                                                <input type="hidden" id="cancelar_hora" name="hora_turno">
                                                                
                                                                <!--<div class="input-field col l6 m6 s12">
                                                                <input type="number" id="turno" name="turno" class="validate" placeholder="Numero del turno" required>
                                                                <label for="nombreP">Numero del turno:</label>
                                                                </div>-->

                                                                <div class="center">
                                                                <button class="btn" type="submit">Cancelar</button>
                                                                </div>

                                                            </form>

                                                            </div>

                                                        </div>

                                                        <div class="modal-footer">
                                                            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                                                            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                                                        </div>

                                                    </div>

                                                </tbody>

                                            </table>
                                            </div>
                                            
                                            
                                            <!--Finaliza del modal para cancelar turnos-->
    
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
    <script type="text/javascript" src="../../js/jquery.min.js"></script>
    <!--<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>-->
    <script type="text/javascript" src="../../js/app.js"></script>
    <script type="text/javascript" src="../../js/materialize.min.js"></script>
    
     <!--Script de JavaScript para capturar con el boton editar los datos del registro 07/11/2019-->
    <script>

        //Se establece una funcion para cuando se hace click en un boton eliminar
        $('.btn-eliminar').on('click', function(){

            $tr=$(this).closest('tr');

            //Se declara la variable datos, donde se guarda la funcion map, que se encarga de reporrer todos los datos
            var datos = $tr.children("td").map(function(){
                //Con la funcion return obtenemos los textos de cada elemento
                return $(this).text();
            });

            $('#deleteId').val(datos['0']);
            $('#cancelar_fecha').val(datos['3']);
            $('#cancelar_hora').val(datos['4']);

        });
    </script>


</body>

</html>
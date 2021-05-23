
<?php 

/* if(isset($_SESSION['roll_sti'])){
    if($_SESSION['roll_sti'] != "Coordinador De Carrera"){
        if($_SESSION['roll_sti'] == "Docente"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuTutor";</script>';
        }else  if($_SESSION['roll_sti'] == "Coordinador De Area"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuCordArea";</script>';
        }else  if($_SESSION['roll_sti'] == "Tutorado"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuAlumno";</script>';
        }else  if($_SESSION['roll_sti'] == "Admin"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuRoot";</script>';
        }
    }
} */
  
include "./vistas/inc/navCoordinadorC.php" 

?>


    <div class="register-photo">
        <div id="importcsvregis" class="form-container">
            <form id="regisTutcsv" method="post">
                <h2 class="text-center"><strong>Estadísticos</strong></h2>



                <div class="full-box tile-container">

                    <?php 
                        require_once "./controladores/usuarioController.php";
                        $ins_usuario = new usuarioController();
                        $total_usuarios = $ins_usuario->datos_usuario_controlador("Conteo","trabajador",";");
                    ?>
                    <div class="tile">
                        <div class="tile-tittle">Trabajadores</div>
                        <div class="tile-icon">
                            <i class="fas fa-chalkboard-teacher fa-fw"></i>
                            <p><?php echo $total_usuarios->rowCount(); ?> Registrados</p>
                        </div>
                    </div>
                    <?php
                        $total_usuarios = $ins_usuario->datos_usuario_controlador("Conteo","trabajador"," WHERE Roll='Coordinador De Area';");
                    ?>
                    <div  class="tile">
                        <div class="tile-tittle">CoordinadoresA</div>
                        <div class="tile-icon">
                            <i class="fas fa-users-cog fa-fw"></i>
                            <p><?php echo $total_usuarios->rowCount(); ?> Registrados</p>
                        </div>
                    </div>

                    <?php
                        $total_usuarios = $ins_usuario->datos_usuario_controlador("Conteo","trabajador"," WHERE Roll='Coordinador De Carrera';");
                    ?>
                    <div class="tile">
                        <div class="tile-tittle">CoordinadoresC</div>
                        <div class="tile-icon">
                            <i class="fas fa-users fa-fw"></i>
                            <p><?php echo $total_usuarios->rowCount(); ?> Registrados</p>
                        </div>
                    </div>


                    <?php
                        $total_usuarios = $ins_usuario->datos_usuario_controlador("Conteo","trabajador"," WHERE Roll='Docente';");
                    ?>

                    <div class="tile">
                        <div class="tile-tittle">Tutores</div>
                        <div class="tile-icon">
                            <i class="fas fa-chalkboard-teacher fa-fw"></i>
                            <p><?php echo $total_usuarios->rowCount(); ?> Registrados</p>
                        </div>
                    </div>

                    <?php
                        $total_usuarios = $ins_usuario->datos_usuario_controlador("Conteo","tutorado",";");
                    ?>
                    
                    <div class="tile">
                        <div class="tile-tittle">Alumnos</div>
                        <div class="tile-icon">
                            <i class="fas fa-user-graduate fa-fw"></i>
                            <p><?php echo $total_usuarios->rowCount(); ?> Registrados</p>
                        </div>
                    </div>

                    <?php
                        $total_usuarios = $ins_usuario->datos_usuario_controlador("Conteo","actividades",";");
                    ?>                    
                    <div class="tile">
                        <div class="tile-tittle">Actividades</div>
                        <div class="tile-icon">
                            <i class="fas fa-tasks fa-fw"></i>
                            <p><?php echo $total_usuarios->rowCount(); ?> Registradas</p>
                            
                        </div>
                    </div>

                </div>
                <div class="form-group"><label>Seleccione Tipo de Gráfica</label><select class="form-control"><option value="undefined" selected="">Tipo de Grafica</option><option value="12">Barras</option><option value="13">Dispersión</option><option value="14">Pastel</option></select><label>Seleccione Periodo escolar</label>
                    <select
                        class="form-control">
                        <option value="undefined" selected="">Periodo</option>
                        <option value="12">Enero-Junio2020</option>
                        <option value="13">Agosto-Diciembre2020</option>
                        <option value="14">Enero-Junio2019</option>
                        </select><label>Seleccione Carrera</label><select class="form-control"><option value="undefined" selected="">Carrera</option><option value="12">Ingeniería en Sistemas</option><option value="13">Ingenieria Civil</option><option value="14">Ingeniería en Informatica</option><option value="">Ingeniería en Mecatronica</option><option value="">Ingeniería Electrica</option><option value="">Arquitectura</option><option value="">Contaduria</option><option value="">Ingenieria en Gestion Empresarial</option><option value="">Todos</option></select><label>Seleccione el tipo de Sexo</label>
                        <select
                            class="form-control">
                            <option value="12" selected="">Genero</option>
                            <option value="13">Hombres</option>
                            <option value="14">Mujeres</option>
                            <option value="">Ambos</option>
                            </select><label>Seleccione la Situación</label><select class="form-control"><option value="12" selected="">Situación</option><option value="13">Bajas</option><option value="14">Altas</option></select></div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit" >Generar grafica</button></div>
                <div class="form-group"><a href="../Registro.html"><button class="btn btn-primary btn-block" type="submit" >IMPRIMIR</button></a></div>
            </form>

        </div>


        <div id="cont-visdat" class="form-container">
            <form method="post"><img class="border rounded-0 border-primary" id="imgreg" src="./vistas/assets/img/grafica.jpg">
                <div class="form-group" id="div-tipografia"><label>GRAFICA TIPO : PERIODO : SEXO : SITUACION</label></div>
            </form>
        </div>
    </div>
  
   
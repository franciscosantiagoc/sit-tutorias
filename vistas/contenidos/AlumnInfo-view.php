
<?php 

if(isset($_SESSION['roll_sti'])){
    if($_SESSION['roll_sti'] != "Tutorado"){
        if($_SESSION['roll_sti'] == "Docente"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuTutor";</script>';
        }else  if($_SESSION['roll_sti'] == "Coordinador De Carrera"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuCordCa";</script>';
        }else  if($_SESSION['roll_sti'] == "Coordinador De Area"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuCordArea";</script>';
        }else  if($_SESSION['roll_sti'] == "Admin"){
            echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuRoot";</script>';
        }
    }
}

include "./vistas/inc/navStudent.php"; 

?>

    <div class="register-photo">
        <div id="importcsvregis" class="form-container">
            <div class="form-container">
                <form method="post">
                    <h2 class="text-center"><strong>Información</strong></h2><div class="team-boxed">
                        <div class="form-container" id="contain">
                            <div class="col-md-12 search-table-col">
                                <div class="intro">
                                    <h2 class="text-center">Coordinador de Carrera</h2>
                                </div>

                                <?php
                                require_once './controladores/coordinadorescController.php';
                                $ins_actividad = new coordinadorescController();
                                $dat_info = $ins_actividad->consulta_coordinadoresc_controlador();
                                ?>
                                <div class="table-responsive table-bordered table  ">
                                    <table class="table table-bordered table-hover tablas">
                                        <thead class="bg-primary bill-header cs">
                                        <tr class="text-center roboto-medium">
                                            <th>#</th>
                                            <th>MATRICULA</th>
                                            <th>NOMBRE</th>
                                            <th>APELLIDO PATERNO</th>
                                            <th>APELLIDO MATERNO</th>
                                            <th>TELEFONO</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $contador=1;
                                        foreach ($dat_info as $rows){
                                            echo '<tr class="text-center" >
                                <td>'.$contador.'</td>
                                <td>'.$rows['Matricula'].'</td>
                                <td>'.$rows['Nombre'].'</td>
                                <td>'.$rows['APaterno'].'</td>
                                <td>'.$rows['AMaterno'].'</td>
                                <td>'.$rows['NTelefono'].'</td>
                               
                            </tr>';
                                            $contador++;
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
</div></form>
            </div>
            <div id="dat-coord" class="form-container">
                <form method="post">
                    <div class="form-group">
                        <p><strong>Información de Coordinador de Carrera/Tutor</strong></p>
                    </div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Nombre" name="name"></div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Apellido Paterno"></div>
                    <div class="form-group"><input class="form-control" type="text" placeholder="Apellido Materno"></div>
                    <div class="form-group"><select class="form-control"><option value="" selected="">Sexo</option><option value="1">Hombre</option><option value="2">Mujer</option></select></div>
                    <div class="form-group"><input class="form-control" type="tel" placeholder="Número de Telefono"></div>
                    <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
                    <div class="form-group"><select class="form-control"><option value="" selected="">Carrera</option><option value="13">Arquitectura</option><option value="14">Informatica</option><option value="15">Ingenieria Civil</option><option value="16">Ingenieria en Sistemas Computacionales</option></select></div>
                    <div
                        class="form-group"><input class="form-control" type="text" placeholder="Departamento"></div>
            <div class="form-group"><input class="form-control" type="text" placeholder="No. Cubiculo"></div>
            </form>
        </div>
    </div>
    </div>

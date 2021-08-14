
    <?php 
    if(isset($_SESSION['roll_sti'])){
        if($_SESSION['roll_sti'] != "Admin"){
            if($_SESSION['roll_sti'] == "Docente"){
                echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuTutor";</script>';
            }else  if($_SESSION['roll_sti'] == "Coordinador De Area"){
                echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuCordArea";</script>';
            }else  if($_SESSION['roll_sti'] == "Tutorado"){
                echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuAlumno";</script>';
            }else  if($_SESSION['roll_sti'] == "Coordinador De Carrera"){
                echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuCordCa";</script>';
            }
        }
    }
    
    include "./vistas/inc/navRoot.php";
    ?>


    <!-- Actualizar -->
    <div class="modal" id="modalActualizarJefe" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Actualizar jefe de departamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-container">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input class="form-control" type="hidden" placeholder="Matrícula" id="Act_matricula_RJDepto" name="act_matricula_rjdepto">
                            </div>
                            <div class="form-group">
                                <label for="Act_matriculaJDepto">Matrícula</label>
                                <input class="form-control" type="text" placeholder="Matrícula" id="Act_matricula_JDepto" name="act_matricula_jepto" >
                            </div>
                            <div class="form-group">
                                <label for="Act_nombreJDepto">Nombre</label>
                                <input class="form-control" type="text" placeholder="Nombre" id="Act_nombre_JDepto" name="act_nombre_jdepto" >
                            </div>
                            <div class="form-group">
                                <label for="Act_apellidoPJDepto">Apellido Paterno</label>
                                <input class="form-control" type="text" placeholder="Apellido Paterno" id="Act_apellid_PJDepto" name="act_apellidop_jdepto" >
                            </div>
                            <div class="form-group">
                                <label for="Act_apellidoMJDepto">Apellido Materno</label>
                                <input class="form-control" type="text" placeholder="Apellido Materno" id="Act_apellido_MJDepto" name="act_apellidom_jdepto" >
                            </div>
                            <div class="form-group">
                                <label for="Act_sexoJDepto">Sexo</label>
                                <select id="Act_sexo_JDepto" name="act_sexo_jdepto">
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Act_telJDepto">Número de Teléfono</label>
                                <input class="form-control" type="text" placeholder="Número de Teléfono" id="Act_tel_JDepto" name="act_tel_jdepto" >
                            </div>
                            <div class="form-group">
                                <label for="Act_emailJDepto">Email</label>
                                <input class="form-control" type="text" placeholder="Email" id="Act_email_JDepto" name="act_email_jdepto" >
                            </div>
                            <div class="form-group">
                                <label for="Act_areaJDepto">Área</label>
                                <select id="Act_area_JDepto" name="act_area_jdepto">
                                    <?php
                                    require_once './controladores/usuarioController.php';
                                    $ins_usuario = new usuarioController();
                                    $dat_info =$ins_usuario->datos_ta_controlador(" idAreas,Nombre ","areas",";");
                                    $dat_info=$dat_info->fetchAll();
                                    foreach($dat_info as $row){
                                        /*$n=$dat_info->rowCount(); */
                                        $id = $row['idAreas'];
                                        $name = $row['Nombre'];

                                        echo "<option value='$id'>$name</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit" >Actualizar</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if(isset($_POST['act_nombre_jdepto'])){
        require_once "./controladores/tutoresController.php";

        $ins_usuario= new tutoresController();

        echo $ins_usuario->actualizar_jdepto_controlador();
    }
    ?>
    <div class="register-photo">

        <div id="importcsvregis" class="form-container">
            <form id="regisTutcsv" method="post" data-form="default" autocomplete="off">
                <h2 class="text-center"><strong>Jefes de departamento</strong></h2>

                <div class="form-group"><a class="btn btn-primary btn-block" href="<?php echo SERVERURL;?>Registro">REGISTRAR</a></div>
                <div class="team-boxed">
                    <div class="container">
                    </div>
                </div>
            </form>
        </div>
        <div class="form-container" id="contain">
            <div class="col-md-12 search-table-col">

                <?php
                require_once './controladores/jefesdController.php';
                $ins_actividad = new jefesdController();
                $dat_info = $ins_actividad->consulta_jefesd_controlador();
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
                            <th>ACTUALIZAR</th>
                            <th>ELIMINAR</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $contador=1;
                        foreach ($dat_info as $row){
                            $idmatric = $row['Matricula'];
                            $name = $row['Nombre'];
                            $apellp = $row['APaterno'];
                            $apellm = $row['AMaterno'];
                            $sexo = $row['Sexo'];
                            $tel = $row['NTelefono'];
                            $correo = $row['Correo'];
                            echo '<tr>
                                <td>'.$contador.'</td>
                                <td>'.$idmatric.'</td>
                                <td>'.$name.'</td>
                                <td>'.$apellp.'</td>
                                <td>'.$apellm .'</td>
                                <td>'.$tel.'</td>
                                <td>
                                    <center><abbr title="Actualizar"><button class="btnActJefe" onclick="clickActJDepto('.$idmatric.')" data-toggle="modal" data-target="#modalActualizarJefe" ><i class="fas fa-sync-alt" style="font-size: 15px;"></i></button></abbr>
                                </td>
                                <td>
                                    <form class="FormularioAjax" action="'.SERVERURL.'ajax/usuarioAjax.php"  method="POST" data-form="delete" autocomplete="off">
                                    
                                        <button type="submit" class="btn btn-warning">
                                                <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>';
                            $contador++;
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">


        function clickActJDepto(idActJDepto){//1 - ver 2- actualizar
            var datos = new FormData();
            datos.append("idAcJDepto",idActJDepto);
            $imagenPrevisualizacion = document.querySelector("#image-infoTE");
            $imagenPrevisualizacion2 = document.querySelector("#image-infoACTE");
            $.ajax({
                url: "ajax/infoTutoresAjax.php",
                method: "post",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'JSON',
                success: function(respuesta){

                    console.log(respuesta);
                    $("#Act_matricula_RJDepto").val(respuesta[0][0]);
                    $("#Act_matricula_JDepto").val(respuesta[0][0]);
                    $("#Act_nombre_JDepto").val(respuesta[0][1]);
                    $("#Act_apellid_PJDepto").val(respuesta[0][2]);
                    $("#Act_apellido_MJDepto").val(respuesta[0][3]);
                    $("#Act_tel_JDepto").val(respuesta[0][5]);
                    $("#Act_email_JDepto").val(respuesta[0][6]);
                    //$("#areaACTE").val(respuesta[0][8]);
                    $("#Act_area_JDepto option[value='"+respuesta[0][10]+"']").attr("selected", true);

                    let sex = respuesta[0][4];
                    if(sex==='F')
                        $("#Act_sexo_JDepto option[value='F']").attr("selected", true);
                    else $("#Act_sexo_JDepto option[value='M']").attr("selected", true);
                }
            }).fail( function( jqXHR, textStatus, errorThrown ) {
                console.log('error '+textStatus);
            });
        }

    </script>

    
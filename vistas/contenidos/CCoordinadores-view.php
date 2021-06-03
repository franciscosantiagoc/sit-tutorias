
    <?php 

    if(isset($_SESSION['roll_sti'])){
        if($_SESSION['roll_sti'] != "Coordinador De Carrera" && $_SESSION['roll_sti'] != "Coordinador De Area"){
            if($_SESSION['roll_sti'] == "Docente"){
                echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuTutor";</script>';
            }/* else  if($_SESSION['roll_sti'] == "Coordinador De Area"){
                echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuCordArea";</script>';
            } */else  if($_SESSION['roll_sti'] == "Tutorado"){
                echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuAlumno";</script>';
            }else  if($_SESSION['roll_sti'] == "Admin"){
                echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuRoot";</script>';
            }
        }
    }
      
    include "./vistas/inc/navCoordinadorC.php"
    ?>

    <script language="JavaScript" src="<?php echo SERVERURL;?>vistas/assets/js/registrocsv.js">
    </script>



    <div class="register-photo">

        <?php

        if(!isset($_SESSION['busqueda_CoordinadoresCarreraCArea']) && empty($_SESSION['busqueda_CoordinadoresCarreraCArea'])){

        ?>


        <div id="importcsvregis" class="form-container">
            <form id="regisTutcsv" method="post">
                <h2 class="text-center"><strong>Coordinadores de Carrera</strong></h2>
                <div class="form-group"><input class="form-control" type="text" id="nameinput" placeholder="Nombre" name="name"></div>
                <div class="form-group"><input class="form-control" type="text" placeholder="Apellidos"></div>
                <div class="form-group"><input class="form-control" type="text" placeholder="Matrícula"></div>
                <div class="form-group"><select class="form-control"><option value="" selected="">Estado</option><option value="13">Activo</option><option value="14">Inactivo</option></select></div>
                <div class="form-group">           
                    <a class="btn btn-primary btn-block" href="<?php echo SERVERURL;?>Registro">REGISTRAR</a>
                </div>
                <div class="form-group">
                    <div class="team-boxed">
                        <div class="container">
                            <!-- Búsqueda -->
                            <div class="form-container">
                                <div class="form-neon " method="POST" data-form="" autocomplete="off">
                                    <input type="hidden" name="modulo" value="CoordinadorCarreraCArea">
                                    <h2 class="text-center">Búsqueda</h2>
                                    <div class="container-fluid">
                                        <div class="row justify-content-md-center">
                                            <div class="">
                                                <div class="form-group">
                                                    <label for="inputSearch" class="bmd-label-floting">¿Qué usuario estas buscando?</label>
                                                    <input type="text"  placeholder="Matrícula o Nombre" class="form-control" name="busqueda_inicial" id="inputSearch_CCarrera" onkeyup="doSearchCAreaC()"  maxlength="30">
                                                </div>
                                            </div>
                                            <!--<div class="col-12">
                                                <p class="text-center">
                                                    <button class="btn btn-primary btn-block" > BUSCAR </button>
                                                </p>
                                            </div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php }else{ ?>

                                <!-- Eliminar búsqueda -->
                                <div  class="form-container">
                                    <form class="form-neon FormularioAjax" action="<?php echo SERVERURL; ?>ajax/buscadorAjax.php"  method="POST" data-form="search" autocomplete="off">
                                        <input type="hidden" name="modulo" value="CoordinadorCarreraCArea">
                                        <input type="hidden" name="eliminar_busqueda" value="eliminar">
                                        <div class="container-fluid">
                                            <div class="row justify-content-md-center">
                                                <div class="col-12 col-md-6">
                                                    <p class="text-center" style="font-size: 20px;">
                                                        Resultados de la busqueda <strong>"<?php echo $_SESSION['busqueda_CoordinadoresCarreraCArea']; ?>"</strong>
                                                    </p>
                                                </div>
                                                <div class="col-12">
                                                    <p class="text-center" style="margin-top: 20px;">
                                                        <button type="submit" class="btn btn-raised btn-danger">
                                                            ELIMINAR BÚSQUEDA
                                                        </button>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        require_once "./controladores/usuarioController.php";
                                        $ins_usuario = new usuarioController();

                                        // 0 es el índice que tiene la vista
                                        echo $ins_usuario->paginador_ccarrera_controlador($pagina[1],5,$_SESSION['roll_sti'],$_SESSION['id_sti'],$pagina[0],$_SESSION['busqueda_CoordinadoresCarreraCArea']);
                                        ?>
                                    </form>
                                </div>
                            <?php }?>


                            <?php
                            //listado
                            require_once "./controladores/usuarioController.php";
                            $ins_usuario = new usuarioController();

                            // PAGINACÍON, 0 es el índice que tiene la vista
                            echo $ins_usuario->paginador_ccarrera_controlador($pagina[1],10,$_SESSION['roll_sti'],$_SESSION['id_sti'],$pagina[0],"");
                            ?>

                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div id="cont-visdat" class="form-container">
            <form method="post"><img id="imgreg" src="./vistas/assets/img/tutores.jpg">
                <div class="form-group"><input class="form-control" type="text" placeholder="Nombre" name="name"></div>
                <div class="form-group"><input class="form-control" type="text" placeholder="Apellido Paterno"></div>
                <div class="form-group"><input class="form-control" type="text" placeholder="Apellido Materno"></div>
                <div class="form-group"><input class="form-control" type="text" placeholder="Fecha Nacimiento"></div>
                <div class="form-group"><input class="form-control" type="text" placeholder="Sexo"></div>
                <div class="form-group"><input class="form-control" type="tel" placeholder="Número de Telefono"></div>
                <div class="form-group"><input class="form-control" type="text" placeholder="Dirección"></div>
                <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
                <div class="form-group"><input class="form-control" type="text" placeholder="Area"></div>
                <div class="form-group"><input class="form-control" type="text" placeholder="Matrícula"></div>
                <div class="form-group" id="div-action"><button class="btn btn-primary bg-primary" id="btn-update" type="button">Actualizar</button><button class="btn btn-primary bg-primary" id="btn-cancel" type="button">CANCELAR</button></div>
            </form>
        </div>


    </div>
    
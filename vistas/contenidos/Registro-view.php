<?php


if(isset($_SESSION['roll_sti'])){
    if($_SESSION['roll_sti'] == "Tutorado"){
        echo'<script type="text/javascript"> window.location.href="'.SERVERURL.'MenuAlumno";</script>';
    }


}
    /* if(roll==coordinadorA) */ 
        include "./vistas/inc/navCoordinadorC.php"; 
    /*elseif(roll==coordinadorC)
        include "inc/navCoordinadorC.php"; 
    */
    
?>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<div class="register-photo">
    <div class="form-container">
        <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/usuarioAjax.php"  method="POST" data-form="save" autocomplete="off">
            <img id="imgreg" src="vistas/assets/img/meeting.jpg">
            <h2 class="text-center"><strong>Crear Cuenta</strong></h2>
            <div class="form-group">
                <select id="select_user" class="form-control js-example-basic-single" name="select_user">
                    <option value="0" selected="">Seleccione el tipo de usuario a registrar</option>
                    <?php            
                        if($_SESSION['roll_sti'] == "Coordinador De Carrera"){
                          echo '<option value="15">Tutor</option>
                                <option value="16">Tutorado</option> ';
                        }else  if($_SESSION['roll_sti'] == "Coordinador De Area"){
                             echo '<option value="14">Coordinador de Carrera</option>
                                   <option value="15">Tutor</option>
                                   <option value="16">Tutorado</option> 
                                   ';
                        }else  if($_SESSION['roll_sti'] == "Admin"){
                            echo '<option value="13">Coordinador de Area</option>
                                  <option value="14">Coordinador de Carrera</option>
                                  <option value="15">Tutor</option>
                                  <option value="16">Tutorado</option> 
                                   ';
                        }
                    ?>     
                </select>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" placeholder="Nombre" name="name_reg" required="">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" placeholder="Apellido Paterno" name="apellidop_reg" required="">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" placeholder="Apellido Materno" name="apellidom_reg" required="">
            </div>
            <div class="form-group">
                <label>Fecha de Nacimiento</label>
                <input class="form-control" name="fecha_reg" type="date">
            </div> 
            <div class="form-group">
                <select class="form-control" name="sexo_reg">
                    <option value="" selected="">Sexo</option>
                    <option value="1">Hombre</option>
                    <option value="2">Mujer</option>
                </select>
            </div>
            <div class="form-group">    
                <input class="form-control" type="tel" pattern="[0-9()+]{8,20}" placeholder="Número de Telefono" name="numero_tel_reg">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,190}" placeholder="Dirección" name="direccion_reg" required="">
            </div>
            <div class="form-group">
                <input class="form-control" type="email" placeholder="Email" name="email_reg">
            </div>
            <div class="form-group">
                <!-- <select class="form-control" name="carrera_reg">
                    <option selected="">Carrera</option>
                    
                </select> -->
                <div id="selectArEs"></div>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" pattern="[0-9-]{8,10}" placeholder="Numero de Control" name="no_ctrl_reg" required="">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Registrar</button>
            </div>
            <div class="form-group">
                <a class="btn btn-primary btn-block">Importar csv</a>
            </div>
        </form>
    </div>

    <div id="contain">
        <div id="importcsvregis" class="form-container">
            <form id="regisTutcsv" method="post"><img id="imgreg" src="vistas/assets/img/meeting.jpg">
                <h2 class="text-center"><strong>Importar Docentes</strong></h2>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit" style="background-color: rgb(245,124,56);">Importar</button>
                </div>
                <div class="form-group"><input class="form-control" type="text" id="nameinput" placeholder="Nombre" name="name"></div>
                <div class="form-group"><input class="form-control" type="text" placeholder="Apellidos"></div>
                <div class="form-group"><select class="form-control"><option value="" selected="">Area</option><option value="13">Arquitectura</option><option value="14">Informatica</option><option value="15">Ingenieria Civil</option><option value="16">Ingenieria en Sistemas Computacionales</option></select></div>
                <div class="form-group"><input class="form-control" type="text" placeholder="Numero de Control"></div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color: rgb(245,124,56);">Buscar</button></div>
            </form>
        </div>
        <div class="table-container col-md-12 search-table-col">
            <div class="form-group pull-right col-lg-4">
                <input type="text" class="search form-control" placeholder="Escriba el dato de búsqueda">
            </div>
            <span class="counter pull-right"></span>
            <div class="table-responsive table-bordered table table-hover table-bordered results">
                <table class="table table-bordered table-hover">
                    <thead class="bg-primary bill-header cs">
                        <tr>
                            <th id="trs-hd" class="col-lg-1"><br><strong>Nombre</strong><br></th>
                            <th id="trs-hd" class="col-lg-2"><br><strong>Apellido Paterno</strong><br></th>
                            <th id="trs-hd" class="col-lg-3"><br><strong>Apellido Materno</strong><br></th>
                            <th id="trs-hd" class="col-lg-2"><br><strong>Edad</strong><br></th>
                            <th id="trs-hd" class="col-lg-2"><br><strong>MatrÍcula</strong><br></th>
                            <th id="trs-hd" class="col-lg-2"><br>Carrera</th>
                            <th id="trs-hd" class="col-lg-2"><br>Periodo</th>
                            <th id="trs-hd" class="col-lg-2"><br>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Francisco</td>
                            <td>Santiago</td>
                            <td>de la Cruz</td>
                            <td>23</td>
                            <td>16190437<br></td>
                            <td>Ingenieria en Sistemas<br></td>
                            <td>Junio 2016-Enero 2021<br></td>
                            <td><button class="btn btn-success bg-primary" style="margin-left: 5px;" type="submit"><i class="fa fa-edit" style="font-size: 15px;"></i></button><button class="btn btn-danger" style="margin-left: 5px;" type="submit"><i class="fa fa-trash" style="font-size: 15px;"></i></button></td>
                        </tr>
                        <tr>
                            <td>Luis Alberto</td>
                            <td>Robles</td>
                            <td>Parada</td>
                            <td>23<br></td>
                            <td>16190359</td>
                            <td>Ingenieria en Sistemas<br></td>
                            <td>Junio 2016-Enero 2021<br></td>
                            <td><button class="btn btn-success bg-primary" style="margin-left: 5px;" type="submit"><i class="fa fa-edit" style="font-size: 15px;"></i></button><button class="btn btn-danger" style="margin-left: 5px;" type="submit"><i class="fa fa-trash" style="font-size: 15px;"></i></button></td>
                        </tr>
                        <tr>
                            <td>Juan Carlos</td>
                            <td>Fernández</td>
                            <td>Piñón</td>
                            <td>23<br></td>
                            <td>16190439</td>
                            <td>Ingenieria en Sistemas<br></td>
                            <td>Junio 2016-Enero 2021<br></td>
                            <td><button class="btn btn-success bg-primary" style="margin-left: 5px;" type="submit"><i class="fa fa-edit" style="font-size: 15px;"></i></button><button class="btn btn-danger" style="margin-left: 5px;" type="submit"><i class="fa fa-trash" style="font-size: 15px;"></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group" id="div-regis"><button class="btn btn-primary btn-block" id="btn-regis" type="submit" style="background-color: rgb(245,124,56);">Registrar</button></div>
        </div>
    </div>
</div>

<!-- <script type="text/javascript">
    $(document).ready(function(){
        reloadlist();
        $('#select_user').change(function(){
            reloadlist();
        });
    })
</script>
<script type="text/javascript">
    function reloadlist(){
        $.ajax({
            type:"POST",
            url: "registroAjax.php",
            data: "user=" + $('#select_user').val(),
            success:function(r){
                $('#selectArEs').html(r);
            }
        });
    }
</script> -->
<script> $(document).ready(function() {


            $('.js-example-basic-single').select2();
            console.log('select activado');
            /* listar_departamento(); */
        });</script>

    <?php include "./vistas/inc/navCoordinadorC2.php"; ?>
    <div class="register-photo">
        <div id="importcsvregis" class="form-container">
            <form id="regisTutcsv" method="post">
                <h2 class="text-center"><strong>Coordinadores de Carrera</strong></h2>
                <div class="form-group"><input class="form-control" type="text" id="nameinput" placeholder="Nombre" name="name"></div>
                <div class="form-group"><input class="form-control" type="text" placeholder="Apellidos"></div>
                <div class="form-group"><input class="form-control" type="text" placeholder="Matrícula"></div>
                <div class="form-group"><select class="form-control"><option value="" selected="">Estado</option><option value="13">Activo</option><option value="14">Inactivo</option></select></div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color: rgb(245,124,56);">Buscar</button></div>
                <div class="form-group"><a href="../Registro.html"><button class="btn btn-primary btn-block" type="submit" style="background-color: rgb(245,124,56);">rEGISTRAR</button></a></div>
                <div class="form-group"><div class="team-boxed">


    <div class="container">
        <div class="intro">
            <h2 class="text-center">COORDINADORES</h2>
        </div>
        <div class="row people">
            <div class="col-md-6 col-lg-4 item">
                <div class="box"><img class="rounded-circle" src="./vistas/assets/img/1.jpg" />
                    <h3 class="name">Alberto Ramírez Regalado</h3>
                    <b>Area: </b><p class="description">Sistemas e informática</p>
                    <b>Matrícula: </b><p class="description">25635453</p>
                    <b>Estado: </b><p class="description">Activo</p>
                    <div class="enlaces"><a href="#">Ver</a><a class="edit" href="#">Editar</a></div> 
                </div>
            </div>

            <div class="col-md-6 col-lg-4 item">
                <div class="box"><img class="rounded-circle" src="./vistas/assets/img/2.jpg" />
                    <h3 class="name">Maribel Castillejos Toledo</h3>
                    <b>Area: </b><p class="description">Sistemas e informática</p>
                    <b>Matrícula: </b><p class="description">25635453</p>
                    <b>Estado: </b><p class="description">Activo</p>
                    <div class="enlaces"><a href="#">Ver</a><a class="edit" href="#">Editar</a></div>  
                </div>
            </div>

            <div class="col-md-6 col-lg-4 item">
                <div class="box"><img class="rounded-circle" src="./vistas/assets/img/3.jpg" />
                    <h3 class="name">Angel Olivarez Perez</h3>
                    <b>Area: </b><p class="description">Sistemas e informática</p>
                    <b>Matrícula: </b><p class="description">25635453</p>
                    <b>Estado: </b><p class="description">Inactivo</p>
                    <div class="enlaces"><a href="#">Ver</a><a class="edit" href="#">Editar</a></div>      
                </div>
            </div>
        </div>
    </div>


</div></div>
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
    
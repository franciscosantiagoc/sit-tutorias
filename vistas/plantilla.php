<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
   <title><?php echo COMPANY;?></title>
   <?php include "inc/styles.php" ?>
</head>

<body>
   <?php
        $peticionAjax=false;
        require_once "./controladores/viewController.php";
        $IV = new viewController();
        $vistas = $IV->obtener_vistas_controlador();
        if($vistas=="login"||$vistas=="404"||$vistas=="home"){
                    require_once "./vistas/contenidos/".$vistas."-view.php";
<<<<<<< HEAD
        }else{
             /* session_start(['name'=>'STI']);*/ //no funciona debidamente por lo que se coloco en index
            $pagina=explode("/",$_GET['views']); // variable get, tiene todos los parametros de la url, pagina ahhora los tendrá
             require_once "./controladores/loginControlador.php";
            $lc = new loginControlador();

            /* if(!isset($_SESSION['token_sti']) || !isset($_SESSION['nombre_sti']) || !isset($_SESSION['roll_sti']) || !isset($_SESSION['id_sti'])){
            echo $lc->forzar_cierre_sesion_controlador();
            exit();
            } */
        if((time()-$_SESSION['last_time_sti']) > TIMESESSION) {
            $lc = new loginControlador();
            echo $lc->cierre_sesiontiempo_controlador();
            exit();
        } else{
              $_SESSION['last_time_sti'] = time(); //this was the moment of last activity.
              }

              include $vistas;
        }
        include "inc/footer.php";
        include "inc/Script.php";
=======
                }else{



                    /* session_start(['name'=>'STI']);*/ //no funciona debidamente por lo que se coloco en index
                    /*require_once "./controladores/loginControlador.php";
                    $lc = new loginControlador();
<<<<<<< HEAD
                               
                    if(!isset($_SESSION['token_sti']) || !isset($_SESSION['nombre_sti']) || !isset($_SESSION['roll_sti']) || !isset($_SESSION['id_sti'])){//verifica que la sesion no este corrupta
=======
                    $pagina=explode("/",$_GET['views']); // variable get, tiene todos los parametros de la url, pagina ahhora los tendrá
                    /* if(!isset($_SESSION['token_sti']) || !isset($_SESSION['nombre_sti']) || !isset($_SESSION['roll_sti']) || !isset($_SESSION['id_sti'])){
>>>>>>> b35d1900d6406c751ffdd8c54e171b7ae62af3fb
                        echo $lc->forzar_cierre_sesion_controlador();
                        exit();
                    }
                    if((time()-$_SESSION['last_time_sti']) > TIMESESSION) { //verifica el tiempo de inactividad en la sesion
                        $lc = new loginControlador();
                        echo $lc->cierre_sesiontiempo_controlador();
                        exit();
                    } else{ 
                        $_SESSION['last_time_sti'] = time(); //actualiza el tiempo de la ultima actividad en la sesion
                    } */

                    include $vistas;
                }

                include "inc/footer.php";
                include "inc/Script.php"; 
>>>>>>> adeccc3c9f6d73e3fb57c6a42dabb70497b2333f
            ?>

   <?php 
        include "./vistas/inc/LogOut.php";
    ?>


</body>

</html>
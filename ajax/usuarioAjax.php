<?php
$peticionAjax = true;
require_once "../config/APP.php";
require_once "../controladores/usuarioController.php";

 if (isset($_POST['name_reg'])) {
   /*-------------- Instancia al controlador --------------*/
   
   $ins_usuario = new usuarioController();

   /*-------------- Agregar un usuario --------------*/
   if (isset($_POST['name_reg']) && isset($_POST['apellidop_reg'])) {
      echo $ins_usuario->registro_usuario_controlador();
   }
}elseif (isset($_POST['name_upd'])) {
   echo 'actualizacion';//$ins_usuario->actualizar_usuario_controlador();
}elseif(isset($_POST['selectCarReg'])){
   $ins_usuario = new usuarioController();
   echo $ins_usuario->selectRegistro_selectArEs();
}elseif (isset($_POST['dataexcel']) && isset($_POST['datauser'])) {
   $ins_usuario = new usuarioController();
   echo $ins_usuario->registro_multU_controlador();

}elseif(isset($_POST['idtutorado'])){
    $ins_usuario = new usuarioController();
   echo $ins_usuario->busqueda_tutorado_controlador();

}elseif(isset($_POST['idtutorado_ver'])){
     $ins_usuario = new usuarioController();
     echo $ins_usuario->ver_tutorado_controlador();
     /*echo 'respuesta';*/
     /*-------------------------------  editar tutorados carrera, generacion  -------------------------------  */
 }elseif( isset($_POST['ed_carr_tu']) && isset($_POST['ed_gen_tu']) && isset($_POST['ed_noctrl_tu']) ){
   $ins_usuario = new usuarioController();
   echo $ins_usuario->actualiza_tutorado_controlador();
  /*echo 'respuesta ajax'; */
     /*-------------------------------  consulta asignacion de tutorados  -------------------------------  */
}elseif( isset($_POST['asig_tutorado'])){
     require_once "../controladores/tutoradosController.php";
     $ins_usuario = new tutoradosController();
     echo $ins_usuario->consulta_asigtutorado_controlador();
     /*echo 'respuesta ajax'; */
     /*-------------------------------  actualizacion de la asignacion de tutorados  -------------------------------  */
 }elseif( isset($_POST['asig_ed_noctrl']) && isset($_POST['asig_ed_tut']) ){
    require_once "../controladores/tutoradosController.php";
    $ins_usuario = new tutoradosController();
    echo $ins_usuario->actualiza_asigtutorado_controlador();
    /*echo 'respuesta ajax'; */

}else {
   /*echo 'No existe opcion ';*/
    session_start(['name' => 'STI']);
   session_unset();
   session_destroy();
   header("Location: " . SERVERURL . "login");
   exit(); 
}

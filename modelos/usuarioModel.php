<?php
   require_once "mainModel.php";
   
   class usuarioModel extends mainModel{
      /*-------------- Modelo agregar usuario --------------*/
      protected static function agregar_usuario_modelo($datos){
         $sql = mainModel::conectar()->prepare("INSERT INTO persona(Nombre, APaterno, AMaterno, FechaNac, Sexo, Correo, NTelefono, Direccion, Ciudad,Foto) VALUES(:Nombre, :APaterno, :AMaterno, :FechaNac, :Sexo, :Correo, :NTelefono, :Direccion, :Ciudad,:Foto)");

         $sql->bindParam(":Nombre", $datos['Nombre']);
         $sql->bindParam(":APaterno",$datos['APaterno']);
         $sql->bindParam(":AMaterno",$datos['AMaterno']);
         $sql->bindParam(":FechaNac",$datos['FechaNac']);
         $sql->bindParam(":Sexo", $datos['Sexo']);
         $sql->bindParam(":Correo",$datos['Correo']);
         $sql->bindParam(":NTelefono", $datos['NTelefono']);
         $sql->bindParam(":Direccion", $datos['Direccion']);
         $sql->bindParam(":Ciudad",$datos['Ciudad']);
         $sql->bindParam(":Foto", $datos['Foto']);
         $sql->execute();

         return $sql;
      }

      protected static function actualizar_trabajador_modelo($datos){
         $sql = mainModel::conectar()->prepare("UPDATE persona SET (Nombre=:Nombre, APaterno=:APaterno, AMaterno=:AMaterno, FechaNac=:FechaNac, Correo=:Correo, NTelefono=:NTelefono, Direccion=:Direccion, Ciudad=:Ciudad) ");
   
         $sql->bindParam(":Nombre", $datos['Nombre']);
         $sql->bindParam(":APaterno",$datos['APaterno']);
         $sql->bindParam(":AMaterno",$datos['AMaterno']);
         $sql->bindParam(":FechaNac",$datos['FechaNac']);
         $sql->bindParam(":Correo",$datos['Correo']);
         $sql->bindParam(":NTelefono", $datos['NTelefono']);
         $sql->bindParam(":Direccion", $datos['Direccion']);
         $sql->bindParam(":Ciudad",$datos['Ciudad']);
         $sql->execute();
   
         return $sql;
      }


       protected static function actualizar_tutorado_modelo($datos){
           $sql = mainModel::conectar()->prepare("UPDATE persona SET (Nombre=':Nombre', APaterno=':APaterno', AMaterno=':AMaterno', FechaNac=':FechaNac', Correo=':Correo', NTelefono=':NTelefono', Direccion=':Direccion', Ciudad=':Ciudad') ");

           $sql->bindParam(":Nombre", $datos['Nombre']);
           $sql->bindParam(":APaterno",$datos['APaterno']);
           $sql->bindParam(":AMaterno",$datos['AMaterno']);
           $sql->bindParam(":FechaNac",$datos['FechaNac']);
           $sql->bindParam(":Correo",$datos['Correo']);
           $sql->bindParam(":NTelefono", $datos['NTelefono']);
           $sql->bindParam(":Direccion", $datos['Direccion']);
           $sql->bindParam(":Ciudad",$datos['Ciudad']);
           $sql->execute();

           return $sql;
       }
       /*------------------------Modelo datos usuario------------------------*/
       protected static function datos_usuario_modelo($tipo,$tabla,$condicion){
          if($tipo=="Unico"){
            $sql=mainModel::conectar()->prepare("SELECT idPersona,Nombre,Apaterno,Amaterno,FechaNac,Correo,Sexo,NTelefono,Direccion,Ciudad FROM persona, $tabla WHERE idPersona=Persona_idPersona AND $condicion ;");
          }elseif($tipo=="Conteo"){
            $sql=mainModel::conectar()->prepare("SELECT * FROM $tabla $condicion");
          }
          

          $sql->execute();
          return $sql;
       }

       protected static function datos_ta_modelo($campos,$tabla,$condicion){
         /*$sql="SELECT $campos FROM $tabla $condicion";*/
          $sql=mainModel::conectar()->prepare("SELECT $campos FROM $tabla $condicion");
          $sql->execute(); 
          return $sql;
       }
   }
   

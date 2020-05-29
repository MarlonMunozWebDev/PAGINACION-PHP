<?php
 /*DEFINIMOS LOS VALORES DE LA CONEXION MYSQL Y EL NOMBRE DE LA BD*/
 $link = 'mysql:host=localhost;dbname=glosario';

 /*DEFINIMOS NUESTRO USUARIO Y CONTRASEÑA DEL SERVIDOR*/
 $usuario = 'root';
 $pass = '';

//CONEXION Y VERIFICANDO LOS DATOS
 try {
   $pdo = new PDO($link,$usuario,$pass);
   //echo 'Conectado Exitosamente <br>';

   /*SI OCURRE UN ERROR AL COMPOROBAR LOS DATOS*/
 }catch (PDOException $e) {
   print "!Error de Conexion!: " . $e->getMessage() . "<br/>";
   die();
 }
 ?>

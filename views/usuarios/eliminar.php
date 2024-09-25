<?php

require_once '../../App/Models/usuario.class.php';


if(isset($_POST['eliminar'])){
    $id=$_POST['eliminar'];
   
    $resp = $usuario->eliminar($id);
   }
?>
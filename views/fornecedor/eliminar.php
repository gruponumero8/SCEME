<?php

require_once '../../App/Models/fornecedor.class.php';


if(isset($_POST['eliminar'])){
    $id=$_POST['eliminar'];
   
    $resp = $fornecedor->eliminar($id);
   }
?>
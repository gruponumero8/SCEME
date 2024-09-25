<?php

require_once '../../App/Models/material.class.php';


if(isset($_POST['eliminar'])){
    $id=$_POST['eliminar'];
   
    $resp = $material->eliminar($id);
   }
?>
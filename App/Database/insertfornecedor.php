<?php
require_once '../auth.php';
require_once '../Models/fornecedor.class.php';

$fornome  = $_POST['nome'];
$contacto = $_POST['contacto'];
$endereco = $_POST['endereco'];
$idf=$_POST ['idF'];

if ( $fornome != NULL && $perm == 1) 

{ 
	if(isset($idf) != NULL) {
		
		$fornecedor->Updateforn ($idf, $fornome, $contacto, $endereco);						
								}
	else {

		$fornecedor->Inserfornecedor($fornome, $contacto, $endereco);

		}
}


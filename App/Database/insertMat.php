<?php
require_once '../auth.php';
require_once '../Models/material.class.php';

	$nomeMaterial = $_POST['nomeMaterial'];
	$qtd = $_POST['qtd'];
	$IdFornecedor= $_POST['IdFornecedor'];
	$data= $_POST['data'];

		
	if ( $nomeMaterial != NULL && $perm == 1) 

	{ 
		if(isset($verificar) != NULL) {
			
			$material->UpdateMat($id, $nomeMaterial, $qtd,$IdFornecedor,$data);						
									}
		else {
	
			$material->InsertMat($nomeMaterial, $qtd,$IdFornecedor,$data);
	
			}
	}
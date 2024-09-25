<?php

/*
Class produtos
*/

require_once 'connect.php';

class Material extends Connect
{


  public function index($perm)
  {
    if ($perm == 1) {
      $query = "SELECT 
            m.IdMaterial, 
            m.MaterialNome, 
            m.QtdMaterial,
            Dataregisto,  -- Adicionada a vírgula aqui
            f.FornecedorNome 
          FROM material m 
          JOIN fornecedor f ON m.fkIdFornecedor = f.IdFornecedor";

      $result = mysqli_query($this->SQL, $query) or die(mysqli_error($this->SQL));

      while ($row[] = mysqli_fetch_array($result));
      return json_encode($row);
    } else {
      echo "Você não tem Permissao de acesso a este conteúdo!";
    }
  }

  public function InsertMat($nomeMaterial, $qtd,$IdFornecedor,$data)
  {
  
    $query = "INSERT INTO `material`(`IdMaterial`, `MaterialNome`,`QtdMaterial` ,`fkIdFornecedor`,`Dataregisto` ) VALUES (NULL,'$nomeMaterial', '$qtd', '$IdFornecedor','$data')";
    $result = mysqli_query($this->SQL, $query) or die(mysqli_error($this->SQL));

    if ($result) {
      header('Location: ../../views/material/index.php?alert=1');
    } else {
      header('Location: ../../views/material/index.php?alert=0');
    }
  }
  public function eliminarm($idM)
  {
   $query ="DELETE FROM `movimentacaoestoque` WHERE `IdMovimentacao`='$idM'";
   $result = mysqli_query($this->SQL, $query) or die(mysqli_error($this->SQL));
    mysqli_insert_id($this->SQL);
    if ($result) {
      header('Location: ../../views/mov/index.php?alert=1');
    } else {
      header('Location: ../../views/mov/index.php?alert=0');
    }
  }

  public function eliminar($idM)
  {
   $query ="DELETE FROM `material` WHERE `IdMaterial`='$idM'";
   $result = mysqli_query($this->SQL, $query) or die(mysqli_error($this->SQL));
    mysqli_insert_id($this->SQL);
    if ($result) {
      header('Location: ../../views/material/index.php?alert=1');
    } else {
      header('Location: ../../views/material/index.php?alert=0');
    }
  }

  /*public function UpdateMat($id, $nomeMaterial, $qtd,$IdFornecedor,$data)
  {
    if (mysqli_query($this->SQL, "UPDATE `material` SET `NomeProduto` = '$nomeProduto', `Usuario_idUser` = '$idUsuario' WHERE `CodRefProduto` = '$id'") or die(mysqli_error($this->SQL))) {

      header('Location: ../../views/prod/index.php?alert=1');
    } else {
      header('Location: ../../views/prod/index.php?alert=0');
    }
  }

  public function DelProdutos($value)
  {

    $query = "SELECT * FROM `produtos` WHERE `CodRefProduto` = '$value'";
    $result = mysqli_query($this->SQL, $query);
    if ($row = mysqli_fetch_array($result)) {

      $id = $row['CodRefProduto'];
      $public = $row['PublicProduto'];

      if ($public == 1) {
        $p = 0;
      } else {
        $p = 1;
      }

      mysqli_query($this->SQL, "UPDATE `produtos` SET `PublicProduto` = '$p' WHERE `CodRefProduto` = '$id'") or die(mysqli_error($this->SQL));
      header('Location: ../../views/prod/index.php?alert=1');
    } else {
      header('Location: ../../views/prod/index.php?alert=0');
    }
  }

  public function Ativo($value, $id)
  {

    if ($value == 0) {
      $v = 1;
    } else {
      $v = 0;
    }

    $query = "UPDATE `produtos` SET `Ativo` = '$v' WHERE `CodRefProduto` = '$id'";
    $result = mysqli_query($this->SQL, $query) or die(mysqli_error($this->SQL));

    header('Location: ../../views/prod/');
  } //Ativo
*/
}

$material = new Material;

<?php
/*
Class produtos
*/

require_once 'connect.php';

class Usuario extends Connect
{

  public function index($perm)
  {
    if ($perm == 1) {
      $query = "SELECT * FROM `usuario`";
      $result = mysqli_query($this->SQL, $query) or die(mysqli_error($this->SQL));
      
      while ($row[] = mysqli_fetch_array($result));

      return json_encode($row);
    } else {
      echo "Você não tem Permissao de acesso a este conteúdo!";
    }
  } 

  public function InsertUser($username, $email, $password, $perm)
  {
    $query = "INSERT INTO `usuario`(`IdUsuario`,`UsuarioNome`,`Email`,`Senha`,`Permissao`)VALUES (Null, '$username', '$email', '$password' , '$perm' )";
    
    $result = mysqli_query($this->SQL, $query) or die(mysqli_error($this->SQL));

    if ($result) {
      header('Location: ../../views/usuarios/index.php?alert=1');
    } else {
      header('Location: ../../views/usuarios/index.php?alert=0');
    }
  }

  public function editUsuario($idUser)
  {

    $query = "SELECT * FROM `usuario` WHERE `IdUsuario` = '$idUser'";
    $result = mysqli_query($this->SQL, $query) or die(mysqli_error($this->SQL));

    if ($row = mysqli_fetch_array($result)) 
    {
      return array('nomeUsuario' => $row['UsuarioNome'], 'E-mail' => $row['Email'], 'Permissao' => $row['Permissao']);
    }
  }

  public function UpdateUser($idUser, $username, $email, $permissao= NULL )
  {
    if ($permissao != NULL) {
      $Permissao=",Permissao= '$permissao'";
      
    } else {
      $Permissao='';
    }
    $username = mysqli_real_escape_string($this->SQL, $username);
    $email = mysqli_real_escape_string($this->SQL, $email);


   $query ="UPDATE `usuario` SET `UsuarioNome`='$username',`Email`='$email' $Permissao WHERE `IdUsuario`='$idUser'";
   $result = mysqli_query($this->SQL, $query) or die(mysqli_error($this->SQL));
    mysqli_insert_id($this->SQL);
    if ($result) {
      header('Location: ../../views/usuarios/index.php?alert=1');
    } else {
      header('Location: ../../views/usuarios/index.php?alert=0');
    }
  }


  public function eliminar($idUser)
  {
   $query ="DELETE FROM `usuario` WHERE `IdUsuario`='$idUser'";
   $result = mysqli_query($this->SQL, $query) or die(mysqli_error($this->SQL));
    mysqli_insert_id($this->SQL);
    if ($result) {
      header('Location: ../../views/usuarios/index.php?alert=1');
    } else {
      header('Location: ../../views/usuarios/index.php?alert=0');
    }
  }
  /*

  public function trocaSenha($passAtual, $password, $idUsuario)
  {

    $query = "SELECT * FROM `usuario` WHERE `idUser` = '$idUser'"; //verificar o nome da bd
    $result = mysqli_query($this->SQL, $query) or die(mysqli_error($this->SQL));

    if ($row = mysqli_fetch_array($result)) {
      $passAtual = md5($passAtual);

      if (!strcmp($passAtual, $row['Password'])) {

        $id = $row['idUser'];

        $password = md5($password);

        $up = "UPDATE `usuario` SET `Password` = '$password' WHERE `idUser` = '$id'";
        mysqli_query($this->SQL, $up) or die(mysqli_error($this->SQL));

        return 1;
      }
      return 0;
    }
    return 0;
  }*/
}

$usuario = new Usuario;

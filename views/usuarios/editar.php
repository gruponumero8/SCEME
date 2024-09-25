<?php

   $localhost = "localhost";
	 $root = "root"; // Aqui vai o nome do usuário do seu Banco de dados MySQL.
	 $passwd = "";   // Aqui vai a senha do seu Banco de dados MySQL.
	 $database = "sceme";
	 $SQL;


	

	
		$con = NEW mysqli ($localhost, $root,$passwd,$database);
		
		
		if ($con-> connect_error) 
		{
			die("Conexão com o banco de dados falhou!:" );
		}
    

	

    $id = $_POST["idUser"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $permissao= $_POST["permissao"];

    // Preparar a consulta SQL
    $sql = "UPDATE usuario SET 'UsuarioNome' = '$username', 'email' = '$email', 'Permissao'='$permissao' WHERE IdUsuario ='$id'";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssii", $name, $email,$permissao, $id);

    if ($row = mysqli_fetch_array( $stmt)) 
    {
      return array('nomeUsuario' => $row['UsuarioNome'], 'E-mail' => $row['Email'], 'Permissao' => $row['Permissao']);
    }

    // Executar a consulta
    if ($stmt->execute()) {
        echo "Registro atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar o registro: " . $stmt->error;
    }

    // Fechar a declaração
    $stmt->close();


// Obter o ID do registro a ser editado

// Preparar a consulta SQL para obter os dados do registro
$sql= "SELECT * FROM `usuario` WHERE `IdUsuario` = '$id'";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

// Obter os dados do registro
$row = $result->fetch_assoc();

// Fechar a declaração e a conexão
$stmt->close();
$conn->close(); 
?>

<?php
/*** Conexão com o banco de dados*/
class Connect

	{
	var $localhost = "localhost";
	var $root = "root"; // Aqui vai o nome do usuário do seu Banco de dados MySQL.
	var $passwd = "";   // Aqui vai a senha do seu Banco de dados MySQL.
	var $database = "sceme";
	var $SQL;


	
	public function __construct ()
	{
		$this->SQL = mysqli_connect($this->localhost, $this->root, $this->passwd);
		mysqli_select_db($this->SQL, $this->database);
		
		if (!$this->SQL) 
		{
			die("Conexão com o banco de dados falhou!:" . mysqli_connect_error($this->SQL));
		}
	}
	function login($username, $password)

	{
		$query  = "SELECT * FROM `usuario` WHERE `UsuarioNome` = '$username'";
		$result = mysqli_query($this->SQL, $query) or die(mysqli_error($this->SQL));
		$total  = mysqli_num_rows($result);

		if ($total) {

			$dados = mysqli_fetch_array($result);
			
		if (!strcmp ($password, $dados['Senha']))

			{
				$_SESSION['idUsuario'] = $dados['IdUsuario'];
				$_SESSION['usuario']   = $dados['UsuarioNome'];
				$_SESSION['perm']      = $dados['Permissao'];
				
				header("Location: ../views/");

			} else {
				echo "<script>alert(' Senha incorecta ');</script>";
					echo "<script> window.location.href='../login.php'</script>";

			}
		} else 
				{echo "<script>alert('Usuário não cadastrado ');</script>";
					echo "<script> window.location.href='../login.php'</script>";
				}
	}

	
}
$connect = new Connect;
?>

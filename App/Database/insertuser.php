<?php
require_once '../auth.php';
require_once '../Models/usuario.class.php';

$username  = $_POST['username'];
$email = $_POST['email'];
$permissao = $_POST['permissao'];
$idUser = $_POST['idUser'];




function validarSenha($senha) {
    // Verifica se a senha tem 6 ou mais caracteres, contém pelo menos uma letra maiúscula e pelo menos um caractere especial
    return preg_match('/^(?=.*[A-Z])(?=.*[!@#$%^&*(),.?":{}|<>])[a-zA-Z!@#$%^&*(),.?":{}|<>]{6,}$/', $senha);
}
    if ($username != NULL && $perm == 1 || $idUser == $idUsuario) { 
		if ($idUser  != NULL) {
			$usuario->UpdateUser($idUser, $username, $email, $permissao );
		} else {
			if (!validarSenha($_POST['password'])) {
				echo "<script>alert('A senha deve ter 6 caracteres ou mais, pelo menos uma letra maiúscula e um caractere especial.');</script>";
				echo "<script> window.location.href='../../views/usuarios/addusuarios.php'</script>";
				exit;
			}
		$password = md5($_POST['password']);
		$usuario->InsertUser($username, $email, $password, $permissao);   
		}}
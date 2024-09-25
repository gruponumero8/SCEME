<?php

/*
     Class Fornecedor
*/

require_once 'connect.php';

class Fornecedor extends Connect
{
    public function index($perm)
    {
        if ($perm == 1) {
            $query = "SELECT * FROM `fornecedor`";
            $result = mysqli_query($this->SQL, $query) or die(mysqli_error($this->SQL));

            while ($row[] = mysqli_fetch_array($result));
            return json_encode($row);
        } else {
            echo "Você não tem Permissao de acesso a este conteúdo!";
        }
    }

    public function Inserfornecedor($fornome, $contacto, $endereco)
    {
        $query = "INSERT INTO `fornecedor`(`IdFornecedor`,`FornecedorNome`,`Contacto`,`Endereco`) VALUES (NULL, '$fornome', '$contacto', '$endereco')";
        
        $result = mysqli_query($this->SQL, $query) or die(mysqli_error($this->SQL));
        
        if ($result) {
            header('Location: ../../views/fornecedor/index.php?alert=1');
        } else {
            header('Location: ../../views/fornecedor/index.php?alert=0');
        }
    }

    public function editFornecedor($idF)
    {
        $query = "SELECT * FROM `fornecedor` WHERE `IdFornecedor` = '$idF'";
        $result = mysqli_query($this->SQL, $query) or die(mysqli_error($this->SQL));

        if ($row = mysqli_fetch_array($result)) 
        {
            return array(
                'nomeFornecedor' => $row['FornecedorNome'], 
                'Contacto' => $row['Contacto'], 
                'Endereco' => $row['Endereco']
            );
        }
    }

    public function Updateforn($idF, $fornome, $contacto, $endereco)
    {
        // Escapando os valores para evitar SQL Injection
        $fornome = mysqli_real_escape_string($this->SQL, $fornome);
        $contacto = mysqli_real_escape_string($this->SQL, $contacto);
        $endereco = mysqli_real_escape_string($this->SQL, $endereco);

        // Consulta para atualizar as informações do fornecedor
        $query = "UPDATE `fornecedor` SET 
                    `FornecedorNome` = '$fornome', 
                    `Contacto` = '$contacto', 
                    `Endereco` = '$endereco' 
                  WHERE `IdFornecedor` = '$idF'";
        
        $result = mysqli_query($this->SQL, $query) or die(mysqli_error($this->SQL));
        
        if ($result) {
            header('Location: ../../views/fornecedor/index.php?alert=1'); // Sucesso
        } else {
            header('Location: ../../views/fornecedor/index.php?alert=0'); // Falha na atualização
        }
    }

    public function eliminar($idF)
    {
        $query ="DELETE FROM `fornecedor` WHERE `IdFornecedor`='$idF'";
        $result = mysqli_query($this->SQL, $query) or die(mysqli_error($this->SQL));
        
        if ($result) {
            header('Location: ../../views/fornecedor/index.php?alert=1'); // Sucesso
        } else {
            header('Location: ../../views/fornecedor/index.php?alert=0'); // Falha na eliminação
        }
    }
}

/* Fabrinte saiu aqui */
$fornecedor = new Fornecedor;
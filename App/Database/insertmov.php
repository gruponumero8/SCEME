<?php
require_once '../../App/auth.php';
require_once '../../layout/script.php';
require_once '../../App/Models/conexao.php';

// Obtém os dados do formulário
$tipo = $_POST['tipo'];
$qtd = $_POST['qtd'];
$data = $_POST['data'];
$idusuario = $_POST['idUser'];
$movmaterial = $_POST['movmaterial'];
$usur = $_POST['usur'];

// Consulta para obter a quantidade disponível do material
$sqlVerifica = "SELECT `QtdMaterial` FROM `material` WHERE `IdMaterial` = '$movmaterial'";
$resultVerifica = mysqli_query($conn, $sqlVerifica);

if ($resultVerifica) {
    $row = mysqli_fetch_assoc($resultVerifica);
    $qtdDisponivel = $row['QtdMaterial'];

    // Verifica se a movimentação é de saída
    if ($tipo == 0) {
        // Verifica se a quantidade solicitada é maior que a quantidade disponível
        if ($qtd > $qtdDisponivel) {
            // Se não houver estoque suficiente, redireciona com alerta
            echo "<script>alert('Sem estoque suficiente para este material. Disponível: $qtdDisponivel.');</script>";
            echo "<script> window.location.href='../../views/mov/addmov.php'</script>";
            exit();
        }
    }

    // Verificação para entradas: deve haver saídas correspondentes
    if ($tipo == 1) {
        // Consulta para contar quantas saídas existem para o mesmo produto e a mesma quantidade
        $sqlVerificaSaidas = "SELECT COUNT(*) AS TotalSaidas 
                              FROM `movimentacaoestoque` 
                              WHERE `fkIdMaterial` = '$movmaterial' AND `Tipo` = 0 AND `QtdMovimentacao` = '$qtd'";
        
        $resultSaidas = mysqli_query($conn, $sqlVerificaSaidas);
        
        if ($resultSaidas) {
            $rowSaidas = mysqli_fetch_assoc($resultSaidas);
            $totalSaidas = $rowSaidas['TotalSaidas']; // Total de saídas registradas com essa quantidade

            // Se não houver saídas correspondentes, não permite a entrada
            if ($totalSaidas == 0) {
                echo "<script>alert('Não há saídas registradas para esta quantidade.');</script>";
                echo "<script> window.location.href='../../views/mov/addmov.php'</script>";
                exit();
            }

            // Consulta para contar quantas entradas existem para o mesmo produto e a mesma quantidade
            $sqlVerificaEntradasFuturas = "SELECT COUNT(*) AS count 
                                            FROM `movimentacaoestoque` 
                                            WHERE `fkIdMaterial` = '$movmaterial' 
                                            AND `Tipo` = 1 
                                            AND `QtdMovimentacao` = '$qtd'";
            
            $resultEntradasFuturas = mysqli_query($conn, $sqlVerificaEntradasFuturas);
            
            if ($resultEntradasFutras) {
                $rowEntradasFuturas = mysqli_fetch_assoc($resultEntradasFutras);
                $totalEntradas = $rowEntradasFutras['count']; // Total de entradas registradas com essa quantidade

                // Verifica se as entradas não excedem as saídas
                if ($totalEntradas >= $totalSaidas) {
                    echo "<script>alert('Não é permitido registrar mais entradas do que as saídas correspondentes.');</script>";
                    echo "<script> window.location.href='../../views/mov/addmov.php'</script>";
                    exit();
                }
            }
        } else {
            // Se a consulta falhar, redireciona com alerta
            header('Location: ../../views/?alert=erro_consulta');
            exit();
        }
    }

    // Insere a movimentação no banco de dados apenas se todas as condições forem atendidas
    $sqlInsertMovimentacao = "INSERT INTO `movimentacaoestoque`(`IdMovimentacao`, `Tipo`, `QtdMovimentacao`, `DataMovimentacao`, `fkIdUsuario`, `fkIdMaterial`) VALUES
    (NULL, '$tipo', '$qtd', '$data', '$idusuario', '$movmaterial')";

    $resultInsert = mysqli_query($conn, $sqlInsertMovimentacao);
    
    if ($resultInsert) {
        // Atualiza o estoque na tabela materiais após a inserção da movimentação
        if ($tipo == 0) { // Saída
            $sqlUpdateEstoque = "UPDATE `material` SET `QtdMaterial` = `QtdMaterial` - '$qtd' WHERE `IdMaterial` = '$movmaterial'";
        } else if ($tipo == 1) { // Entrada
            $sqlUpdateEstoque = "UPDATE `material` SET `QtdMaterial` = `QtdMaterial` + '$qtd' WHERE `IdMaterial` = '$movmaterial'";
        }

        mysqli_query($conn, $sqlUpdateEstoque); // Executa a atualização do estoque

        header('Location: ../../views/mov/index.php?alert=1'); // Sucesso
    } else {
        header('Location: ../../views/?alert=0'); // Falha na inserção
    }
} else {
    // Se a consulta falhar, redireciona com alerta
    header('Location: ../../views/?alert=erro_consulta');
}
/*if (isset($_POST['upload']) == 'Cadastrar') {

	$QuantItens = $_POST['QuantItens'];
	$ValCompItens = $_POST['ValCompItens'];
	$ValVendItens = $_POST['ValVendItens'];
	$DataCompraItens = $_POST['DataCompraItens'];
	$DataVenci_Itens = $_POST['DataVenci_Itens'];
	$Produto_CodRefProduto = $_POST['codProduto'];
	$Fabricante_idFabricante = $_POST['idFabricante'];

	$iduser = $_POST['iduser'];


		if (isset($_POST['idItens'])) {

			$idItens = $_POST['idItens'];
			$itens->updateItens($idItens, $nomeimagem, $QuantItens, $ValCompItens, $ValVendItens, $DataCompraItens, $DataVenci_Itens, $Produto_CodRefProduto, $Fabricante_idFabricante, $idUsuario);
		} else {
			$itens->InsertItens($nomeimagem, $QuantItens, $ValCompItens, $ValVendItens, $DataCompraItens, $DataVenci_Itens, $Produto_CodRefProduto, $Fabricante_idFabricante, $idUsuario);
		}
	} else {
		header('Location: ../../views/itens/index.php?alert=3');
	}
} else {
	header('Location: ../../views/itens/index.php');
}*/
?>

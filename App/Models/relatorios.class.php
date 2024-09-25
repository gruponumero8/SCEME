<?php


/**
 * 
 */
require_once 'connect.php';

class Relatorio extends Connect
{

	public function qtdUser()
	{
		
		
		$sql = "SELECT count(*) as  User FROM `usuario`;";

		
		$result = mysqli_query($this->SQL, $sql);

		
		if (!$result) {
			
			return false; 
		}

		if ($row = mysqli_fetch_assoc($result)) {
			return $row['User'];
		}

		return 0; 
	}


	public function saida()
	{
		
		
		$sql = "SELECT count(*) as  saida FROM `movimentacaoestoque` WHERE `Tipo`=0;";

		
		$result = mysqli_query($this->SQL, $sql);

		
		if (!$result) {
			
			return false; 
		}

		if ($row = mysqli_fetch_assoc($result)) {
			return $row['saida'];
		}

		return 0; 
	}

	public function entrada()
	{
		
		
		$sql = "SELECT count(*) as  entrada FROM `movimentacaoestoque` WHERE `Tipo`=1;";

		
		$result = mysqli_query($this->SQL, $sql);

		
		if (!$result) {
			
			return false; 
		}

		if ($row = mysqli_fetch_assoc($result)) {
			return $row['entrada'];
		}

		return 0; 
	}



	
	public function qtdStoque()
	{
		
		$sql = "SELECT SUM(QtdMaterial) AS TotalEmEstoque FROM material;";

		
		$result = mysqli_query($this->SQL, $sql);

		
		if (!$result) {
			
			return false; 
		}

		if ($row = mysqli_fetch_assoc($result)) {
			return $row['TotalEmEstoque'];
		}

		return 0; 
	}



    public function getDadosMensais() {
        $qtd = [];
		$meses=[];
        $sql = "SELECT MONTHNAME(`DataMovimentacao`) AS DataMovimentacao, SUM(`QtdMovimentacao`) AS QtdMovimentacao
			FROM `movimentacaoestoque`
			GROUP BY MONTH(`DataMovimentacao`)
			ORDER BY MONTH(`DataMovimentacao`);";
        $result = mysqli_query($this->SQL, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $qtd[] = $row['QtdMovimentacao'];
                $meses[] = $row['DataMovimentacao'];
            }
        }
        
        return ['qtd' => $qtd, 'meses' => $meses];
    }

    
    public function gerarJSON() {
        $dados = $this->getDadosMensais();
        return json_encode($dados);
    }

    public function getQtdPorProduto() {
        $qtd = [];
		$Prod=[];
        $sql = "SELECT `MaterialNome`, SUM(`QtdMaterial`) AS Qtd\n"
				. "			FROM material\n"
				. "			GROUP BY (`MaterialNome`);";
        $result = mysqli_query($this->SQL, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $qtd[] = $row['Qtd'];
                $Prod[] = $row['MaterialNome'];
            }
        }
        
        $dados =  ['qtd' => $qtd, 'Produtos' => $Prod];
		return json_encode($dados);
    }



	
}

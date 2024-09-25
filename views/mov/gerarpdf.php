<?php
require_once '../../App/Models/conexao.php';
require_once('../tcpdf/tcpdf.php'); //  a biblioteca TCPDF está incluída corretamente

// Criação do novo PDF
$pdf = new TCPDF();
$pdf->AddPage();

// Configurando título
$pdf->SetFont('helvetica', 'B', 20);
$pdf->Cell(0, 10, 'Relatório de Movimentações', 0, 1, 'C');

// Configurando a tabela
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(30, 5, 'Id da Movimentacao', 1);
$pdf->Cell(15, 5, 'Tipo', 1);
$pdf->Cell(20, 5, 'Quantidade', 1);
$pdf->Cell(45, 5, 'Data da Movimentacao', 1);
$pdf->Cell(25, 5, 'Usuario', 1);
$pdf->Cell(15, 5, 'Material', 1);
$pdf->Cell(45, 5, 'Fornecedor e Data de Registro', 1);
$pdf->Ln();

// SQL query para obter os dados
$sql = "
SELECT m.IdMovimentacao, 
       m.Tipo, 
       m.QtdMovimentacao, 
       m.DataMovimentacao, 
       u.UsuarioNome AS UsuarioNome, 
       mat.MaterialNome AS MaterialNome,
       CONCAT(f.FornecedorNome, ' - ', DATE_FORMAT(mat.Dataregisto, '%Y-%m-%d')) AS FornecedorDataRegisto
FROM movimentacaoestoque m
JOIN usuario u ON m.fkIdUsuario = u.IdUsuario
JOIN material mat ON m.fkIdMaterial = mat.IdMaterial
JOIN fornecedor f ON mat.fkIdFornecedor = f.IdFornecedor
";

$result = mysqli_query($conn, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $pdf->Cell(30, 5, $row['IdMovimentacao'], 1);
        $pdf->Cell(15, 5, ($row['Tipo'] == 0) ? 'Saida' : 'Entrada', 1);
        $pdf->Cell(20, 5,  $row['QtdMovimentacao'], 1);
        $pdf->Cell(45, 5, $row['DataMovimentacao'], 1);
        $pdf->Cell(25, 5, $row['UsuarioNome'], 1);
        $pdf->Cell(15, 5, $row['MaterialNome'], 1);
        $pdf->Cell(45, 5, $row['FornecedorDataRegisto'], 1);
        $pdf->Ln();
    }
} else {
    $pdf->Cell(0, 10, 'No records found.', 0);
}

// Fechar e gerar o PDF
$pdf->Output('movimentacoes.pdf', 'D');
?>
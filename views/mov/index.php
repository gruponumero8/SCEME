<?php
require_once '../../App/auth.php';
require_once '../../layout/script.php';
require_once '../../App/Models/conexao.php';

echo $head;
echo $header;
echo $aside;
echo '<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Movimentações
      </h1>
      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Movimentações</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    ';
require '../../layout/alert.php';
if ($perm == 1){
echo '
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>
              <h1 class="box-title">Movimentação</h1>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <table id="example2" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">                
              <thead>
              <tr role="row">
                <th>Id da Movimentacao</th>
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Nome" style="width: 182px;">Tipo</th>        
                <th>Quantidade</th>
                <th> Data da Movimentacão</th>
                <th> Usuario</th>
                <th> Material</th>
                <th> Fornecedor e Data de Registro</th>
                 <th>Edit</th>
              </tr>
              </thead>
              <tbody>
              ';
             
                // SQL query with JOINs to fetch user and material names
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
        echo '<tr>';
        echo '<td> '.$row['IdMovimentacao'].'</td>';
        echo '<td>';
        echo ($row['Tipo'] == 0) ? 'Saida' : 'Entrada';
        echo '</td>';
        
        echo '<td>'.$row['QtdMovimentacao'].'</td>';
        echo '<td>'.$row['DataMovimentacao'].'</td>';
        
        // Display the names instead of IDs
        echo '<td>'.$row['UsuarioNome'].'</td>';
        echo '<td>'.$row['MaterialNome'].'</td>';
        echo '<td>'.$row['FornecedorDataRegisto'].'</td>'; // Exibe fornecedor e data de registro
        echo '<td>';
        echo'
        <form action="eliminar.php" method="POST"> 
        <button type="submit"  name ="eliminar" value="'.$row['IdMovimentacao'].'" > Eliminar</button>
        </form>
        ';
        echo '</td>';
        

          
       
     
        echo '</tr>';
    }
   echo' <a href="gerarpdf.php" type="button" class="btn btn-default pull-right"><i class="fa fa-file-pdf-o"></i> Gerar PDF</a>';
} else {
    echo '<tr><td colspan="8">No records found.</td></tr>'; // Adjusted colspan to account for new column
}

echo '</tbody>
        </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix no-border">
             <a href="addmov.php" type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add Movimentação</a>
            </div>
          </div>
';}else{

  echo ' <div class="col-md-12">  
          <div class="box box-primary">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Você não possui acesso!</h3>
            </div> 
            ';
}
echo '
          </div>
          <!-- /.box -->
          </div>
</div>';

echo '</div>';
echo '</section>';

echo '</div>';

echo  $footer;
echo $javascript;
?>
<?php
require_once '../../App/auth.php';
require_once '../../layout/script.php';
require_once '../../App/Models/conexao.php'; // Adicionei a conexão com o banco de dados

// Consulta para obter os fornecedores
$sqlFornecedor = "SELECT `IdFornecedor`, `FornecedorNome` FROM `fornecedor`"; // Supondo que você tenha uma tabela chamada 'fornecedor'
$resultFornecedor = mysqli_query($conn, $sqlFornecedor);

echo $head;
echo $header;
echo $aside;

echo '<div class="content-wrapper">';
echo '<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Adicionar <small>Material</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Material </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">';

       if ($perm == 1){

  echo ' <a href="./" class="btn btn-success">Voltar</a>
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">

            <div class="box-header with-border">
              <h3 class="box-title">Material</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
          
          
            <form role="form" action="../../App/Database/insertMat.php" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nome Material</label>
                  <input type="text" name="nomeMaterial" class="form-control" id="exampleInputEmail1" placeholder="Nome Material">
                </div>
                 
              <!-- /.box-body -->

              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Quantidade</label>
                  <input type="text" name="qtd" class="form-control" id="exampleInputEmail1" placeholder="Quantidade">
                </div>

                <div class="box-body">
                  <div class="form-group">
                    <label for="dataInput">Data</label>
                    <input type="date" name="data" class="form-control" id="dataInput" placeholder="Data">
                  </div>
                </div>

              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1"> Fornecedor</label>
                  <!-- Alterado para um select -->
                  <select name="IdFornecedor" class="form-control" id="exampleInputEmail1">
                    <option value="">Selecione um fornecedor</option>'; // Opção padrão
                    while ($dadosFornecedor = mysqli_fetch_assoc($resultFornecedor)) {
                        echo '<option value="' . $dadosFornecedor['IdFornecedor'] . '">' . $dadosFornecedor['FornecedorNome'] . '</option>';
                    }
echo '            </select>
                </div>
                 
              <!--verificar se vai uma variavel do id fornecedor-->

              <div class="box-footer">
                <button type="submit" name="update" class="btn btn-primary" value="Cadastrar">Cadastrar</button>
                <a class="btn btn-danger" href="../../views/">Cancelar</a>
              </div>
            </form>
          </div>
          <!-- /.box -->
          </div>
</div>';

} else{
  
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
echo '</div>';
echo '</section>';
echo '</div>';
echo  $footer;
echo $javascript;
?>
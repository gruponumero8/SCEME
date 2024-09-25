<?php
require_once '../../App/auth.php';
require_once '../../layout/script.php';
require_once '../../App/Models/conexao.php';

// Atualizando a consulta SQL para incluir Dataregisto
$sql = "SELECT m.IdMaterial, 
               CONCAT(m.MaterialNome, ' - ', f.FornecedorNome, ' - ', DATE_FORMAT(m.Dataregisto, '%Y-%m-%d')) AS MaterialFornecedor 
        FROM material m
        JOIN fornecedor f ON m.fkIdFornecedor = f.IdFornecedor";
$result = mysqli_query($conn, $sql);

$pd = "SELECT `IdUsuario`, `UsuarioNome` FROM `usuario`";
$resul = mysqli_query($conn, $pd);
echo $head;
echo $header;
echo $aside;

echo '<div class="content-wrapper">';
echo '<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Adicionar <small>Movimentação de Material</small>
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

echo '<a href="./" class="btn btn-success">Voltar</a>
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
            
            <form role="form" action="../../App/Database/insertmov.php" method="POST">
              <div class="box-body">
                <label for="tipo">Tipo</label>
                <div class="form-group">
                  <select name="tipo" class="form-control">
                    <option value="0">Saída</option>
                    <option value="1">Entrada</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="qtd">Quantidade</label>
                  <input type="text" name="qtd" class="form-control" id="qtd" placeholder="Quantidade">
                </div>

                <div class="form-group">
                  <label for="data">Data da movimentacão</label>
                  <input type="date" name="data" class="form-control" id="data" placeholder="Data">
                </div>

                <div class="form-group">
                    <input type="hidden" id="idUser" name="idUser" value="'.$idUsuario.'">
                    <input type="hidden" id="usur" name="usur" value="'.$username.'">
                </div>

                <div class="form-group">
                  <label for="movmaterial">Material</label>

                  <select name="movmaterial" class="form-control">
                    <option value="">Selecione um material</option>';
                    while ($dados = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $dados['IdMaterial'] . '">' . $dados['MaterialFornecedor'] . '</option>';
                    }
echo '            </select>
                </div>
                 
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="update" class="btn btn-primary" value="Cadastrar">Cadastrar</button>
                <a class="btn btn-danger" href="../../views/">Cancelar</a>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>';

echo '</div>';
echo '</div>';
echo '</section>';
echo '</div>';

echo $footer;
echo $javascript;
?>
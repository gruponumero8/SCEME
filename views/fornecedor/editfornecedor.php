<?php
require_once '../../App/auth.php';
require_once '../../layout/script.php';
require_once '../../App/Models/fornecedor.class.php';

echo $head;
echo $header;
echo $aside;
echo '<div class="content-wrapper">';
echo '<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Atualizar <small>Fornecedor</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Fornecedor</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">';

echo ' 
      <div class="row">
        <!-- left column -->
';

if ($perm == 1) {
    $idF = $_GET['q']; // Supõe que o ID do fornecedor é passado na URL
    $fornecedor = new Fornecedor();
    $resp = $fornecedor->editFornecedor($idF); // Obtém os dados do fornecedor

    echo '  
    <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Fornecedor</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="../../App/Database/insertfornecedor.php" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="fornecedorNome">Nome</label>
                  <input type="text" name="nome" class="form-control" id="fornecedorNome" placeholder="Nome do Fornecedor" value="' . $resp['nomeFornecedor'] . '">
                </div>

                <div class="form-group">
                  <label for="contacto">Contacto</label>
                  <input type="text" name="contacto" class="form-control" id="contacto" placeholder="Contacto do Fornecedor" value="' . $resp['Contacto'] . '">
                </div>

                <div class="form-group">
                  <label for="endereco">Endereço</label>
                  <input type="text" name="endereco" class="form-control" id="endereco" placeholder="Endereço do Fornecedor" value="' . $resp['Endereco'] . '">
                </div>          
                 
              </div>
              <!-- /.box-body -->

              <div class="box-footer">                
                <input type="hidden" id="idFornecedor" name="idF" value="' . $idF . '">
                <button type="submit" name="update" class="btn btn-primary">Atualizar</button>
                <a class="btn btn-danger" href="../../views/fornecedor/">Cancelar</a>
              </div>
            </form>';
} else {
    echo ' 
    <div class="col-md-12">  
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Você não possui acesso!</h3>
            </div> 
        </div>
    </div>';
}

echo '
          </div>
          <!-- /.box -->
          </div>
</div>';

echo '</section>';
echo '</div>';
echo  $footer;
echo $javascript;
?>
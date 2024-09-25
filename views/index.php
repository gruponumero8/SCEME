<?php
require_once '../App/auth.php';
require_once '../layout/script.php';
require_once '../App/Models/relatorios.class.php';

echo $head;

// Adicionando CSS para os gráficos
echo '
<style>
    #Grafico, #BarraGraph {
        height: 200px; /* Defina uma altura para os gráficos */
        background-color: #f0f0f0; /* Cor de fundo para visualização */
        margin: 20px 0; /* Margem vertical */
    }
    .grafico-container {
        display: flex; /* Usar flexbox para alinhar os gráficos lado a lado */
    }
    .grafico-container > div {
        flex: 1; /* Cada gráfico ocupa igualmente o espaço disponível */
        margin: 0 10px; /* Margem horizontal entre os gráficos */
    }
    .small-box {
        height: 100%; /* Garantir que o small-box ocupe toda a altura da coluna */
    }
</style>
';

echo $header;
echo $aside;
echo '<div class="content-wrapper">';

echo '<section class="content" style="height: auto !important; min-height: 0px !important;">';
if($perm == 1){
    echo'
    <!-- Main row -->
         <!-- Image and text center -->
        <div class="row">
          <div class="col-md-12 text-center">  
          <h2 style="text-align: center"> SISTEMA DE CONTROLE DE ESTOQUE DE MATERIAIS ESCOLAR-SCEME </h2>
          </div>
        </div>
  
        <div class="row" style="margin:20px;">
          <div class="col-lg-3 col-xs-6" style="margin-right: 100px;"> <!-- Aumentando a margem direita -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3>';
                $relatorios = new Relatorio();
                $resp1 = $relatorios->qtdStoque();
                echo $resp1;
                echo '</h3>
                <h4>TOTAL EM ESTOQUE (QTD)</h4>
                <br>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
          </div>
           <div class="col-lg-3 col-xs-6" style="margin-right: 100px;">
            <div class="small-box bg-green">
              <div class="inner">
                <h1>';
                $resp = $relatorios->qtdUser();
                echo $resp;
                echo '</h1>
                <h4>USUÁRIOS CADASTRADOS</h4>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
              <div class="inner">
                <h1>';
                $resp = $relatorios->entrada();
                echo $resp;
                echo '</h1>
                <h4>ENTRADAS EFECTUADAS</h4>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          
          <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
              <div class="inner">
                <h1>';
                $resp = $relatorios->saida();
                echo $resp;
                echo '</h1>
                <h4>SAÍDAS EFECTUADAS</h4>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          
        </div>

        <!-- Gráficos abaixo dos cartões -->
        <div class="row">
          <div class="col-md-12">
            <div class="grafico-container" style="margin:20px;">
                <div id="Grafico"></div>
                
                <div id="BarraGraph"></div>
            </div>
          </div>
        </div>

        <!-- /.row -->';
  
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
      </section>
  </div>';
  
echo $footer;
echo $javascript; 
?>
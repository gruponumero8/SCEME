<?php

  /*
    // Para utilização em hospedagem web
      
      $ref = explode('://', $_SERVER['HTTP_REFERER']);
      $ref = $ref[0].'://';
      $url = $ref.$_SERVER['HTTP_HOST'].'/views/';  
  */

  $url = 'http://localhost/tfc/views/'; // Remova em caso de utilizar o código para hospedagem web 
  require_once 'c:\xampp\htdocs\tfc\App\Models\relatorios.class.php';

  $grafico = new Relatorio();

  $dadosGrafico = $grafico->gerarJSON();
  $dadosGraph = $grafico->getQtdPorProduto();

  $head = '<!DOCTYPE html>
  <html>
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-language" content="pt-br" /> 
    <title> SCEME </title>

    <!-- Tell the browser to be responsive to screen width -->

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <!-- Bootstrap 3.3.6 -->
    
    <link rel="stylesheet" href="' . $url . 'bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="' . $url . 'plugins/datatables/dataTables.bootstrap.css">
  
    <!-- ]icones na area de mensagem -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    
    <!-- Estilo do Tema em geral -->
    <link rel="stylesheet" href="' . $url . 'dist/css/AdminLTE.min.css">

    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="' . $url . 'dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="' . $url . 'plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="' . $url . 'plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="' . $url . 'plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="' . $url . 'plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="' . $url . 'plugins/daterangepicker/daterangepicker.css">

    <link rel="stylesheet" href="' . $url . 'plugins/datatables/dataTables.bootstrap.css">
    
    
    
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="' . $url . 'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <script src="https://apis.google.com/js/platform.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- funções removidas aqui-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn\'t work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


  </head>
  <body class="skin-blue sidebar-mini" style="height: auto; min-height: 100%;">
  <div class="wrapper" style="height: auto; min-height: 100%;">';

  $header = '<header class="main-header">
      <!-- Logo -->
      <a href="' . $url . '"class="logo">

        <!-- mini logo para barra lateral mini 50x50 pixels -->
        <span class="logo-mini"><b>SCEME</b></span>

        <!-- logotipo para dispositivos móveis e de estado regular -->
        <span class="logo-lg"><b>SCEME</b></span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">

        <!-- Botão de alternância da barra lateral-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            

            

           
            <!-- Conta de usuário: o estilo pode ser encontrado em dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                
                <span class="hidden-xs">' . $username . '</span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <p>
                    ' . $username . ' - ';
  switch ($perm) {

    case 1:
      $header .= 'Administrador';
      break;
    case 2:
      $header .= 'Professor';
      break;
    case 3:
      $header .= 'Estudante';
      break;
  }

  $header .= ' <small>Membro desde Agosto de 2024</small>
                  </p>
                </li>
                
  
                <!-- Menu Footer-->
                <li class="user-footer">
                  
                <div class="pull-right">
                  <a href="' . $url . 'destroy.php" class="btn btn-default btn-flat">Sair</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>';

$aside = '<!-- Coluna lateral esquerda. contém o logotipo e a barra lateral -->
  <aside class="main-sidebar">
    <!-- barra lateral: estilo pode ser encontrado em sidebar -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">

      
          
          <a href="#"><i class="fa fa-circle text-success"></i> Online - ' . $username .'</a>
        
      </div>
   
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">

        <li class="header">NAVEGAÇÃO PRINCIPAL</li>
        <li class="active treeview">
          <a href="' . $url . '">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>  
        </li>
        
<!-- Material -->

        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i>
            <span>Material</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="' . $url . 'material/"><i class="fa fa-circle-o"></i>Material</a></li>
            <li><a href="' . $url . 'material/addMat.php"><i class="fa fa-circle-o"></i>Add Material</a></li>
            <li><a href="' . $url . 'mov/index.php"><i class="fa fa-circle-o"></i>Movimentações</a></li>
            <li><a href="' . $url . 'mov/addmov.php"><i class="fa fa-circle-o"></i>Add Movimentação </a></li>
          </ul>
        </li>

        

        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i>
            <span>Fornecedor</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="' . $url . 'fornecedor/"><i class="fa fa-circle-o"></i> Fornecedor </a></li>
            <li><a href="' . $url . 'fornecedor/addfornecedor.php"><i class="fa fa-circle-o"></i>Add Fornecedor </a></li>
          </ul>
        </li>

                <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i>

            <span>Usuários</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="' . $url . 'usuarios/"><i class="fa fa-circle-o"></i>Lista</a></li>
            <li><a href="' . $url . 'usuarios/addusuarios.php"><i class="fa fa-circle-o"></i>Add Usuários</a></li>
          </ul>
        </li>

          
     

        
        </ul>
    </section>
    <!-- /.sidebar -->
  </aside>';

$footer = '<footer class="main-footer">
    
    <strong> 2023-2024 SCEME .</strong> 
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
  
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        
      </div>
     
    </div>
  </aside>

  
  ';

$javascript = '

  </div>
<!-- jQuery 2.2.3 -->
<script src="https://code.jquery.com/jquery-2.2.3.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge(\'uibutton\', $.ui.button);
</script>

<!-- Bootstrap 3.3.6 -->
<script src="' . $url . 'bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="' . $url . 'plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="' . $url . 'plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="' . $url . 'plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="' . $url . 'plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="' . $url . 'plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="' . $url . 'plugins/datatables/jquery.dataTables.min.js"></script>
<script src="' . $url . 'plugins/datatables/dataTables.bootstrap.min.js"></script>

<script src="' . $url . 'plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="' . $url . 'plugins/datepicker/bootstrap-datepicker.js"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="' . $url . 'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="' . $url . 'plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="' . $url . 'plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="' . $url . 'dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="' . $url . 'dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="' . $url . 'dist/js/demo.js"></script>
<script>

<!-- Gráficos Apex -->

  var dados = '. $dadosGrafico .';
  var options = {
    series: [{
      name: "Movimentações Mensais",
      data: dados.qtd
    }],
    chart: {
      height: 350,
      type: "line",
      zoom: {
        enabled: false
      }
    },
    dataLabels: {
      enabled: false
    },
    stroke: {
      curve: "straight"
    },
    title: {
      text: "Movimentações por Periódo",
      align: "left"
    },
    grid: {
      row: {
        colors: ["#f3f3f3", "transparent"], // takes an array which will be repeated on columns
        opacity: 0.5
      },
    },
    xaxis: {
      categories: dados.meses,
    }
  };

  var chart = new ApexCharts(document.querySelector("#Grafico"), options);
  chart.render();
   var Graph = ' . $dadosGraph . ' 
  var options2 = {
      series: [{
      name: "Qtd",
      data: Graph.qtd
    }],
      chart: {
      type: "bar",
      height: 350
    },
    plotOptions: {
      bar: {
        borderRadius: 4,
        borderRadiusApplication: "end",
        horizontal: true,
      }
    },
    dataLabels: {
      enabled: false
    },
    xaxis: {
      categories: Graph.Produtos,
    }
    };
    

    var chart2 = new ApexCharts(document.querySelector("#BarraGraph"), options2);
    chart2.render();
  
 
</script>

</body>
</html>
';

<?php
require_once '../../App/auth.php';
require_once '../../layout/script.php';
require_once '../../App/Models/fornecedor.class.php';

echo $head;
echo $header;
echo $aside;
echo '<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Fornecedor
      </h1>
      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Fornecedores</li>
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
              <h3 class="box-title">Lista dos Fornecedores</h3>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <table id="example2" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">                
              <thead>
              <tr role="row">
                <th>Id</th>
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Nome" style="width: 182px;">Nome</th>        
                <th>Contacto</th>
                <th> Endereço</th>
                <th>Edit</th>
              </tr>
              </thead>
              <tbody>
              ';

               $resp = $fornecedor->index($perm);
               $resps = json_decode($resp, true);
               
               foreach ($resps as $row) {
                 
                if(isset($row['IdFornecedor']) != NULL){
                echo '<tr>';
                echo '<td>'.$row['IdFornecedor'].'</td>';
                echo '<td>'.$row['FornecedorNome'].'</td>';
                echo '<td>'.$row['Contacto']. '</td>';
                
                echo '<td>'.$row['Endereco'].'</td>';
                echo '<td>';
                echo'<a href="editfornecedor.php?q='.$row['IdFornecedor'].'</a>"><button>Edit</button></a>';
                echo'

                <form action="eliminar.php" method="POST"> 
                <button type="submit"  name ="eliminar" value="'.$row['IdFornecedor'].'" > Eliminar</button>
                </form>
                ';
                echo '</td>';
                echo '</tr>';
              }

               }

        echo '</tbody>
        </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix no-border">
             <a href="addfornecedor.php" type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add Fornecedores</a>
            </div>
          </div>
   
';}
else{

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
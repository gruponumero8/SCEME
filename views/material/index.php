<?php
require_once '../../App/auth.php';
require_once '../../layout/script.php';
require_once '../../App/Models/material.class.php';

echo $head;
echo $header;
echo $aside;
echo '<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Material
      </h1>
      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Material</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    ';
    require '../../layout/alert.php';

    if($perm==1){
    echo '
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>
              <h3 class="box-title">Lista dos Materiais</h3>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <table id="example2" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">                
              <thead>
              <tr role="row">
                <th>Id</th>
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Nome" style="width: 182px;">Nome do Material</th>        
               
                <th> Quantidade</th>
                <th> Fornecedor</th>
                <th> Data</th>
                <th>Edit</th>
                
              </tr>
              </thead>
              <tbody>
              ';

               $resp = $material->index($perm);
               $resps = json_decode($resp, true);
               
               foreach ($resps as $row) {
                 
                if(isset($row['IdMaterial']) != NULL){
                echo '<tr>';
                echo '<td>'.$row['IdMaterial'].'</td>';
                echo '<td>'.$row['MaterialNome'].'</td>';
                echo '<td>'.$row['QtdMaterial']. '</td>';
                echo '<td>'.$row['FornecedorNome'].'</td>';
                echo '<td>'.$row['Dataregisto'].'</td>';
                echo '<td>';
                echo'
                <form action="eliminar.php" method="POST"> 
                <button type="submit"  name ="eliminar" value="'.$row['IdMaterial'].'" > Eliminar</button>
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
             <a href="addMat.php" type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add Materiais</a>
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
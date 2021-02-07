<?php
include("phpclasses/conexao.php");
include("phpclasses/header.php");

$querySelect = "select distinct reu from controle_de_honorarios_csv";

$arrayObj = mysqli_query($conn, $querySelect);
$obj = mysqli_fetch_assoc($arrayObj);

mysqli_query($conn, "SET NAMES 'utf8'");
mysqli_query($conn, 'SET character_set_connection=utf8');
mysqli_query($conn, 'SET character_set_client=utf8');
mysqli_query($conn, 'SET character_set_results=utf8');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item text-info active" aria-current="page"><strong>Tela de Alteração</strong></li>
            </ol>
          </nav>
        </div><!-- /.col -->
        <!--<div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div>-->
        <!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <?php
  $numeroProcesso = $_REQUEST['id'];
  $query = "select * from controle_de_honorarios_csv where numeroProcesso = '$numeroProcesso'";
  mysqli_query($conn, "SET NAMES 'utf8'");
  mysqli_query($conn, 'SET character_set_connection=utf8');
  mysqli_query($conn, 'SET character_set_client=utf8');
  mysqli_query($conn, 'SET character_set_results=utf8');
  $resultado = mysqli_query($conn, $query);
  $registro = mysqli_fetch_assoc($resultado);
  ?>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="card col-12">
          <div class="card-header text-center">
            <h3><i style="margin-right:10px;" class="fas fa-user-edit"></i>Alterar Registro</h3>
          </div>
          <div class="card-body">
            <?php include("pages/forms/formAlteracao.php"); ?>
          </div>
        </div>

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.control-sidebar -->
<?php include("phpclasses/footer.php") ?>
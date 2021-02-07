<?php
include("phpclasses/conexao.php");
include("phpclasses/header.php");

$querySelect = "select * from controle_de_honorarios_csv";

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
      <div class="row">
        <div class="col-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item text-info active" aria-current="page"><strong>Tela de Inclusão</strong></li>
            </ol>
          </nav>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="card border-primary col-12">
          <div class="card-header text-center">
            <h3><i style="margin-right:10px" class="fas fa-user-plus"></i>Incluir Registro</h3>
          </div>
          <div class="card-body">
            <?php include("pages/forms/formInclusao.php"); ?>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<?php include("phpclasses/footer.php") ?>
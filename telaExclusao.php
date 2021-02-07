<?php include("phpclasses/conexao.php") ?>
<?php include("phpclasses/header.php") ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item text-info active" aria-current="page"><strong>Tela de Exclusão</strong></li>
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
        <div class="card border-success col-12">
          <div class="card-header text-center">
            <h3><i class="fas fa-user-times" style="margin-right:10px;"></i>Excluir Registro</h3>
          </div>
          <div class="card-body">
            <?php include("pages/forms/formExclusao.php"); ?>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<?php include("phpclasses/footer.php") ?>
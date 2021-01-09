<?php include("phpclasses/conexao.php")?>
<?php include("phpclasses/header.php")?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-white">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item text-info"><a href="telaHistoricoHonorario.php"><strong>Histórico Honorários</strong></a></li>
                <li class="breadcrumb-item text-info active" aria-current="page"><strong>Recuperação Honorários</strong></li>
              </ol>
            </nav>
            <hr>
          </div><!-- /.col -->
          <!--<div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div>--><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <?php 
        $numeroProcesso = $_REQUEST['id'];
        $query = "select * from controle_de_honorarios_esp where numeroProcesso = '$numeroProcesso'";
        mysqli_query($conn,"SET NAMES 'utf8'");
        mysqli_query($conn,'SET character_set_connection=utf8');
        mysqli_query($conn,'SET character_set_client=utf8');
        mysqli_query($conn,'SET character_set_results=utf8');
        $resultado = mysqli_query($conn,$query);
        $registro = mysqli_fetch_assoc($resultado);

    ?>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-6 offset-md-3">
                <!--<div class="card-header text-info text-center"><h3><i style="margin-right:10px;" class="fas fa-user-edit"></i>Recuperar Registro</h3></div>-->
                    <div class="card-body">
                        <form method="POST" class="text-center">  
                            <p><strong>Numero Processo:</strong></p>
                            <p><?php echo $registro['numeroProcesso'] ?></p>
                            <p><strong>Autor:</strong></p>
                            <p><?php echo $registro['autor'] ?></p>
                            <p><strong>Réu:</strong></p>
                            <p><?php echo $registro['reu'] ?></p>
                            <p><strong>Valor:</strong></p>
                            <p><?php echo $registro['valor'] ?></p>
                            <p><strong>Situação:</strong></p>
                            <p><?php echo $registro['situacao'] ?></p>
                            <p><strong>Colaborador:</strong></p>
                            <p><?php echo $registro['perito'] ?></p>
                            <a href="phpclasses/recuperaHonorario.php?id='<?php echo $registro["numeroProcesso"]?>'">
                              <button type="button" class="btn btn-outline-primary"><i style="margin-right:10px;" class="far fa-share-square"></i>Recuperar</button>
                            </a>
                            <a href="telaHistoricoHonorario.php"><button type="button" class="btn btn-outline-danger"><i style="margin-right:10px;" class="far fa-times-circle"></i>Cancelar</button></a>
                        </form>                      
                    </div>
                </div>
          
            </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include("phpclasses/footer.php")?>
<?php include("phpclasses/conexao.php")?>
<?php include("phpclasses/header.php")?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tela de Alteração</h1>
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
        $query = "select * from registro where numeroProcesso = '$numeroProcesso'";
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
            <div class="card border-success col-12">
                <div class="card-header bg-info text-center"><h3><i style="margin-right:10px;" class="fas fa-user-edit"></i>Alterar Registro</h3></div>
                    <div class="card-body">
                        <form method="POST" class="offset-md-4" action="phpclasses/alterarRegistro.php">
                            <div class="form-group">
                                <label for="numeroProcesso" hidden>Número do Processo</label>
                                <input class="form-control form-control-sm  col-6" value="<?php echo $registro['numeroProcesso'] ?>" type="text" name="numeroProcesso" placeholder="" required hidden>
                            </div>
                            <div class="form-group">
                                <label for="autor">Autor</label>
                                <input class="form-control form-control-sm col-6" value="<?php echo $registro['autor'] ?>" type="text" name="autor" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="reu">Réu</label>
                                <input class="form-control form-control-sm col-6" value="<?php echo $registro['reu'] ?>" type="text" name="reu" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="valor">Valor</label>
                                <input class="form-control form-control-sm col-6" value="<?php echo $registro['valor'] ?>" type="text" name="valor" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="situacao">Situação</label>
                                <input class="form-control form-control-sm col-6" value="<?php echo $registro['situacao'] ?>" type="text" name="situacao" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="perito">Perito</label>
                                <input class="form-control form-control-sm col-6" value="<?php echo $registro['perito'] ?>" type="text" name="perito" placeholder="">
                            </div>
                            <button type="submit" class="btn btn-outline-primary"><i style="margin-right:10px;" class="far fa-share-square"></i>Salvar</button>
                            <a href="starter.php"><button type="button" class="btn btn-outline-danger"><i style="margin-right:10px;" class="far fa-times-circle"></i>Cancelar</button></a>
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

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <?php include("phpclasses/footer.php")?>
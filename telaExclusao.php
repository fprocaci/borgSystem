<?php include("phpclasses/conexao.php")?>
<?php include("phpclasses/header.php")?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tela de Exclusão</h1>
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
        $query = "select * from controle_de_honorarios_csv where numeroProcesso = '$numeroProcesso'";
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
                <div class="card-header bg-info text-center"><h3><i class="fas fa-user-times" style="margin-right:10px;"></i>Excluir Registro</h3></div>
                    <div class="card-body">
                        <form class="offset-md-4">
                            <div class="form-group">
                                <label for="numeroProcesso">Número do Processo</label>
                                <input  class="form-control form-control-sm col-6" value="<?php echo $registro['numeroProcesso'] ?>" type="text" name="numeroProcesso" placeholder="" required disabled>
                            </div>
                            <div class="form-group">
                                <label for="autor">Autor</label>
                                <input class="form-control form-control-sm col-6" value="<?php echo $registro['autor'] ?>" type="text" name="autor" placeholder="" required disabled>
                            </div>
                            <div class="form-group">
                                <label for="reu">Réu</label>
                                <input class="form-control form-control-sm col-6" value="<?php echo $registro['reu'] ?>" type="text" name="reu" placeholder="" required disabled>
                            </div>
                            <div class="form-group">
                                <label for="valor">Valor</label>
                                <input class="form-control form-control-sm col-6" value="<?php echo $registro['valor'] ?>" type="text" name="valor" placeholder="" required disabled>
                            </div>
                            <div class="form-group">
                                <label for="situacao">Situação</label>
                                <input class="form-control  form-control-sm col-6" value="<?php echo $registro['situacao'] ?>" type="text" name="situacao" placeholder="" required disabled>
                            </div>
                            <div class="form-group">
                                <label for="perito">Perito</label>
                                <input class="form-control form-control-sm col-6" value="<?php echo $registro['perito'] ?>" type="text" name="perito" placeholder="" disabled>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <label for="option1">Ajuda de Custo</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="flagCusto" id="inlineRadio1" value="S" <?php if($registro["flagCusto"] == "S")
                              {echo "checked";}?> disabled>
                                <label class="form-check-label" for="inlineRadio1">Sim</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="flagCusto" id="inlineRadio2" value="N" <?php if($registro["flagCusto"] == "N")
                              {echo "checked";}?> disabled>
                                <label class="form-check-label" for="inlineRadio2">Não</label>
                              </div>
                            </div>
                            <a href="phpclasses/excluirRegistro.php?id='<?php echo $registro["numeroProcesso"]?>'">
                              <button type="button" class="btn btn-outline-primary">
                                <i class="fas fa-trash-alt" style="margin-right:10px;"></i>
                                Excluir
                              </button>
                            </a>
                            <a href="starter.php">
                              <button type="button" class="btn btn-outline-danger">
                                <i class="far fa-times-circle" style="margin-right:10px;"></i>
                                Cancelar
                              </button>
                            </a>
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
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Recipient:</label>
              <input type="text" class="form-control" id="recipient-name">
            </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Message:</label>
              <textarea class="form-control" id="message-text"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Send message</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal End -->
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
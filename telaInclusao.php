<?php include("phpclasses/conexao.php")?>
<?php include("phpclasses/header.php")?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tela de Inclusão</h1>
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
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="card border-success col-12">
                <div class="card-header bg-info text-center"><h3><i style="margin-right:10px" class="fas fa-user-plus"></i>Incluir Registro</h3></div>
                    <div class="card-body">
                        <form method="POST" class="offset-md-4" action="phpclasses/incluirRegistro.php">
                            <div class="form-group">
                                <label for="numeroProcesso">Número do Processo</label>
                                <input class="form-control form-control-sm col-6" type="text" name="numeroProcesso" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="autor">Autor</label>
                                <input class="form-control form-control-sm col-6" type="text" name="autor" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="reu">Réu</label>
                                <input class="form-control form-control-sm col-6" type="text" name="reu" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="valor">Valor</label>
                                <input class="form-control form-control-sm col-6" type="text" name="valor" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="situacao">Situação</label>
                                <input class="form-control form-control-sm col-6" type="text" name="situacao" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="perito">Perito</label>
                                <input class="form-control form-control-sm col-6" type="text" name="perito" placeholder="">
                            </div>
  
                            <div class="form-group">
                              <div class="row">
                                <label for="option1">Ajuda de Custo</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="flagCusto" id="inlineRadio1" value="S">
                                <label class="form-check-label" for="inlineRadio1">Sim</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="flagCusto" id="inlineRadio2" value="N">
                                <label class="form-check-label" for="inlineRadio2">Não</label>
                              </div>
                            </div>
                              
                            
                            <button type="submit" class="btn btn-outline-primary">
                              <i class="fas fa-plus" style="margin-right:10px;"></i>
                              Incluir
                            </button>
                            <a href="starter.php">
                              <button type="button" class="btn btn-outline-danger">
                                <i class="fas fa-times" style="margin-right:10px;"></i>
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
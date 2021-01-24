<?php 
    include("phpclasses/conexao.php");
    include("phpclasses/header.php");

    $querySelect = "select * from controle_de_honorarios_csv";
    
    $arrayObj = mysqli_query($conn,$querySelect);
    $obj = mysqli_fetch_assoc($arrayObj);
    
    mysqli_query($conn,"SET NAMES 'utf8'");
    mysqli_query($conn,'SET character_set_connection=utf8');
    mysqli_query($conn,'SET character_set_client=utf8');
    mysqli_query($conn,'SET character_set_results=utf8');

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
                <div class="card-header text-center"><h3><i style="margin-right:10px" class="fas fa-user-plus"></i>Incluir Registro</h3></div>
                    <div class="card-body">
                        <form method="POST" class="offset-md-4" action="phpclasses/incluirRegistro.php">
                            <div class="form-group">
                                <label for="numeroProcesso" class="form-label">Número do Processo</label>
                                <input class="form-control form-control-sm col-6" type="text" name="numeroProcesso" 
                                autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="autor" class="form-label">Autor</label>
                                <input class="form-control form-control-sm col-6" type="text" name="autor"
                                autocomplete="off" required>
                            </div>
                            <!--

                              -- Input text 
                            <div class="form-group">
                                <label for="reu">Réu</label>
                                <input class="form-control form-control-sm col-6" type="text" name="reu"
                                autocomplete="off" required>
                            </div>
                            -->


                            <!-- Datalist Réu --> 
                            <label for="exampleDataList" class="form-label">Réu</label>
                            <input class="form-control mb-3 col-6" list="datalistOptions" autocomplete="off" name="reu" id="exampleDataList">
                            <datalist id="datalistOptions">
                              <?php 
                                while($row = $arrayObj -> fetch_assoc()) {
                                  echo '<option value="'.$row["reu"].'">';
                                }
                              ?>
                            </datalist>
                            <label for="valor">Valor</label>
                            <div class="input-group mb-3">
                                <span for="valor" class="input-group-text">Salarios Minimos</span>
                                <input class="form-control col-2"
                                 type="number" name="valor" placeholder="" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="situacao" class="form-label">Situação</label>
                                <input class="form-control form-control-sm col-6" type="text" name="situacao" 
                                autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="perito" class="form-label">Perito</label>
                                <input class="form-control form-control-sm col-6" type="text" name="perito" 
                                autocomplete="off">
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
  <?php include("phpclasses/footer.php")?>
<?php 
  include("phpclasses/conexao.php");
  include("phpclasses/header.php");
  
  $querySelect = "select distinct reu from controle_de_honorarios_csv";
    
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
            <div class="card col-12">
                <div class="card-header text-center"><h3><i style="margin-right:10px;" class="fas fa-user-edit"></i>Alterar Registro</h3></div>
                    <div class="card-body">
                        <form method="POST" class="offset-md-4" action="phpclasses/alterarRegistro.php">
                            <div class="form-group">
                                <label for="numeroProcesso" hidden>Número do Processo</label>
                                <input class="form-control form-control-sm  col-6" value="<?php echo $registro['numeroProcesso'] ?>" 
                                type="text" name="numeroProcesso" placeholder="" required hidden autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="autor">Autor</label>
                                <input class="form-control form-control-sm col-6" value="<?php echo $registro['autor'] ?>" 
                                type="text" name="autor" placeholder="" required autocomplete="off">
                            </div>
                            <!-- Datalist Réu --> 
                            <label for="exampleDataList" class="form-label">Réu</label>
                            <input class="form-control mb-3 col-6" autocomplete="off" list="datalistOptions" value="<?php echo $registro['reu'] ?>" name="reu" id="exampleDataList">
                            <datalist id="datalistOptions">
                              <?php 
                                while($row = $arrayObj -> fetch_assoc()) {
                                  echo '<option value="'.$row["reu"].'">';
                                }
                              ?>
                            </datalist>
                            <!--Salarios minimos -->
                            <label for="valor">Valor</label>
                            <div class="input-group mb-3">
                                <span for="valor" class="input-group-text">Salarios Minimos</span>
                                <input class="form-control col-2" value="<?php 
                                  echo round($registro['valor']/1100);
                                ?>"
                                 type="number" name="valor" placeholder="" required autocomplete="off">
                            </div>
                            <!--
                            <div class="form-group">
                                <label for="valor">Valor</label>
                                <input class="form-control form-control-sm col-6" value="<?php echo $registro['valor'] ?>"
                                 type="text" name="valor" placeholder="" required autocomplete="off">
                            </div>
                            -->
                            <div class="form-group">
                                <label for="situacao">Situação</label>
                                <input class="form-control form-control-sm col-6" value="<?php echo $registro['situacao'] ?>"
                                 type="text" name="situacao" placeholder="" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="perito">Colaborador</label>
                                <input class="form-control form-control-sm col-6" value="<?php echo $registro['perito'] ?>" 
                                type="text" name="perito" placeholder="" autocomplete="off">
                            </div>
                            <!--div class="form-group">
                              <div class="row">
                                <label for="option1">Ajuda de Custo</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="flagCusto" id="inlineRadio1" value="S" <?php /*if($registro["flagCusto"] == "S")
                              {echo "checked";}*/ ?>>
                                <label class="form-check-label" for="inlineRadio1">Sim</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="flagCusto" id="inlineRadio2" value="N" <?php /* if($registro["flagCusto"] == "N")
                              {echo "checked";}*/ ?>>
                                <label class="form-check-label" for="inlineRadio2">Não</label>
                              </div>
                            </div>-->
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
  <!-- /.control-sidebar -->
  <?php include("phpclasses/footer.php")?>
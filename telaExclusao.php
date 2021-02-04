<?php include("phpclasses/conexao.php")?>
<?php include("phpclasses/header.php")?>


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
                <div class="card-header text-center"><h3><i class="fas fa-user-times" style="margin-right:10px;"></i>Excluir Registro</h3></div>
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
                            <label for="valor">Valor</label>
                            <div class="input-group mb-3">
                                <span for="valor" class="input-group-text">Salarios Minimos</span>
                                <input class="form-control col-2" value="<?php 
                                  echo round($registro['valor']/1100);
                                ?>"
                                 type="number" name="valor" placeholder="" required disabled autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="situacao">Situação</label>
                                <input class="form-control  form-control-sm col-6" value="<?php echo $registro['situacao'] ?>" type="text" name="situacao" placeholder="" required disabled>
                            </div>
                            <div class="form-group">
                                <label for="perito">Colaborador</label>
                                <input class="form-control form-control-sm col-6" value="<?php echo $registro['perito'] ?>" type="text" name="perito" placeholder="" disabled>
                            </div>
                            <!--
                            <div class="form-group">
                              <div class="row">
                                <label for="option1">Ajuda de Custo</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="flagCusto" id="inlineRadio1" value="S" <?php /* if($registro["flagCusto"] == "S")
                              {echo "checked";} */?> disabled>
                                <label class="form-check-label" for="inlineRadio1">Sim</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="flagCusto" id="inlineRadio2" value="N" <?php /* if($registro["flagCusto"] == "N")
                              {echo "checked";}*/ ?> disabled>
                                <label class="form-check-label" for="inlineRadio2">Não</label>
                              </div>
                            </div>
                            -->
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
        </div>
    </div>
  </div>
  <?php include("phpclasses/footer.php")?>
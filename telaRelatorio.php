<?php include("phpclasses/conexao.php")?>
<?php include("phpclasses/header.php")?>
<?php 
    $sql = 'SELECT distinct(perito) FROM registro';
    $resultColaborador = mysqli_query($conn, $sql);
    $valorTotal = 0;

    if(isset($_POST["colaborador"]) && isset($_POST["mes"]) && isset($_POST["ano"])) {
      $colaborador = $_POST["colaborador"];
      $mes = $_POST["mes"];
      $ano = $_POST["ano"];
      $sqlRelatorio = "SELECT * FROM registro where perito = '$colaborador' and dhinclusao like '$ano-$mes%'";
      $resultRelatorio = mysqli_query($conn, $sqlRelatorio);
    }
?>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tela de Relatório</h1>
            <hr>
          </div>
        </div>
      </div>
    </div>

    <form class="col-9" method="POST" action="<?php $_PHP_SELF ?>">
        <div class="container">
            <div class="row">
                <div class="col">
                    <label class="input-group-text bg-info" for="inputGroupSelect01">Colaborador</label>
                    <select class="form-select" name="colaborador">
                        <option value="" selected>Selecione...</option>
                        <?php   
                            if (mysqli_num_rows($resultColaborador) > 0) {
                                while($rowColaborador = mysqli_fetch_assoc($resultColaborador)) {
                                    echo "<option value=".$rowColaborador["perito"].">".$rowColaborador["perito"]."</option>";
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="col">
                    <label class="input-group-text bg-info" for="inputGroupSelect01">Mês</label>
                    <select class="form-select" name="mes">
                        <option value="" selected>Selecione...</option>
                        <option value="01">Janeiro</option>
                        <option value="02">Fevereiro</option>
                        <option value="03">Março</option>
                        <option value="04">Abril</option>
                        <option value="05">Maio</option>
                        <option value="06">Junho</option>
                        <option value="07">Julho</option>
                        <option value="08">Agosto</option>
                        <option value="09">Setembro</option>
                        <option value="10">Outubro</option>
                        <option value="11">Novembro</option>
                        <option value="12">Dezembro</option>
                    </select>
                </div>
                <div class="col">
                    <label class="input-group-text bg-info" for="inputGroupSelect01">Ano</label>
                    <select class="form-select" name="ano">
                        <option value="" selected>Selecione...</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-secondary">Gerar Relatório</button>
                </div>
            </div>
        </div>
    </form>
    <div class="container">
    <?php
        if(isset($_POST["colaborador"]) && isset($_POST["mes"]) && isset($_POST["ano"])) {
    ?>      <div class="card col-9 border-light mb-3" style="margin-top:10px;">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12">
                            <h4>Relatório:</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    
                    <div class="row">
                        <div class="col">
                            <strong>Numero do Processo</strong>    
                        </div>
                        <div class="col">
                            <strong>Perito</strong>    
                        </div>
                        <div class="col">
                            <strong>Valor laudo</strong>    
                        </div>
                        <div class="col">
                            <strong>Data</strong>    
                        </div>
                    </div>
                <?php 
                    if (mysqli_num_rows($resultRelatorio) > 0) {
                        while($rowRelatorio = mysqli_fetch_assoc($resultRelatorio)) {
                ?>
                            <div class="row">
                                <div class="col">
                                    <?php echo $rowRelatorio["numeroProcesso"];?>     
                                </div>
                                <div class="col">
                                    <?php echo $rowRelatorio["perito"];?>    
                                </div>
                                <div class="col">
                                    R$:400    
                                </div>
                                <div class="col">
                                    <?php echo "".substr($rowRelatorio["dhinclusao"],8,2)."/".substr($rowRelatorio["dhinclusao"],5,2)."/".substr($rowRelatorio["dhinclusao"],0,4)."";?>    
                                </div>
                            </div>
                            
                <?php            
                        $valorTotal = 400 + $valorTotal;
                        }
                ?>
                    <br>
                    <div class="row">
                        <div class="col">
                            <strong>Valor Total: R$<?php echo $valorTotal;?></strong>
                        </div>
                    </div>
                <?php
                    }
                ?>
                </div>
            </div>
    <?php    
        }
    ?>
            </div>
            </div>
  </div>
  <?php include("phpclasses/footer.php")?>
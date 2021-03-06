<?php

$queryGetSalarioMinimo = "select * from configuration";

$objSalarioMinimo = mysqli_query($conn, $queryGetSalarioMinimo);

?>

<form method="POST" class="offset-md-4" action="phpclasses/alterarRegistro.php">
    <div class="form-group">
        <label for="numeroProcesso" hidden>Número do Processo</label>
        <input class="form-control form-control-sm  col-6" value="<?php echo $registro['numeroProcesso'] ?>" type="text" name="numeroProcesso" placeholder="" required hidden autocomplete="off">
    </div>
    <div class="form-group">
        <label for="autor">Autor</label>
        <input class="form-control form-control-sm col-6" value="<?php echo $registro['autor'] ?>" type="text" name="autor" placeholder="" required autocomplete="off">
    </div>
    <!-- Datalist Réu -->
    <label for="exampleDataList" class="form-label">Réu</label>
    <input class="form-control mb-3 col-6" autocomplete="off" list="datalistOptions" value="<?php echo $registro['reu'] ?>" name="reu" id="exampleDataList">
    <datalist id="datalistOptions">
        <?php
        while ($row = $arrayObj->fetch_assoc()) {
            echo '<option value="' . $row["reu"] . '">';
        }
        ?>
    </datalist>
    <!--Salarios minimos -->
    <!--<label for="valor">Valor</label>
    <div class="input-group mb-3">
        <input class="form-control col-2" value="<?php
                                                    /* echo $registro["valor"]; */
                                                    ?>" type="number" name="valor" placeholder="" required autocomplete="off">

    </div>
    -->
      <div class="form-group">
          <label for="valor">Valor</label>
          <input class="form-control form-control-sm col-6" value="<?php echo $registro['valor'] ?>"
          type="number" name="valor" placeholder="" required autocomplete="off">
      </div>
    <!--<div class="form-group">
        <label for="situacao">Situação</label>
        <input class="form-control form-control-sm col-6" value="<?php echo $registro['situacao'] ?>" type="text" name="situacao" placeholder="" autocomplete="off">
    </div>-->
    <div class="form-group">
      <label for="perito">Colaborador</label>
        <?/*
        while ($row = mysqli_fetch_assoc($arrayColaborador)) {
            echo $row["login"];
        }*/
        ?>

      <!--
      </select> -->
        
      <input class="form-control form-control-sm col-6" value="<?php echo $registro['perito'] ?>" type="text" name="perito" placeholder="" autocomplete="off">
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
    
    <a href="starter.php">
      <button type="button" class="btn btn-secondary col-3">
        <!--<i style="margin-right:10px;" class="far fa-times-circle"></i>-->
        Cancelar
      </button>
    </a>
    <button type="submit" class="btn btn-primary col-3">
      <!--<i style="margin-right:10px;" class="far fa-share-square"></i>-->
      Salvar
    </button>
</form>
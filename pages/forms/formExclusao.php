<?php

$queryGetSalarioMinimo = "select * from configuration";

$objSalarioMinimo = mysqli_query($conn, $queryGetSalarioMinimo);

?>

<form class="offset-md-4">
    <div class="form-group">
        <label for="numeroProcesso">Número do Processo</label>
        <input class="form-control form-control-sm col-6" value="<?php echo $registro['numeroProcesso'] ?>" type="text" name="numeroProcesso" placeholder="" required disabled>
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
        <input class="form-control col-6" value="<?php
                                                    echo $registro['valor'];
                                                    ?>" type="number" name="valor" placeholder="" required disabled autocomplete="off">
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
                              {echo "checked";} */ ?> disabled>
                                <label class="form-check-label" for="inlineRadio1">Sim</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="flagCusto" id="inlineRadio2" value="N" <?php /* if($registro["flagCusto"] == "N")
                              {echo "checked";}*/ ?> disabled>
                                <label class="form-check-label" for="inlineRadio2">Não</label>
                              </div>
                            </div>
                            --> 
    <a href="starter.php">
        <button type="button" class="btn btn-secondary col-3">
            <!--<i class="far fa-times-circle" style="margin-right:10px;"></i>-->
            Cancelar
        </button>
    </a>
    <a href="phpclasses/excluirRegistro.php?id='<?php echo $registro["numeroProcesso"] ?>'">
        <button type="button" class="btn btn-primary col-3">
            <!--<i class="fas fa-trash-alt" style="margin-right:10px;"></i>-->
            Excluir
        </button>
    </a>
</form>
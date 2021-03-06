<?php
    $query = "select * from configuration";
    
    $resultado = mysqli_query($conn,$query);
    mysqli_query($conn,"SET NAMES 'utf8'");
    mysqli_query($conn,'SET character_set_connection=utf8');
    mysqli_query($conn,'SET character_set_client=utf8');
    mysqli_query($conn,'SET character_set_results=utf8');
?>

<div class="collapse col-4" id="salarioMinimo">
    <div class="card-header text-info text-center"><h3>Alterar Salário Minimo</h3></div>
        <div class="card-body">
            <form method="POST" action="phpclasses/alteraSalarioMinimo.php">
                <div class="input-group mb-3">
                    <span class="input-group-text">Salario Minimo Atual:</span>
                    <?php 
                        while($row = $resultado -> fetch_assoc()) {
                            echo '<input type="text" disabled class="form-control" value = "'.$row["salarioMinimo"].'">';
                        }
                    ?>                                
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Novo Salario Minimo:</span>
                    <input type="text" name="salarioMinimo" class="form-control">
                </div>
                <a href="starter.php">
                    <button type="button" class="btn col-5 btn-secondary">
                        <!--<i class="fas fa-times" style="margin-right:10px;"></i>-->
                        Cancelar
                    </button>
                </a>
                <button type="submit" class="btn col-5 btn-primary">
                    <!--<i class="fas fa-plus" style="margin-right:10px;"></i>-->
                    Salvar
                </button>
            </form>                      
        </div>
    </div>
</div>        
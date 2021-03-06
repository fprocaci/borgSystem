<form method="POST" class="offset-md-4" action="phpclasses/incluirRegistro.php">
    <div class="form-group">
        <label for="numeroProcesso" class="form-label">Número do Processo</label>
        <input
            class="form-control form-control-sm col-6"
            type="text"
            name="numeroProcesso"
            autocomplete="off"
            required="required">
    </div>
    <div class="form-group">
        <label for="autor" class="form-label">Autor</label>
        <input
            class="form-control form-control-sm col-6"
            type="text"
            name="autor"
            autocomplete="off"
            required="required">
    </div>
    <!-- -- Input text <div class="form-group"> <label for="reu">Réu</label> <input
    class="form-control form-control-sm col-6" type="text" name="reu"
    autocomplete="off" required> </div> -->

    <!-- Datalist Réu -->
    <label for="exampleDataList" class="form-label">Réu</label>
    <input
        class="form-control mb-3 col-6"
        list="datalistOptions"
        autocomplete="off"
        name="reu"
        id="exampleDataList">
    <datalist id="datalistOptions">
        <?php
        while ($row = $arrayObj->fetch_assoc()) {
            echo '<option value="' . $row["reu"] . '">';
        }
        ?>
    </datalist>
    <div class="form-group">
        <label for="valor">Valor</label>
        <div class="input-group mb-3">
            <input
                class="form-control col-6"
                type="number"
                name="valor"
                required="required"
                autocomplete="off">
        </div>
    </div>
    <div class="form-group">
        <label for="situacao" class="form-label">Situação</label>
        <input
            class="form-control form-control-sm col-6"
            type="text"
            name="situacao"
            autocomplete="off"
            required="required">
    </div>
    <div class="form-group">
        <label for="perito" class="form-label">Colaborador</label>
        <input
            class="form-control form-control-sm col-6"
            type="text"
            name="perito"
            autocomplete="off">
    </div>

    <!-- <div class="form-group"> <div class="row"> <label for="option1">Ajuda de
    Custo</label> </div> <div class="form-check form-check-inline"> <input
    class="form-check-input" type="radio" name="flagCusto" id="inlineRadio1"
    value="S"> <label class="form-check-label" for="inlineRadio1">Sim</label> </div>
    <div class="form-check form-check-inline"> <input class="form-check-input"
    type="radio" name="flagCusto" id="inlineRadio2" value="N"> <label
    class="form-check-label" for="inlineRadio2">Não</label> </div> </div> -->

    
    <a href="starter.php">
        <button type="button" class="btn col-3 btn-secondary">
            <!--<i class="fas fa-times" style="margin-right:10px;"></i> -->
            Cancelar
        </button>
    </a>
    <button type="submit" class="btn col-3 btn-primary">
        <!--<i class="fas fa-plus" style="margin-right:10px;"></i>-->
        Incluir
    </button>
</form>
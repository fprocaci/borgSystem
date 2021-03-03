<!-- Modal -->
<div
    class="modal fade"
    id="incluindoSituacao"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form method="POST" action="phpclasses/atualizaSituacao.php">
                <div class="modal-body">
                    <div class="form-group">
                        <!--<label for="numeroProcesso" class="form-label">Numero Processo</label>-->
                        <input
                            class="form-control form-control-sm col-6"
                            type="text"
                            name="numeroProcesso"
                            autocomplete="off"
                            required="required"
                            hidden>
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
                        <!--<label for="perito" class="form-label">Colaborador</label>-->
                        <input
                            class="form-control form-control-sm col-6"
                            type="text"
                            name="perito"
                            autocomplete="off"
                            required="required"
                            hidden>
                    </div>
                    <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#proximoColaborador" aria-expanded="false" 
                    aria-controls="proximoColaborador">Alterar Colaborador</button>  
                    <hr>
                        <div class="collapse multi-collapse" id="proximoColaborador">
                            <div class="card container">
                                <div class="form-group">
                                    <label for="perito" class="form-label">Colaborador Atual</label>
                                    <input
                                        class="form-control form-control-sm col-6"
                                        type="text"
                                        name="colaboradorAtual"
                                        autocomplete="off"
                                        disabled
                                        >
                                </div>
                                <div class="form-group">
                                    <label for="colaboradorProximo" class="form-label">Próximo Colaborador</label>
                                    <input
                                        class="form-control form-control-sm col-6"
                                        type="text"
                                        name="colaboradorProximo"
                                        autocomplete="off"
                                        >
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

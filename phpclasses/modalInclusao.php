<div class="modal fade" id="modalInclusao" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-secondary">
                  <h5 class="modal-title" id="exampleModalLabel">Inclusão de Registro</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="phpclasses/incluirRegistro.php">
                    <div class="form-group">
                      <label for="indice">Índice</label>
                      <input class="form-control form-control-sm" type="text" name="indice" placeholder="" required>
                    </div>
                    <div class="form-group">
                      <label for="numeroProcesso">Número do Processo</label>
                      <input class="form-control form-control-sm" type="text" name="numeroProcesso" placeholder="" required>
                    </div>
                    <div class="form-group">
                      <label for="autor">Autor</label>
                      <input class="form-control form-control-sm" type="text" name="autor" placeholder="" required>
                    </div>
                    <div class="form-group">
                      <label for="reu">Réu</label>
                      <input class="form-control form-control-sm" type="text" name="reu" placeholder="" required>
                    </div>
                    <div class="form-group">
                      <label for="valor">Valor</label>
                      <input class="form-control form-control-sm" type="text" name="valor" placeholder="" required>
                    </div>
                    <div class="form-group">
                      <label for="situacao">Situação</label>
                      <input class="form-control form-control-sm" type="text" name="situacao" placeholder="" required>
                    </div>
                    <div class="form-group">
                      <label for="perito">Perito</label>
                      <input class="form-control form-control-sm" type="text" name="perito" placeholder="">
                    </div>
                    <button type="submit" class="btn btn-success">Incluir</button>
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                  </form>
                </div>
              </div>
            </div>
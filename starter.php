<?php include("phpclasses/conexao.php")?>
<?php include("phpclasses/header.php")?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item text-info active" aria-current="page"><strong>Tela de Consulta</strong></li>
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

          <!-- Button trigger modal -->
          <?php include("pages/tables/borgSystemTable.php")?>
          <!-- Modal de inclusão-->
          </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include("phpclasses/footer.php")?>
<script>
    //Modal de Inclusão de Situação
    var incluindoSituacao = document.getElementById('incluindoSituacao')
    incluindoSituacao.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget

        var numeroProcesso = button.getAttribute('numeroProcesso')
        var colaborador = button.getAttribute('colaborador')

        var modalTitle = incluindoSituacao.querySelector('.modal-title')
        var inputNumeroProcesso = incluindoSituacao.querySelector('.modal-body input[name="numeroProcesso"]')
        var inputColaboradorAtual = incluindoSituacao.querySelector('.modal-body input[name="colaboradorAtual"]')
        var inputColaboradorProximo = incluindoSituacao.querySelector('.modal-body input[name="colaboradorProximo"]')

        modalTitle.textContent = 'Atualizando Situação'
        
        inputNumeroProcesso.value = numeroProcesso
        inputColaboradorAtual.value = colaborador
        inputColaboradorProximo.value = colaborador
    })

    //Modal Histórico de Situação
    var historicoSituacao = document.getElementById('historicoSituacao')
    historicoSituacao.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget

        var situacao = button.getAttribute('situacao')

        var modalTitle = historicoSituacao.querySelector('.modal-title')
        var inputSituacao = historicoSituacao.querySelector('.modal-body input[name="situacao"]')

        modalTitle.textContent = 'Visualizar Situação'
        
        inputSituacao.value = situacao
    })
</script>
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
        var valorAtualizado = button.getAttribute('valorAtualizado')

        var modalTitle = incluindoSituacao.querySelector('.modal-title')
        var inputNumeroProcesso = incluindoSituacao.querySelector('.modal-body input[name="numeroProcesso"]')
        var inputColaboradorAtual = incluindoSituacao.querySelector('.modal-body input[name="colaboradorAtual"]')
//        var inputColaboradorProximo = incluindoSituacao.querySelector('.modal-body input[name="colaboradorProximo"]')
        var inputValorAtualizado = incluindoSituacao.querySelector('.modal-body input[name="valorAtualizado"]')

      //  modalTitle.textContent = 'Atualizando Situação'
        
        inputNumeroProcesso.value = numeroProcesso
        inputColaboradorAtual.value = colaborador
  //      inputColaboradorProximo.value = colaborador
        inputValorAtualizado.value = valorAtualizado
    })

    //Modal Histórico de Situação
    /*var historicoSituacao = document.getElementById('historicoSituacao')
    historicoSituacao.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget

        var situacao = button.getAttribute('situacao') 

        var modalTitle = historicoSituacao.querySelector('.modal-title')
        var inputSituacao = historicoSituacao.querySelector('.modal-body input[name="situacao"]')

        modalTitle.textContent = 'Visualizar Situação'
        
        inputSituacao.value = situacao
    })*/

    //Modal Alteração de registros
    var alteraRegistro = document.getElementById('alteraRegistro')
    alteraRegistro.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget

        var numeroProcesso = button.getAttribute('numeroProcesso')
        var autor          = button.getAttribute('autor')
        var reu            = button.getAttribute('reu')
        var valor          = button.getAttribute('valor')
        var colaborador    = button.getAttribute('colaborador')

        var modalTitle          = alteraRegistro.querySelector('.modal-title')
        var inputNumeroProcesso = alteraRegistro.querySelector('.modal-body input[name="numeroProcesso"]')
        var inputAutor          = alteraRegistro.querySelector('.modal-body input[name="autor"]')
        var inputReu            = alteraRegistro.querySelector('.modal-body input[name="reu"]')
        var inputValor          = alteraRegistro.querySelector('.modal-body input[name="valor"]')
        var inputColaborador    = alteraRegistro.querySelector('.modal-body input[name="perito"]')

        //modalTitle.textContent = 'Visualizar Situação'
        
        inputNumeroProcesso.value = numeroProcesso
        inputAutor.value          = autor
        inputReu.value            = reu
        inputValor.value          = valor
        inputColaborador.value    = colaborador
    })

    //Modal Exclusão de registros
    var excluiRegistro = document.getElementById('excluiRegistro')
    excluiRegistro.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget

        var numeroProcesso = button.getAttribute('numeroProcesso')
        var autor          = button.getAttribute('autor')
        var reu            = button.getAttribute('reu')
        var valor          = button.getAttribute('valor')
        var colaborador    = button.getAttribute('colaborador')

        var modalTitle          = excluiRegistro.querySelector('.modal-title')
        var inputNumeroProcesso = excluiRegistro.querySelector('.modal-body input[name="numeroProcesso"]')
        var inputAutor          = excluiRegistro.querySelector('.modal-body input[name="autor"]')
        var inputReu            = excluiRegistro.querySelector('.modal-body input[name="reu"]')
        var inputValor          = excluiRegistro.querySelector('.modal-body input[name="valor"]')
        var inputColaborador    = excluiRegistro.querySelector('.modal-body input[name="perito"]')

        //modalTitle.textContent = 'Visualizar Situação'
        
        inputNumeroProcesso.value = numeroProcesso
        inputAutor.value          = autor
        inputReu.value            = reu
        inputValor.value          = valor
        inputColaborador.value    = colaborador
    })

    //Modal de Inclusão
    var incluiRegistro = document.getElementById('incluiRegistro')
    incluiRegistro.addEventListener('show.bs.modal', function (event) {

    })

    //Modal Historico de Situacao
    $(document).ready(function(){
      $(document).on('click','.view-data',function(){
        var numeroProcesso = $(this).attr("numeroProcesso");
        //alert(numeroProcesso);
        if(numeroProcesso !== ""){
          var dados = {
            numeroProcesso: numeroProcesso
          }
          $.post("phpclasses/carregaHistorico.php",dados,function(response){
            //Carrega modal
            $("#registroHistorico").html(response);
            $("#historicoSituacao").modal("show");
          })
        }
      })
    });
</script>
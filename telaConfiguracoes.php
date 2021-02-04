<?php include("phpclasses/conexao.php")?>
<?php 
    include("phpclasses/header.php");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-white">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item text-info active" aria-current="page"><strong>Tela de Configurações</strong></li>
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


    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <p>
                  <button class="btn col-4 btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#salarioMinimo" aria-expanded="false" aria-controls="collapseExample">
                    Salário Minimo
                  </button>
                </p>

                <?php include("pages/forms/formSalarioMinimo.php"); ?>
            
            </div>
        </div>
      </div>
    </div>
</div>
  <?php include("phpclasses/footer.php")?>
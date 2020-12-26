<?php include("phpclasses/conexao.php")?>
<?php include("phpclasses/header.php")?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Bem vindo <strong><?php echo $_SESSION['username']; ?></strong></h1>
            <hr>
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
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
        <?php 
          $sql = "SELECT * FROM REGISTRO";
          $result = mysqli_query($conn, $sql);

          while($row = mysqli_fetch_assoc($result)) {
        ?>
          <!-- Cards com os processos -->
          <div class="col-4">
            <div class="card mb-3"">
              <!-- Número do Processo | header --> 
              <div class="card-header bg-info text-white">
                <strong>Numero do Processo : </strong>
                <?php echo $row['numeroProcesso']; ?>
                <span class="badge bg-danger">Novo</span>
              </div>
              <div class="card-body">
                <!-- Autor -->
                <p class="card-text">
                  Autor:
                  <?php echo $row['autor']; ?>
                </p>
                <!-- Réu -->
                <p class="card-text">
                  Réu:
                  <?php echo $row['reu']; ?>
                </p>
                <!-- Valor -->
                <p class="card-text">
                  Valor:
                  <?php echo $row['valor']; ?>
                </p>
                <!-- Situacao -->
                <p class="card-text">
                  Situação:
                  <?php echo $row['situacao']; ?>
                </p>
              </div>
            </div>
          </div>
        <?php
          }
        ?>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <?php include("phpclasses/footer.php")?>
  
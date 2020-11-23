<?php include("phpclasses/header.php")?>
<?php include("phpclasses/conexao.php")?>
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">BorgSystem</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Fabrício Procaci</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tela de Exclusão</h1>
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
    <?php 
        $numeroProcesso = $_REQUEST['id'];
        $query = "select * from registro where numeroProcesso = '$numeroProcesso'";
        $resultado = mysqli_query($conn,$query);
        $registro = mysqli_fetch_assoc($resultado);

    ?>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="card border-success col-12">
                <div class="card-header bg-danger text-center"><h3>Excluir Registro</h3></div>
                    <div class="card-body text-center">
                        <form>
                            <div class="form-group">
                                <label for="numeroProcesso">Número do Processo</label>
                                <input  class="form-control text-center form-control-sm offset-md-4 col-4" value="<?php echo $registro['numeroProcesso'] ?>" type="text" name="numeroProcesso" placeholder="" required disabled>
                            </div>
                            <div class="form-group">
                                <label for="autor">Autor</label>
                                <input class="form-control text-center form-control-sm offset-md-4 col-4" value="<?php echo $registro['autor'] ?>" type="text" name="autor" placeholder="" required disabled>
                            </div>
                            <div class="form-group">
                                <label for="reu">Réu</label>
                                <input class="form-control text-center form-control-sm offset-md-4 col-4" value="<?php echo $registro['reu'] ?>" type="text" name="reu" placeholder="" required disabled>
                            </div>
                            <div class="form-group">
                                <label for="valor">Valor</label>
                                <input class="form-control text-center form-control-sm offset-md-4 col-4" value="<?php echo $registro['valor'] ?>" type="text" name="valor" placeholder="" required disabled>
                            </div>
                            <div class="form-group">
                                <label for="situacao">Situação</label>
                                <input class="form-control text-center form-control-sm offset-md-4 col-4" value="<?php echo $registro['situacao'] ?>" type="text" name="situacao" placeholder="" required disabled>
                            </div>
                            <div class="form-group">
                                <label for="perito">Perito</label>
                                <input class="form-control text-center form-control-sm offset-md-4 col-4" value="<?php echo $registro['perito'] ?>" type="text" name="perito" placeholder="" disabled>
                            </div>
                            <a href="phpclasses/excluirRegistro.php?id='<?php echo $registro["numeroProcesso"]?>'"><button type="button" class="btn btn-success">Excluir</button></a>
                            <a href="starter.php"><button type="button" class="btn btn-danger">Cancelar</button></a>
                        </form>                      
                    </div>
                </div>
          
            </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <?php include("phpclasses/footer.php")?>
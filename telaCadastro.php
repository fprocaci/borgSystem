<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BorgSystem - Login</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<?php include("phpclasses/conexao.php")?>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-info">
                        <h3 class="offset-md-4"><i style="margin-right:10px" class="fas fa-user-plus"></i>Cadastro de Usuário</h3>
                    </div>
                    <div class="card-body">
                    <form method="POST" class="offset-md-4" action="phpclasses/cadastrarUsuario.php">
                            <div class="form-group">
                                <label for="usuario">Usuário</label>
                                <input class="form-control form-control-sm col-6" type="text" name="usuario" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="senha">Senha</label>
                                <input class="form-control form-control-sm col-6" type="password" name="senha" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="senha">Confirmar Senha</label>
                                <input class="form-control form-control-sm col-6" type="password" name="confirmaSenha" placeholder="" required>
                            </div>
                            
                            <button type="submit" class="btn col-2 btn-outline-success">
                              <!--<i class="fas fa-plus" style="margin-right:10px;"></i>-->
                                Cadastrar
                            </button>
                            <a href="telaLogin.php">
                              <button type="button" class="btn col-2 btn-outline-secondary">
                               <!-- <i class="fas fa-times" style="margin-right:10px;"></i> -->
                                Voltar
                              </button>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>

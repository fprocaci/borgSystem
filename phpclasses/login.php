<?php 
    include("conexao.php");

    /* Exception para caso der erro na base */
    if (mysqli_connect_errno()) {
        printf("Erro ao conectar-se ao banco: %s\n", mysqli_connect_error());
        exit();
    }

    $usuario = $_POST["usuario"];
    $senha = MD5($_POST["password"]);

    $verifica = mysqli_query($conn,"SELECT * FROM usuarios WHERE login =
    '$usuario' AND senha = '$senha'") or die("erro ao selecionar");
    if (mysqli_num_rows($verifica)<=0){
        header("Location:../telaLogin.php");
    }else{
        $_SESSION["username"] = $usuario;
        header("Location:../starter.php");
    }
    

?>
<?php 
    include("conexao.php");
    $numeroProcesso = $_POST['numeroProcesso'];
    $autor = $_POST['autor'];
    $reu = $_POST['reu'];
    $valor = $_POST['valor'] * 1100;
    $situacao = $_POST['situacao'];
    $perito = $_POST['perito'];
    $flagCusto = $_POST['flagCusto'];

    $queryInsertSituacao = "insert into historico values ('$numeroProcesso','$situacao','$perito')";

    $queryInsert = "update controle_de_honorarios_csv set autor = '$autor', reu = '$reu', valor= '$valor', situacao = '$situacao'
    ,perito = '$perito',flagCusto = '$flagCusto' where numeroProcesso = '$numeroProcesso'";
    mysqli_query($conn,"SET NAMES 'utf8'");
    mysqli_query($conn,'SET character_set_connection=utf8');
    mysqli_query($conn,'SET character_set_client=utf8');
    mysqli_query($conn,'SET character_set_results=utf8');
    $result = mysqli_query($conn,$queryInsert);
    $result = mysqli_query($conn,$queryInsertSituacao);

    if(mysqli_affected_rows($conn) != 0){
        echo '<script type="text/javascript">alert("Processo alterado com sucesso");window.location.href= "../starter.php"</script>';    
    }else{
        header("Location: ../starter.php");
    }

?>
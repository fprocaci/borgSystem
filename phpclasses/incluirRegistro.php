<?php 
    include("conexao.php");
    $numeroProcesso = $_POST['numeroProcesso'];
    $autor = $_POST['autor'];
    $reu = $_POST['reu'];
    $valor = $_POST['valor'];
    $situacao = $_POST['situacao'];
    $perito = $_POST['perito'];
    $flagCusto = $_POST['flagCusto'];
    //$dhInclusao = date("Y-m-d");
    $queryInsertSituacao = "insert into historico values ('$numeroProcesso','$situacao','$perito')";
    $queryInsert = "Insert into controle_de_honorarios_csv (numeroProcesso,autor,reu,valor,situacao,perito,flagCusto) values ('$numeroProcesso','$autor','$reu','$valor','$situacao','$perito','$flagCusto')";
    mysqli_query($conn,"SET NAMES 'utf8'");
    mysqli_query($conn,'SET character_set_connection=utf8');
    mysqli_query($conn,'SET character_set_client=utf8');
    mysqli_query($conn,'SET character_set_results=utf8');
    $result = mysqli_query($conn,$queryInsert);
    $result = mysqli_query($conn,$queryInsertSituacao);

    if(mysqli_affected_rows($conn) != 0){
        header("Location: ../starter.php");   
    }
?>

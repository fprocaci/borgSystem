<?php
    include("conexao.php");

    $numeroProcesso = $_REQUEST['id'];

    $queryDelete = "Delete from controle_de_honorarios_esp where numeroProcesso = $numeroProcesso";
    $querySelect = "select * from controle_de_honorarios_esp where numeroProcesso = $numeroProcesso";

    $arrayObj = mysqli_query($conn,$querySelect);
    $obj = mysqli_fetch_assoc($arrayObj);

    $numProcesso = $obj['numeroProcesso'];
    $autor = $obj['autor'];
    $reu = $obj['reu'];
    $valor = $obj['valor'];
    $situacao = $obj['situacao'];
    $perito = $obj['perito'];
    $flagCusto = $obj['flagCusto'];

    $queryInsert = "Insert into controle_de_honorarios_csv (numeroProcesso,autor,reu,valor,situacao,perito,flagCusto) values ('$numProcesso','$autor','$reu','$valor','$situacao','$perito','$flagCusto')";

    mysqli_query($conn,"SET NAMES 'utf8'");
    mysqli_query($conn,'SET character_set_connection=utf8');
    mysqli_query($conn,'SET character_set_client=utf8');
    mysqli_query($conn,'SET character_set_results=utf8');

    if(mysqli_query($conn,$queryInsert) && mysqli_query($conn,$queryDelete)){
        header("Location: ../telaHistoricoHonorario.php");
    }
    else {
        echo "Error: " . $queryInsert . "" . mysqli_error($conn);
    }

    $conn->close();
?>
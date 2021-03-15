<?php
    include("conexao.php");

    $numeroProcesso = $_POST['numeroProcesso'];

    $queryDelete = "Delete from controle_de_honorarios_csv where numeroProcesso = $numeroProcesso";
    $querySelect = "select * from controle_de_honorarios_csv where numeroProcesso = $numeroProcesso";
    $queryGetSalarioMinimo = "select * from configuration";


    $arrayObj = mysqli_query($conn,$querySelect);
    $obj = mysqli_fetch_assoc($arrayObj);

    $numProcesso = $obj['numeroProcesso'];
    $autor = $obj['autor'];
    $reu = $obj['reu'];
    $situacao = $obj['situacao'];
    $perito = $obj['perito'];
    $flagCusto = $obj['flagCusto'];
    
    //$queryInsert = "Insert into controle_de_honorarios_esp (numeroProcesso,autor,reu,valor,situacao,perito,flagCusto) values ('$numProcesso','$autor','$reu','$valor','$situacao','$perito','$flagCusto')";

    mysqli_query($conn,"SET NAMES 'utf8'");
    mysqli_query($conn,'SET character_set_connection=utf8');
    mysqli_query($conn,'SET character_set_client=utf8');
    mysqli_query($conn,'SET character_set_results=utf8');


    if(mysqli_query($conn,$queryDelete)){
        echo '<script type="text/javascript">alert("Processo excluido com sucesso");window.location.href= "../starter.php"</script>';
    }
    else {
        echo "Error: Erro ao executar a query" . mysqli_error($conn);
    }

    $conn->close();
?>
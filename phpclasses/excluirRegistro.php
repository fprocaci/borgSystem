<?php
    include("conexao.php");
    $numeroProcesso = $_REQUEST['id'];
    $queryDelete = "Delete from registro where numeroProcesso = $numeroProcesso";
    mysqli_query($conn,"SET NAMES 'utf8'");
    mysqli_query($conn,'SET character_set_connection=utf8');
    mysqli_query($conn,'SET character_set_client=utf8');
    mysqli_query($conn,'SET character_set_results=utf8');
    $result = mysqli_query($conn,$queryDelete);

    if(mysqli_affected_rows($conn) != 0){
        header("Location: ../starter.php");        
    }
?>
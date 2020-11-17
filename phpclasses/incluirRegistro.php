<?php 
    include("conexao.php");
    $numeroProcesso = $_POST['numeroProcesso'];
    $autor = $_POST['autor'];
    $reu = $_POST['reu'];
    $valor = $_POST['valor'];
    $situacao = $_POST['situacao'];
    $perito = $_POST['perito'];

    $queryInsert = "Insert into registro values ('$numeroProcesso','$autor','$reu','$valor','$situacao','$perito')";
    $result = mysqli_query($conn,$queryInsert);

    if(mysqli_affected_rows($conn) != 0){
        header("Location: ../starter.php");   
    }

?>
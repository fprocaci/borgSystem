<?php 
    include("conexao.php");
    $indice = $_POST['indice'];
    $numeroProcesso = $_POST['numeroProcesso'];
    $autor = $_POST['autor'];
    $reu = $_POST['reu'];
    $valor = $_POST['valor'];
    $situacao = $_POST['situacao'];
    $perito = $_POST['perito'];

    $queryInsert = "Insert into registro values ('$indice','$numeroProcesso','$autor','$reu','$valor','$situacao','$perito')";
    $result = mysqli_query($conn,$queryInsert);

    if(mysqli_affected_rows($conn) != 0){
        header("location:../starter.php"); 
        echo "<script>alert('Registro incluido com sucesso');</script>";   
    }
?>
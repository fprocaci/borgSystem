<?php
include("conexao.php");

$queryGetSalarioMinimo = "select * from configuration";

mysqli_query($conn, "SET NAMES 'utf8'");
mysqli_query($conn, 'SET character_set_connection=utf8');
mysqli_query($conn, 'SET character_set_client=utf8');
mysqli_query($conn, 'SET character_set_results=utf8');
$objSalarioMinimo = mysqli_query($conn, $queryGetSalarioMinimo);

$numeroProcesso = $_POST['numeroProcesso'];
$autor = $_POST['autor'];
$reu = $_POST['reu'];
$situacao = $_POST['situacao'];
$perito = $_POST['perito'];
//$flagCusto = $_POST['flagCusto'];
//$dhInclusao = date("Y-m-d");
$valor = $_POST['valor'];

$queryInsertSituacao = "insert into historico values ('$numeroProcesso','$situacao','$perito')";
$queryInsert = "Insert into controle_de_honorarios_csv (numeroProcesso,autor,reu,valor,situacao,perito) values ('$numeroProcesso','$autor','$reu','$valor','$situacao','$perito')";

$result = mysqli_query($conn, $queryInsert);
$result = mysqli_query($conn, $queryInsertSituacao);



if (mysqli_affected_rows($conn) != 0) {
    echo '<script type="text/javascript">alert("Processo incluido com sucesso");window.location.href= "../starter.php"</script>';
}
?>
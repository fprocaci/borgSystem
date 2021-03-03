<?php
include("conexao.php");

mysqli_query($conn, "SET NAMES 'utf8'");
mysqli_query($conn, 'SET character_set_connection=utf8');
mysqli_query($conn, 'SET character_set_client=utf8');
mysqli_query($conn, 'SET character_set_results=utf8');

$numeroProcesso = $_POST['numeroProcesso'];
$situacao = $_POST['situacao'];
$perito = $_POST['perito'];
$colaboradorProximo = $_POST['colaboradorProximo'];

$queryInsertSituacao = "insert into historico values ('$numeroProcesso','$situacao','$perito')";
$queryUpdateColaborador = "update controle_de_honorarios_csv set perito = '$colaboradorProximo' where numeroProcesso = '$numeroProcesso'";

$result = mysqli_query($conn, $queryInsertSituacao);
$result2 = mysqli_query($conn,$queryUpdateColaborador);

if (mysqli_affected_rows($conn) != 0) {
    echo '<script type="text/javascript">alert("Situação atualizada com sucesso");window.location.href= "../starter.php"</script>';
}
?>
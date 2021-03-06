<?php
include("conexao.php");

mysqli_query($conn, "SET NAMES 'utf8'");
mysqli_query($conn, 'SET character_set_connection=utf8');
mysqli_query($conn, 'SET character_set_client=utf8');
mysqli_query($conn, 'SET character_set_results=utf8');

$numeroProcesso = $_POST['numeroProcesso'];
$situacao = $_POST['situacao'];
$colaboradorProximo = $_POST['colaboradorProximo'];
$colaboradorAtual = $_POST['colaboradorAtual'];

$queryInsertSituacao = "insert into historico values ('$numeroProcesso','$situacao','$colaboradorAtual')";
$queryUpdateColaborador = "update controle_de_honorarios_csv set perito = '$colaboradorProximo',situacao = '$situacao' where numeroProcesso = '$numeroProcesso'";

//$result = mysqli_query($conn, $queryInsertSituacao);
//$result2 = mysqli_query($conn,$queryUpdateColaborador);

if (mysqli_query($conn,$queryInsertSituacao) && mysqli_query($conn,$queryUpdateColaborador)) {
    echo '<script type="text/javascript">alert("Situação atualizada com sucesso");window.location.href= "../starter.php"</script>';
}else{
    echo "Error: Erro ao executar a query" . mysqli_error($conn);
}

?>
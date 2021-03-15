<?php
include("conexao.php");

mysqli_query($conn, "SET NAMES 'utf8'");
mysqli_query($conn, 'SET character_set_connection=utf8');
mysqli_query($conn, 'SET character_set_client=utf8');
mysqli_query($conn, 'SET character_set_results=utf8');

$numeroProcesso = $_POST['numeroProcesso'];
$situacao = $_POST['situacao'];
//$tpPagamento = $_POST['tpPagamento'];
$valor = $_POST['valorAtualizado'];
$valorPago = $_POST['valorPago'];

//$colaboradorProximo = $_POST['colaboradorProximo'];
$colaboradorAtual = $_POST['colaboradorAtual'];

if(isset($_POST['valorPago']))
    $valorAtualizado = $valor - $valorPago;

$queryInsertSituacao = "insert into historico values ('$numeroProcesso','$situacao','$colaboradorAtual')";
$queryUpdateValor= "update controle_de_honorarios_csv set valorAtualizado = '$valorAtualizado',situacao = '$situacao' where numeroProcesso = '$numeroProcesso'";

//$queryUpdateColaborador = "update controle_de_honorarios_csv set perito = '$colaboradorProximo',situacao = '$situacao' where numeroProcesso = '$numeroProcesso'";

//$result = mysqli_query($conn, $queryInsertSituacao);
//$result2 = mysqli_query($conn,$queryUpdateColaborador);

if (mysqli_query($conn,$queryInsertSituacao) && mysqli_query($conn,$queryUpdateValor)) {
    echo '<script type="text/javascript">alert("Situação atualizada com sucesso");window.location.href= "../starter.php"</script>';
}else{
    echo "Error: Erro ao executar a query" . mysqli_error($conn);
}

?>
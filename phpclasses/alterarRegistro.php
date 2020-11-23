<?php include("header.php")?>

<?php 
    include("conexao.php");
    $numeroProcesso = $_POST['numeroProcesso'];
    $autor = $_POST['autor'];
    $reu = $_POST['reu'];
    $valor = $_POST['valor'];
    $situacao = $_POST['situacao'];
    $perito = $_POST['perito'];

    $queryInsert = "update registro set numeroProcesso = '$numeroProcesso' where numeroProcesso = '$numeroProcesso'";
    $result = mysqli_query($conn,$queryInsert);

    if(mysqli_affected_rows($conn) != 0){
        echo "<script type='text/javascript'>toastr.success('Usuário incluido com sucesso!')</script>";
        header("Location: ../starter.php");   
    }

?>

<?php include("footer.php")?>
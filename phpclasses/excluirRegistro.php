<?php include("header.php")?>

<?php
    include("conexao.php");
    $numeroProcesso = $_REQUEST['id'];
    $queryDelete = "Delete from registro where numeroProcesso = $numeroProcesso";
    $result = mysqli_query($conn,$queryDelete);

    if(mysqli_affected_rows($conn) != 0){
        header("Location: ../starter.php");
        echo "<script type='text/javascript'>toastr.success('Usuário removido com sucesso!')</script>";
        
    }
?>

<?php include("footer.php")?>

<?php    
    include("conexao.php");
    $salarioMinimo = $_POST['salarioMinimo'];

    $queryUpdateSalarioMinimo = "update configuration set salarioMinimo = '$salarioMinimo'";

    $result = mysqli_query($conn,$queryUpdateSalarioMinimo);

    if(mysqli_affected_rows($conn) != 0){
        echo '<script type="text/javascript">alert("Salario Minimo alterado com sucesso");window.location.href= "../telaConfiguracoes.php"</script>'; 
    }
?>
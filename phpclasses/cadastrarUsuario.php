
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<?php
include("conexao.php");

$login = $_POST["usuario"];

$senha = MD5($_POST["senha"]);


$query_select = "SELECT login FROM usuarios WHERE login = '$login'";

$select = mysqli_query($conn,$query_select);

$array = mysqli_fetch_array($select);

//$logarray = $array["login"];

//      if($logarray == $login)

//        echo "<script language='javascript' type='text/javascript'>alert('Esse login já existe');window.location.href='cadastro.html';</script>";

      

        $query = "INSERT INTO usuarios (login,senha) VALUES ('$login','$senha')";

        $insert = mysqli_query($conn,$query);

        if($insert){ 
          header()

        }else{

          echo"<script type='text/javascript'>toastr.warning('Não foi possível cadastrar esse usuário');</script>";

        }
?>
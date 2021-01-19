<?php 
    session_start();

    //O tipo de caracteres a ser usado
    header('Content-Type: text/html; charset=utf-8');

    $localhost = "localhost";
    
    //root local 
    $root = "root";

    //root Hostigator
    //$root = "saloma29_root";

    //Password Hostigator
    //$pass = "wkpw+tpUn&^A";
    $pass = "";

    //Base de dados Local
    $db = "borgsystem";

    //base de dados Hostigator
    //$db = "saloma29_borgsystem";
    $conn = mysqli_connect($localhost, $root, $pass, $db);

    //if($conn) echo "<script>alert('Conectado à base de dados')</script>";
    //else echo "<script>alert('Não foi possível se conectar a base de dados')</script>";
    
  ?>
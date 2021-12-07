<?php
    include 'gera_conexao.inc';
    

    $username = $_POST["username"];
    $password = $_POST["password"];
 
    $sql = "SELECT 'username', 'password' as resp_up FROM users WHERE password = '$password' AND username = '$username'";

    $resultado = mysqli_query ($conexao,$sql);
    $registro = mysqli_fetch_array($resultado);
    $aux_up = $registro['resp_up'];
 
    if ($aux_up !=""){
      header("Location: /dist/menu.html");
    }else{
      header("Location: login.html");
    }
 
 
    mysqli_close($conexao);
?>
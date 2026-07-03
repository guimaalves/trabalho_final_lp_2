<?php
    $server = "localhost";
    $user = "root";
    $senha = "";
    $bd = "biblioteca";
    $conexao = mysqli_connect($server, $user, $senha, $bd);
    if (!$conexao) {
        die("Conexão falhou: " . mysqli_connect_error());
    }
    // echo "Conexão bem sucedida!";
    mysqli_set_charset($conexao, "utf8");
?>  
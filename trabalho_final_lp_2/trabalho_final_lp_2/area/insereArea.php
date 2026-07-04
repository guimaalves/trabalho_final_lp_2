<?php
    include "../includes/conexao.php";
    $area = $_POST['area'];

    $sql = "INSERT INTO area (nome) VALUES ('$area')";

    if (mysqli_query($conexao, $sql)) {
        header("Location: mostrar_area.php");
        exit;
    } else {
        echo "Erro ao cadastrar área: " . mysqli_error($conexao);
    }
    mysqli_close($conexao);
?>
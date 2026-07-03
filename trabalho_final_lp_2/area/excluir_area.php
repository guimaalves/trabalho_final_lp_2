<?php
include '../includes/conexao.php';

$codigo = $_GET['id'];

// Verifica se existem livros vinculados 
$sqlVerifica = "SELECT * FROM livro WHERE id_area = $codigo";
$resultVerifica = mysqli_query($conexao, $sqlVerifica);

if (mysqli_num_rows($resultVerifica) > 0) {
    echo "Não é possível excluir esta área, pois existem livros vinculados a ela.";
} else {
    $sql = "DELETE FROM area WHERE id = $codigo";
    $resultado = mysqli_query($conexao, $sql);

    if ($resultado) {
        header("Location: mostrar_area.php");
        exit;
    } else {
        echo "Erro ao excluir área.";
    }
}

mysqli_close($conexao);
?>
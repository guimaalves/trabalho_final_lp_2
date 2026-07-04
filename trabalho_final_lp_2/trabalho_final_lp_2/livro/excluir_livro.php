<?php
include '../includes/conexao.php';

$codigo = $_GET['id'];

/* Verifica se o livro está emprestado */
$sqlVerifica = "SELECT * FROM reserva WHERE id_livro = $codigo";
$resultVerifica = mysqli_query($conexao, $sqlVerifica);

if(mysqli_num_rows($resultVerifica) > 0) {
    echo "Não é possível excluir este livro, pois ele possui empréstimos vinculados.";
} else {
    $sql = "DELETE FROM livro WHERE id = $codigo";
    $resultado = mysqli_query($conexao, $sql);

    if($resultado){
        header("Location: mostrar_livro.php");
        exit;
    } else {
        echo "Erro ao excluir livro.";
    }
}

mysqli_close($conexao);
?>
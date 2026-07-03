<?php
include '../includes/conexao.php';

$codigo = $_GET['id'];

//busca livro vinculado a reserva
$sqlBusca = "SELECT id_livro 
             FROM reserva 
             WHERE id = $codigo";

$resultBusca = mysqli_query($conexao, $sqlBusca);

$reserva = mysqli_fetch_array($resultBusca);

$id_livro = $reserva['id_livro'];

//exclui o emprestimo
$sqlDelete = "DELETE FROM reserva WHERE id = $codigo";
$resultDelete = mysqli_query($conexao, $sqlDelete);

//verifica se a exclusão foi bem sucedida  
if($resultDelete){
    //atualiza o status do livro para disponível
    $sqlLivro = "UPDATE livro
                  SET status = 1
                  WHERE id = $id_livro";

    mysqli_query($conexao, $sqlLivro);
    //redireciona para a página de listagem de emprestimos
    header("Location: mostrar_reserva.php");
    exit;

} else {
    echo "Erro ao excluir empréstimo.";
}

mysqli_close($conexao);
?>
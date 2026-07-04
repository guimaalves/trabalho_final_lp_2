<?php
include '../includes/conexao.php';
$titulo = $_POST['tituloLivro'];
$autor = $_POST['autorLivro'];
$area = $_POST['area'];

// 0: Emprestado / 1: Disponível
$status = 1; // Define o status como 1 (disponível) para novos livros

$sql = "INSERT INTO livro (titulo, status, autor, id_area) VALUES ('$titulo', '$status', '$autor', '$area')";
$result = mysqli_query($conexao, $sql);
mysqli_close($conexao);

//redireciona para a página de listagem de livros
header("Location: mostrar_livro.php");
exit;
?>
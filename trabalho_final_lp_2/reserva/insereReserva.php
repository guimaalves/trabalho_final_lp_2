<?php
    include '../includes/conexao.php';
    $matricula = $_POST['matricula'];
    $data_entrega = $_POST['data_entrega'];
    $livros = $_POST['livros']; 

    foreach ($livros as $id_livro){
        $sql = "INSERT INTO reserva (id_livro, matricula,data_retirada,data_entrega,status) VALUES ($id_livro, $matricula, NOW(), '$data_entrega', '1')";
        mysqli_query($conexao, $sql);
        //alterar status do livro para emprestado
        $sqlLivro = "UPDATE livro SET status = 0 WHERE id = $id_livro";
        $result = mysqli_query($conexao, $sqlLivro);
    }
    mysqli_close($conexao);
    //redireciona para a página de listagem de reservas
    header("Location: mostrar_reserva.php");
    exit;
?>
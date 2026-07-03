<?php
include '../includes/conexao.php';

if(isset($_POST['reservas'])){

    $reservas = $_POST['reservas'];

    foreach($reservas as $idReserva){

        /* Buscar livro da reserva */
        $sqlBusca = "SELECT id_livro
                     FROM reserva
                     WHERE id = $idReserva";

        $resultBusca = mysqli_query($conexao, $sqlBusca);
        
        $reserva = mysqli_fetch_array($resultBusca);

        $idLivro = $reserva['id_livro'];

        /* Atualiza status da reserva para devolvido */
        $sqlReserva = "UPDATE reserva
                       SET status = 0
                       WHERE id = $idReserva";

        mysqli_query($conexao, $sqlReserva);

        /* Muda status do livro para disponível */
        $sqlLivro = "UPDATE livro
                     SET status = 1
                     WHERE id = $idLivro";

        mysqli_query($conexao, $sqlLivro);
    }
}

mysqli_close($conexao);

header("Location: mostrar_devolucoes.php");

exit;
?>
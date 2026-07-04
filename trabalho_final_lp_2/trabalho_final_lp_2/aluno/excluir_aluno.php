<?php 
    include '../includes/conexao.php';
    $codigo = $_GET['id'];
    //verifica se o aluno possui emprestimos ativos
    $sqlVerifica = "SELECT * FROM reserva WHERE matricula = $codigo AND status = 1";
    $resultVerifica = mysqli_query($conexao, $sqlVerifica);

    if(mysqli_num_rows($resultVerifica) > 0) {
        echo "Não é possível excluir este aluno, pois ele possui emprestimos em andamento.";
    } else {
        $sql = "DELETE FROM aluno WHERE matricula = $codigo";
        $result = mysqli_query($conexao, $sql);
        
        if($result) {
            header("Location: mostrar_aluno.php");
            exit;
        } else {
            echo "Não foi possível excluir o aluno.";
        }
    }
    mysqli_close($conexao);
?>
<?php
include '../includes/conexao.php';
include '../includes/header.php';

$sql = "SELECT
            reserva.id,
            livro.id AS id_livro,
            livro.titulo,
            aluno.nome,
            reserva.data_retirada,
            reserva.data_entrega
        FROM reserva

        INNER JOIN aluno
        ON reserva.matricula = aluno.matricula

        INNER JOIN livro
        ON reserva.id_livro = livro.id

        WHERE reserva.status = 1 /*reserva em aberto*/

        ORDER BY reserva.data_entrega"; 

$resultado = mysqli_query($conexao, $sql);
?>

<div class="devolucao-container">
    <h1>Devolução de Livros</h1>
    <form action="devolver_livros.php" method="POST">
    <table>
        <tr>
            <th><input type="checkbox" id="selecionarTodos"></th>
            <th>Livro</th>
            <th>Aluno</th>
            <th>Data Retirada</th>
            <th>Data Entrega</th>
        </tr>

        <?php
            while($registro = mysqli_fetch_array($resultado)){
                echo "<tr>";
                echo "<td> <input  type='checkbox' name='reservas[]' value='" . $registro['id'] . "'> </td>";
                echo "<td>" . $registro['titulo'] . "</td>";
                echo "<td>" . $registro['nome'] . "</td>";
                echo "<td>" . date('d/m/Y',strtotime($registro['data_retirada']) ) . "</td>";
                echo "<td>" . date('d/m/Y',strtotime($registro['data_entrega'])) . "</td>";
                echo "</tr>";
            }
            mysqli_close($conexao);
            ?>

    </table>

        <div class="botoes">
            <input type="submit" value="Devolver Livro">
            <a class="btn-voltar" href="<?= BASE_URL ?>index.php">Voltar</a>
        </div>  
    </form>
</div>
<!-- JavaScript para checkbox selecionar todos -->
<script src="<?= BASE_URL ?>assets/js/script.js"></script>

<?php include '../includes/footer.php'; ?>
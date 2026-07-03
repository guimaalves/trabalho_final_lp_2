<?php
    include '../includes/conexao.php';
    include '../includes/header.php';

    $sql = "SELECT 
                reserva.id,
                aluno.nome AS nome_aluno,
                livro.titulo AS nome_livro,
                reserva.data_retirada,
                reserva.data_entrega,
                reserva.status
            FROM reserva

            INNER JOIN aluno
            ON reserva.matricula = aluno.matricula

            INNER JOIN livro
            ON reserva.id_livro = livro.id

            ORDER BY reserva.data_retirada DESC";

    $result = mysqli_query($conexao, $sql);
?>

<h1>Visualizar Empréstimos</h1>
    <div class="botao-adicionar">
        <a href="cadastro_reserva.php">Adicionar Novo Empréstimo</a>
    </div>

<table>
    <tr>
        <th>Aluno</th>
        <th>Livro</th>
        <th>Data Retirada</th>
        <th>Data Entrega</th>
        <th>Status</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>

    <?php
        while($registro = mysqli_fetch_assoc($result)){

            echo "<tr>";

            echo "<td>".$registro['nome_aluno']."</td>";
            echo "<td>".$registro['nome_livro']."</td>";
            echo "<td>". date('d/m/Y', strtotime($registro['data_retirada']))."</td>";
            echo "<td>". date('d/m/Y', strtotime($registro['data_entrega']))."</td>";
            echo "<td>".($registro['status'] == 1 ? 'Em aberto' : 'Encerrada')."</td>";
            echo "<td class='acao-editar'><a href='editar_reserva.php?id=".$registro['id']."'>Editar</a></td>"; 
            echo "<td class='acao-excluir'><a href='excluir_reserva.php?id=".$registro['id']."' onclick=\"return confirm('Tem certeza que deseja excluir este empréstimo?')\">Excluir</a></td>";
            echo "</tr>";
        }

        mysqli_close($conexao);
    ?>

</table>

<?php include '../includes/footer.php'; ?>
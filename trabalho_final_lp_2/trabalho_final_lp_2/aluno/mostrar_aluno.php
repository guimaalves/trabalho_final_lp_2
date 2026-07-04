<?php
    include '../includes/conexao.php';
    include '../includes/header.php';
    $sql = "SELECT * FROM aluno";
    $result = mysqli_query($conexao, $sql);
    $linhas = mysqli_num_rows($result);
?>
    <h1>Visualizar Alunos Cadastrados</h1>
    <div class="botao-adicionar">
        <a href="cadastro_aluno.php">Adicionar Novo Aluno</a>
    </div>
    <table>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>CPF</th>
            <th>Data de Nascimento</th>
            <th>Edição</th>
            <th>Exclusão</th>
        </tr>
        <?php
            for($i = 0; $i < $linhas; $i++) {
                $registro = mysqli_fetch_array($result);
                echo "<tr>";
                echo "<td>" . $registro['nome'] . "</td>";
                echo "<td>" . $registro['email'] . "</td>";
                echo "<td>" . $registro['cpf'] . "</td>";
                echo "<td>" . $registro['data_nasc'] . "</td>";

                echo "<td class='acao-editar'>

                    <a class='editar' href='editar_aluno.php?id=" . $registro['matricula'] . "'>
                        Editar
                    </a>
                </td>";

                echo "<td class='acao-excluir'>
                 <a class='excluir' href='excluir_aluno.php?id=" . $registro['matricula'] .
                     "'onclick=\"return confirm('Tem certeza que deseja excluir este aluno?')\">
                         Excluir
                     </a>
                </td>";
                echo "</tr>";
            }
            mysqli_close($conexao);
        ?>
    </table>

<?php include '../includes/footer.php'; ?>
<?php
    include '../includes/conexao.php';
    include '../includes/header.php';
    $sql = "SELECT * FROM area";
    $result = mysqli_query($conexao, $sql);
    $linhas = mysqli_num_rows($result);
?>

<h1>Visualizar Áreas Cadastradas</h1>
<div class="botao-adicionar">
        <a href="cadastro_area.php">Adicionar Nova Área</a>
    </div>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
        <?php
            for($i = 0; $i < $linhas; $i++) {
                $registro = mysqli_fetch_array($result);
                echo "<tr>";
                echo "<td>" . $registro['id'] . "</td>";
                echo "<td>" . $registro['nome'] . "</td>";
                echo "<td class='acao-editar'>
                        <a href='editar_area.php?id=" . $registro['id'] . "'>
                         Editar
                        </a>
                       </td>";

                echo "<td class='acao-excluir'>
                        <a href='excluir_area.php?id=" . $registro['id'] . "'    
                        onclick=\"return confirm('Tem certeza que deseja excluir esta área?')\">
                        Excluir
                        </a>
                        </td>";
            }
            mysqli_close($conexao);
        ?>
    </table>

<?php include '../includes/footer.php'; ?>
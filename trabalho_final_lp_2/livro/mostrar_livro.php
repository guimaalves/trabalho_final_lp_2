<?php
include '../includes/conexao.php';
include '../includes/header.php';
$sql = "SELECT livro.id, livro.titulo, livro.status, livro.autor, area.nome AS area_nome 
FROM livro INNER JOIN area 
ON livro.id_area = area.id";
$result = mysqli_query($conexao, $sql);
$linhas = mysqli_num_rows($result);
?>

<h1>Listar Livros</h1>
    <div class="botao-adicionar">
        <a href="cadastro_livro.php">Adicionar Novo Livro</a>
    </div>
    <table>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Status</th>
            <th>Autor</th>
            <th>Área</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
        <?php
            for($i = 0; $i < $linhas; $i++) {
                $registro = mysqli_fetch_array($result);
                echo "<tr>";
                echo "<td>" . $registro['id'] . "</td>";
                echo "<td>" . $registro['titulo'] . "</td>";
                echo "<td>" . ($registro['status'] == 1 ? 'Disponível' : 'Indisponível') . "</td>"; 
                echo "<td>" . $registro['autor'] . "</td>";
                echo "<td>" . $registro['area_nome'] . "</td>";
                echo "<td class='acao-editar'>
                  <a href='editar_livro.php?id=" . $registro['id'] . "'>
                        Editar
                  </a>
                  </td>";

                echo "<td class='acao-excluir'>
                    <a href='excluir_livro.php?id=" . $registro['id'] . "'
                    onclick=\"return confirm('Tem certeza que deseja excluir este livro?')\">
                    Excluir
                    </a>
                    </td>";
                echo "</tr>";
            }
            mysqli_close($conexao);
        ?>
</table>

<?php include '../includes/footer.php'; ?>
<?php
    include '../includes/header.php';
    include '../includes/conexao.php';
    $sqlAlunos = "SELECT * FROM aluno ORDER BY nome";
    $resultAlunos = mysqli_query($conexao, $sqlAlunos);

    $sqlLivros = "SELECT * FROM livro WHERE status = 1 ORDER BY titulo";
    $resultLivros = mysqli_query($conexao, $sqlLivros);
?>

<div class="form-container">
    <h1>Empréstimo de Livros</h1>
    <form action="insereReserva.php" method="POST">
        <label for="aluno">Aluno:</label>
        <select name="matricula" required>
            <option value="">Selecione um aluno</option>
            <?php
                while($aluno = mysqli_fetch_array($resultAlunos)) {
                    echo "<option value='" . $aluno['matricula'] . "'>" . $aluno['nome'] . "</option>";
                }
            ?>
        </select>

        <label for="Data de Entrega">Data de Entrega:</label>
        <input type="date" id="data_entrega" name="data_entrega" required>
        
        <label for="livro">Livros:</label>
        <?php 
            while($livro = mysqli_fetch_array($resultLivros)) {
                echo "
                <div class='checkbox-livro'>
                    <input type='checkbox' name='livros[]' 
                    value='" . $livro['id'] . "'> 
                    ". $livro['titulo'] . "<br>
                </div>";
            }
        ?>

        <div class="botoes">
            <input type="submit" value="Enviar">
            <input type="reset" value="Limpar">
        </div>
    </form>
</div>

<?php include '../includes/footer.php'; ?>
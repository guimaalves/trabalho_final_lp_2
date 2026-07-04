<?php
    include_once '../includes/conexao.php';
    include_once '../includes/header.php';
    $sql = "SELECT * FROM area";
    $result = mysqli_query($conexao, $sql);
    $linhas = mysqli_num_rows($result);
?>
    
    <div class="form-container">
    <h1>Cadastro de Livro</h1>
    <form action="insereLivro.php" method="POST">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="tituloLivro" maxlength="50" required> 

        <label for="autor">Autor:</label>
        <input type="text" id="autor" name="autorLivro" maxlength="50" required>

        <label for="area">Área:</label>
        <select name="area">
            <option value="area">Selecione a área</option>
            <?php
                for($i=0;$i<$linhas;$i++) {
                    $registro = mysqli_fetch_array($result);
                    $area = $registro['nome'];
                    $id_area = $registro['id'];
                    echo "<option value='$id_area'>$area</option>";
                }
            ?>
        </select>

        <div class="botoes">
            <input type="submit" value="Enviar">
            <input type="reset" value="Limpar">
        </div>

</div>

<?php include '../includes/footer.php'; ?>
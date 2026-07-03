<?php
include '../includes/conexao.php';
include '../includes/header.php';

$mensagem = "";

if ($_POST) {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $area = $_POST['area'];
    $status = $_POST['status'];

    $sql = "UPDATE livro 
            SET titulo = '$titulo',
                autor = '$autor',
                id_area = '$area',
                status = '$status'
            WHERE id = '$id'";

    $resultado = mysqli_query($conexao, $sql);

    if ($resultado) {
        $mensagem = "Livro alterado com sucesso!";
    } else {
        $mensagem = "Não foi possível alterar o livro!";
    }
}

$codigo = $_GET['id'];

$sql = "SELECT * FROM livro WHERE id = $codigo";
$resultado = mysqli_query($conexao, $sql);
$registro = mysqli_fetch_array($resultado);

$sqlArea = "SELECT * FROM area ORDER BY nome";
$resultArea = mysqli_query($conexao, $sqlArea);
?>

<div class="form-container">

    <h1>Editar Livro</h1>

    <form method="post">

        <input type="hidden" name="id" value="<?php echo $registro['id']; ?>">

        Título<input type="text" name="titulo" maxlength="100" value="<?php echo $registro['titulo']; ?>" required>

        Autor<input type="text" name="autor" maxlength="100" value="<?php echo $registro['autor']; ?>" required>

        Área<select name="area" required>
            <?php
            while ($area = mysqli_fetch_array($resultArea)) {
                $selected = "";
                if ($area['id'] == $registro['id_area']) {
                    $selected = "selected";
                }
                echo "<option value='" . $area['id'] . "' $selected>
                        " . $area['nome'] . "
                      </option>";
            }
            ?>

        </select>

        Status<select name="status">
            <option value="1" <?php
            if ($registro['status'] == 1) {
                echo "selected";
            }
            ?>>
                Disponível
            </option>

            <option value="0" <?php
            if ($registro['status'] == 0) {
                echo "selected";
            }
            ?>>
                Emprestado
            </option>

        </select>

        <?php
        if ($mensagem != "") {
            echo "<p class='mensagem'>$mensagem</p>";
        }
        ?>

        <div class="botoes">
            <input type="submit" value="Editar">
            <a class="btn-voltar" href="mostrar_livro.php">Voltar</a>
        </div>
    </form>
</div>

<?php
mysqli_close($conexao);

include '../includes/footer.php';
?>
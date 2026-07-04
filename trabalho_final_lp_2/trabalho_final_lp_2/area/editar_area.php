<?php
include "../includes/conexao.php";
include "../includes/header.php";


$mensagem = "";

if ($_POST) {

    $id = $_POST['id'];
    $nome = $_POST['nome'];

    $sql = "UPDATE area 
            SET nome = '$nome'
            WHERE id = '$id'";

    $resultado = mysqli_query($conexao, $sql);

    if ($resultado) {
        $mensagem = "Alteração da área efetuada com sucesso!";
    } else {
        $mensagem = "Não foi possível alterar a área!";
    }
}

$codigo = $_GET['id'];

$sql = "SELECT * FROM area WHERE id = $codigo";

$resultado = mysqli_query($conexao, $sql);

$registro = mysqli_fetch_array($resultado);
?>

<div class="form-container">

    <h1>Editar Area</h1>

    <form method="post">

    <input type="hidden" name="id"  value="<?php echo $registro['id']; ?>">

    Nome:<input type="text" name="nome" maxlength="50" value="<?php echo $registro['nome']; ?>">

        <?php
        if ($mensagem != "") {
            echo "<p class='mensagem'>$mensagem</p>";
        }
        ?>

        <div class="botoes">
            <input type="submit" value="Editar">
            <a class="btn-voltar" href="mostrar_area.php">
                Voltar
            </a>
        </div>
        
    </form>
</div>

<?php
mysqli_close($conexao);

include '../includes/footer.php';
?>
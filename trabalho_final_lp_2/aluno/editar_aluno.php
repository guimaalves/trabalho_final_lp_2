<?php
include '../includes/conexao.php';
include '../includes/header.php';

$mensagem = "";

if ($_POST) {

    $matricula = $_POST['matricula'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $data_nasc = $_POST['data_nasc'];

    $sql = "UPDATE aluno 
            SET nome = '$nome',
                email = '$email',
                cpf = '$cpf',
                data_nasc = '$data_nasc'
            WHERE matricula = '$matricula'";

    $resultado = mysqli_query($conexao, $sql);

    if ($resultado) {
        $mensagem = "Alteração do aluno efetuada com sucesso!";
    } else {
        $mensagem = "Não foi possível alterar o aluno!";
    }
}

$codigo = $_GET['id'];

$sql = "SELECT * FROM aluno WHERE matricula = $codigo";

$resultado = mysqli_query($conexao, $sql);

$registro = mysqli_fetch_array($resultado);
?>

<div class="form-container">

    <h1>Editar Aluno</h1>

    <form name="editaraluno" method="post">

        <input type="hidden" name="matricula" value="<?php echo $registro['matricula']; ?>" readonly>

        Nome<input type="text" name="nome" maxlength="50" value="<?php echo $registro['nome']; ?>">

        Email<input type="email" name="email" maxlength="50" value="<?php echo $registro['email']; ?>">

        CPF<input type="text" name="cpf" maxlength="11" value="<?php echo $registro['cpf']; ?>">

        Data de Nascimento <input type="date" name="data_nasc" value="<?php echo $registro['data_nasc']; ?>">

        <?php
        if ($mensagem != "") {
            echo "<p class='mensagem'>$mensagem</p>";
        }
        ?>

        <div class="botoes">
            <input type="submit" value="Editar">
            <a class="btn-voltar" href="mostrar_aluno.php">
                Voltar
            </a>
        </div>

    </form>
</div>

<?php
mysqli_close($conexao);

include '../includes/footer.php';
?>
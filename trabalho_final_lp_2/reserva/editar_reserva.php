<?php
include '../includes/header.php';
include '../includes/conexao.php';

$mensagem = "";

if($_POST){

    $id = $_POST['id'];
    $matricula = $_POST['matricula'];
    $data_entrega = $_POST['data_entrega'];
    $status = $_POST['status'];

    $sql = "UPDATE reserva
            SET matricula = '$matricula',
                data_entrega = '$data_entrega',
                status = '$status'
            WHERE id = '$id'";

    $resultado = mysqli_query($conexao, $sql);

    if($resultado){
        $mensagem = "Empréstimo alterado com sucesso!";
    } else {
        $mensagem = "Não foi possível alterar o empréstimo!";
    }
}


$codigo = $_GET['id'];
$sqlReserva = "SELECT * FROM reserva WHERE id = $codigo";

$resultReserva = mysqli_query($conexao, $sqlReserva);
$reserva = mysqli_fetch_array($resultReserva);

$sqlAlunos = "SELECT * FROM aluno ORDER BY nome";
$resultAlunos = mysqli_query($conexao, $sqlAlunos);
?>

<div class="form-container">

    <h1>Editar Empréstimo</h1>

    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $reserva['id']; ?>">

        <label>Aluno:</label>

        <select name="matricula" required>
            <?php
            while($aluno = mysqli_fetch_array($resultAlunos)){
                $selected = "";
                if($aluno['matricula'] == $reserva['matricula']){
                    $selected = "selected";
                }
                echo "<option value='" . $aluno['matricula'] . "' $selected>
                        " . $aluno['nome'] . "
                      </option>";
            }
            ?>
        </select>

        <label>Data de Entrega:</label>
        <input type="date" name="data_entrega" value="<?php echo $reserva['data_entrega']; ?>" required>

        <label>Status:</label>
        <select name="status">
            <option value="1"
                <?php
                if($reserva['status'] == 1){
                    echo "selected";
                }
                ?>>
                Em andamento
            </option>

            <option value="0"
                <?php
                if($reserva['status'] == 0){
                    echo "selected";
                }
                ?>>
                Finalizado
            </option>

        </select>

        <?php
        if($mensagem != ""){
            echo "<p class='mensagem'>$mensagem</p>";
        }
        ?>

        <div class="botoes">
            <input type="submit" value="Editar">
            <a class="btn-voltar" href="mostrar_reserva.php">Voltar</a>
        </div>
    </form>
</div>

<?php
mysqli_close($conexao);

include '../includes/footer.php';
?>
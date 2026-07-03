<?php include '../includes/header.php'; ?>

<div class="form-container">
    <h1>Cadastro de Aluno</h1>

    <form action="insereAluno.php" id="formCadastro" method="POST">

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nomeAluno" maxlength="50" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" maxlength="50" required>

        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" maxlength="11" required>

        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="date" id="data_nascimento" name="data_nascimento" required>

        <div class="botoes">
            <input type="submit" value="Cadastrar">
            <input type="reset" value="Limpar">
        </div>
    </form>
</div>

<?php include '../includes/footer.php'; ?>
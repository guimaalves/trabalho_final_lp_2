<?php include '../includes/header.php'; ?>

<div class="form-container">
    <h1>Cadastro de Área</h1>
    <form action="insereArea.php" method="POST">
        <label for="area">Área:</label>
        <input type="text" id="area" name="area" maxlength="50" required>

        <div class="botoes">
            <input type="submit" value="Cadastrar">
            <input type="reset" value="Limpar">
        </div>
</div>
    
<?php include '../includes/footer.php'; ?>
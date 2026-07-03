<?php
include '../includes/conexao.php';

$nome = $_POST['nomeAluno'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$data_nascimento = $_POST['data_nascimento'];
$sql = "INSERT INTO aluno (nome, email, cpf, data_nasc) VALUES ('$nome', '$email', '$cpf', '$data_nascimento')";
$result = mysqli_query($conexao, $sql);
mysqli_close($conexao);

//redireciona para mostrar_aluno.php
header("Location: mostrar_aluno.php");
exit;
?>
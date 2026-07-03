<?php
require_once __DIR__ . '/../config.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Biblioteca</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="container">
                <div class="logo">
                    <a href="<?= BASE_URL ?>index.php">
                        <img src="<?= BASE_URL ?>assets/img/livros.png" alt="Logo da Biblioteca">
                        <h1>Sistema de Biblioteca</h1>
                    </a>
                </div>

                <button class="menu-hamburger" id="menu-hamburger">☰</button>
                <nav class="menu" id="menu">
                <ul>
                    <li><a href="<?= BASE_URL ?>index.php">Início</a></li>
                    <li><a href="<?= BASE_URL ?>aluno/mostrar_aluno.php">Alunos</a></li>
                    <li><a href="<?= BASE_URL ?>area/mostrar_area.php">Áreas</a></li>
                    <li><a href="<?= BASE_URL ?>livro/mostrar_livro.php">Livros</a></li>
                    <li><a href="<?= BASE_URL ?>reserva/mostrar_reserva.php">Empréstimos</a></li>
                    <li><a href="<?= BASE_URL ?>devolucao/mostrar_devolucoes.php">Devolução</a></li>
                </ul>
            </div>
        </nav>
    </header>
<main class="container">
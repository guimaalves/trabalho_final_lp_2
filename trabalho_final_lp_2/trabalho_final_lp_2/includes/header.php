<?php
require_once __DIR__ . '/../config.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BPP SISTEMA </title>
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css?v=2">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="container">
                <div class="logo">
                    <a href="<?= BASE_URL ?>index.php">
                        <img src="<?= BASE_URL ?>assets/img/livros11.png?v=2" alt="Logo da Biblioteca">
                        <h1>BPP SISTEMA</h1>
                    </a>
                </div>

                <button class="menu-hamburger" id="menu-hamburgerv=2">☰</button>
                <nav class="menu" id="menu">
                <ul>
                    <li><a href="<?= BASE_URL ?>index.php">INÍCIO</a></li>
                    <li>|</li>
                    <li><a href="<?= BASE_URL ?>aluno/mostrar_aluno.php">ALUNOS</a></li>
                    <li>|</li>
                    <li><a href="<?= BASE_URL ?>area/mostrar_area.php">ÁREAS</a></li>
                    <li>|</li>
                    <li><a href="<?= BASE_URL ?>livro/mostrar_livro.php">LIVROS</a></li>
                    <li>|</li>
                    <li><a href="<?= BASE_URL ?>reserva/mostrar_reserva.php">EMPRÉSTIMOS</a></li>
                    <li>|</li>
                    <li><a href="<?= BASE_URL ?>devolucao/mostrar_devolucoes.php">DEVOLUÇÃO</a></li>
                </ul>
            </div>
        </nav>
    </header>
<main class="container">
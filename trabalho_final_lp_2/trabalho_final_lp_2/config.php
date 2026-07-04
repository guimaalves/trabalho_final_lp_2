<?php
// config.php
// Defina a BASE_URL de acordo com o nome da pasta do projeto

// Detecta automaticamente a BASE_URL, independente da subpasta
$rootDir = basename(__DIR__);
$baseUrl = '/' . $rootDir . '/';
define('BASE_URL', $baseUrl);

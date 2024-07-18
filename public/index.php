<?php 

// início da sessão - start off session
session_start();

// carregamento das rotas permitidas - loading of permitted routes
$rotas_permitidas = require __DIR__ . '/../inc/rotas.php';

//definição da rota - route definition
$rota = $_GET['rota'] ?? 'home';

// verifica se usuário está logado - checks if user is logged in
if (isset($_SESSION['usuario'])) {
    $rota = "login";
}

// se o usuário está logado e tenta entrar no login - if the use is logged in and tries to login
if (isset($_SESSION['usuario']) && $rota == 'login') {
    $rota = 'home';
}
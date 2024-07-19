<?php 

// início da sessão - start off session
session_start();

// carregamento das rotas permitidas - loading of permitted routes
$rotas_permitidas = require_once __DIR__ . '/../inc/rotas.php';

//definição da rota - route definition
$rota = $_GET['rota'] ?? 'home';

// verifica se usuário está logado - checks if user is logged in
if(!isset($_SESSION['usuario'])){
    $rota = "login";
}

// se o usuário está logado e tenta entrar no login - if the use is logged in and tries to login
if(isset($_SESSION['usuario']) && $rota === 'login'){
    $rota = 'home';
}

// se a rota não existe - if the route does not exist
if(!in_array($rota, $rotas_permitidas)){
    $rota = '404';
}

//apresentação da página - page presemtation
$script = null;
switch ($rota){
    case '404':
        $script = '404.php';
        break;
    
    case 'login':
        $script = 'login.php';
        break;

    case 'home':
        $script = 'home.php';
        break;
}

// apresentação da página
require_once __DIR__ . "/../inc/header.php";
require_once __DIR__ . "/../scripts/$script";
require_once __DIR__ . "/../inc/footer.php";
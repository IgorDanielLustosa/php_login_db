<?php

// verificar se aconteceu um POST - check if POST happened
if ($_SERVER['REQUEST_METHOD'] !== 'POST'){
    header('Location: index.php?rota=login');
    exit;
}

//vai buscar os dados do POST - will fetch the POST data
$usuario = $_POST['text_usuario'] ?? null;
$senha = $_POST['text_senha'] ?? null;

//verifica se os dados estão preechidos - checks if data is filled in
if (empty($usuario) || empty($senha)){
    header('Location: index.php?rota=login');
    exit;
}

// a class da base de dados já está carregada no index.php - the database class is already loaded in index.php
$db = new database();
$params = [
    ':usuario' => $usuario
];
$sql = "SELECT * FROM usuarios WHERE usuario = :usuario";
$result =$db->query($sdl, $params);

// verificar se aconteceu um erro - check if an error occurred
if($result['status'] === 'errpr'){
    header('Location: index.php?rota=404');
    exit;
}

//verifica se o usuário existe - checks if the user exists
if(count($result['data']) === 0){

    //erro na sessão
    $_SESSION['erro'] = 'Usuário ou senha inválidos';

    header('Location: index.php?rota=login');
    exit;
}

//verifica se o usuário existe - checks if the user exists
if(!password_verify($senha, $result['data'][0]->senha)){

    //erro na sessão
    $_SESSION['erro'] = 'Usuário ou senha inválidos';
    
    header('Location: index.php?rota=login');
    exit;
}

// define a sessão do usuário
$_SESSION['usuario'] = $result['data'][0]->usuario;

// redirecionar para a página inicial
header('Location: index.php?rota=home');
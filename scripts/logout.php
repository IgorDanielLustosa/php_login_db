<?php

// destroi a sessão
session_destroy();

// redireciona para a página de login
header('Location: index.php?rota=home');
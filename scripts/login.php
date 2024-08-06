<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            background-image: url('../img/img01.JPEG'); /* Caminho para a sua imagem */
            background-size: cover; /* Para ajustar a imagem ao tamanho da tela */
            background-position: center; /* Centraliza a imagem */
            background-repeat: no-repeat; /* Evita repetição da imagem */
            height: 100vh; /* Garante que o fundo cubra toda a altura da tela */
            margin: 0; /* Remove a margem padrão */
            display: flex; /* Para centralizar o conteúdo verticalmente */
            justify-content: center; /* Para centralizar o conteúdo horizontalmente */
            align-items: center; /* Para centralizar o conteúdo verticalmente */
        }
        .card {
            background: rgba(255, 255, 255, 0.6); /* Transparência no card */
            border-radius: 10px;
            padding: 20px;
            width: 100%; /* Faz o card ocupar toda a largura disponível dentro do col */
            max-width: 400px; /* Define uma largura máxima para o card */
        }
        .logo {
            display: block;
            margin: 0 auto 20px auto; /* Centraliza a imagem e adiciona espaço abaixo */
            max-width: 100%; /* Garante que a imagem não ultrapasse a largura do card */
            height: auto; /* Mantém a proporção da imagem */
        }
    </style>
</head>
<body>
    <?php
    // verifica se existe erro na sessão
    $erro = $_SESSION['erro'] ?? null;
    unset($_SESSION['erro']);
    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card p-5">
                    <img src="../img/LUSTOSA.png" alt="Logo" class="logo" style="max-width: 100px;"> <!-- Imagem de logo -->
                    <h3 class="text-center">Login</h3>
                    <hr>
                    <form action="?rota=login_submit" method="post">
                        <div class="mb-3">
                            <label for="Text_usuario" class="form-label">Usuário</label>
                            <input type="text" name="Text_usuario" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="Text_senha" class="form-label">Senha</label>
                            <input type="password" name="Text_senha" class="form-control" required>
                        </div>
                        <div>
                            <input type="submit" value="Entrar" class="btn btn-secondary w-100">
                        </div>
                    </form>
                    <?php if (!empty($erro)): ?>
                        <div class="alert alert-danger mt-3 p-2 text-center">
                            <?= $erro ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
// logout.php - Encerra a sessão

session_start();

// Limpa as variáveis da sessão
$_SESSION = [];

// Remove o cookie da sessão
if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();

    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params['path'],
        $params['domain'],
        $params['secure'],
        $params['httponly']
    );
}

// Destrói a sessão
session_destroy();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Sair</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <h2>👋 Você saiu do sistema.</h2>
        <p>Sua sessão foi encerrada.</p>
        <a href="login.html">Fazer login novamente</a>
    </div>
</body>
</html>


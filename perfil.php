<?php
// perfil.php - Página exclusiva do administrador

session_start();

// Verifica se o usuário está logado
if (
    !isset(
        $_SESSION['logado'],
        $_SESSION['usuario'],
        $_SESSION['nivel_acesso']
    ) ||
    $_SESSION['logado'] !== true
) {
    header('Location: login.html');
    exit;
}

// Verifica se o usuário é administrador
if (
    $_SESSION['usuario'] !== 'admin' ||
    $_SESSION['nivel_acesso'] !== 'Administrador'
) {
    http_response_code(403);
    ?>
    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Acesso negado</title>
        <link rel="stylesheet" href="css/estilo.css">
    </head>
    <body>
        <div class="container error">
            <h2>⛔ Acesso negado!</h2>
            <p>Somente o administrador pode acessar esta página.</p>
            <a href="painel.php">Voltar ao painel</a>
        </div>
    </body>
    </html>
    <?php
    exit;
}

// Recupera os dados do administrador
$usuario = htmlspecialchars(
    $_SESSION['usuario'],
    ENT_QUOTES,
    'UTF-8'
);

$nivel_acesso = htmlspecialchars(
    $_SESSION['nivel_acesso'],
    ENT_QUOTES,
    'UTF-8'
);

$data_login = htmlspecialchars(
    $_SESSION['data_login'] ?? 'Não informada',
    ENT_QUOTES,
    'UTF-8'
);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Perfil Administrativo</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container painel">

        <h2>🛡️ Perfil Administrativo</h2>

        <p>Bem-vindo ao perfil do administrador!</p>

        <label>Usuário:</label>
        <p><?php echo $usuario; ?></p>

        <label>Nível de acesso:</label>
        <p><?php echo $nivel_acesso; ?></p>

        <label>Data e hora do login:</label>
        <p><?php echo $data_login; ?></p>

        <p>Você tem permissão para acessar esta página administrativa.</p>

        <div class="logout">
            <p><a href="painel.php">Voltar ao painel</a></p>
            <a href="logout.php">Sair do sistema</a>
        </div>

    </div>
</body>
</html>


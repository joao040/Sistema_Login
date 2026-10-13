<?php
// painel.php - Página de boas-vindas

session_start();

// Protege a página
if (
    !isset(
        $_SESSION['logado'],
        $_SESSION['usuario'],
        $_SESSION['nivel_acesso'],
        $_SESSION['data_login']
    ) ||
    $_SESSION['logado'] !== true
) {
    header('Location: login.html');
    exit;
}

// Recupera os dados da sessão
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
    $_SESSION['data_login'],
    ENT_QUOTES,
    'UTF-8'
);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container painel">

        <h2>✅ Bem-vindo, <?php echo $usuario; ?>!</h2>

        <p>
            Nível de acesso:
            <strong><?php echo $nivel_acesso; ?></strong>
        </p>

        <p>
            Data e hora do login:
            <strong><?php echo $data_login; ?></strong>
        </p>

        <?php if ($_SESSION['nivel_acesso'] === 'Administrador') { ?>

            <p>Você tem acesso administrativo ao sistema!</p>

            <p>
                <a href="perfil.php">Acessar perfil administrativo</a>
            </p>

        <?php } else { ?>

            <p>Você está acessando o sistema como usuário comum.</p>

        <?php } ?>

        <div class="logout">
            <a href="logout.php">Sair do sistema</a>
        </div>

    </div>
</body>
</html>


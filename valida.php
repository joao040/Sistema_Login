<?php
// valida.php - Processa o login e inicia a sessão

session_start();

date_default_timezone_set('America/Sao_Paulo');

// Verifica se os dados foram enviados por POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.html');
    exit;
}

// Dados simulados dos usuários
$usuario_admin = 'admin';
$senha_admin = '12345';

$usuario_comum = 'usuario';
$senha_comum = '12345';

// Recebe os dados do formulário
$usuario = $_POST['usuario'] ?? '';
$senha = $_POST['senha'] ?? '';

// Verifica se é administrador
if ($usuario === $usuario_admin && $senha === $senha_admin) {

    $nivel_acesso = 'Administrador';

// Verifica se é usuário comum
} elseif ($usuario === $usuario_comum && $senha === $senha_comum) {

    $nivel_acesso = 'Usuário';

// Se as credenciais estiverem incorretas
} else {
    echo "
    <!DOCTYPE html>
    <html lang='pt-BR'>
    <head>
        <meta charset='UTF-8'>
        <title>Erro</title>
        <link rel='stylesheet' href='css/estilo.css'>
    </head>
    <body>
        <div class='container error'>
            <h2>❌ Login inválido!</h2>
            <p>Usuário ou senha incorretos.</p>
            <a href='login.html'>Tentar novamente</a>
        </div>
    </body>
    </html>";
    exit;
}

// Gera um novo ID para a sessão
session_regenerate_id(true);

// Armazena os dados na sessão
$_SESSION['logado'] = true;
$_SESSION['usuario'] = $usuario;
$_SESSION['nivel_acesso'] = $nivel_acesso;

// Armazena a data e a hora do login
$_SESSION['data_login'] = date('d/m/Y H:i:s');

// Redireciona para o painel
header('Location: painel.php');
exit;
?>


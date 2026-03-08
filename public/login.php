<?php
session_start();
require_once __DIR__ . '/../config/database.php';

//mensagem do cadastro simulado
if (!empty($_SESSION['mensagem'])) {
    $mensagem = $_SESSION['mensagem'];
    unset($_SESSION['mensagem']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario']);
    $senha = trim($_POST['senha']);

    //busca o usuário informado no banco
    $stmt = $pdo->prepare("SELECT * FROM Cliente WHERE usuario = :usuario");
    $stmt->execute(['usuario' => $usuario]);
    $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

    //valida o login
    if ($cliente && hash('sha256', $senha) === $cliente['senha']) {
        $_SESSION['usuario'] = $cliente['usuario'];
        $_SESSION['nome'] = $cliente['nome'];
        header('Location: produtos.php');
        exit;
    } else {
        $erro = "Usuário ou senha inválidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Login - Retro Jerseys</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <h1>Retro Jerseys</h1>
            <nav class="menu">
            <a href="index.php">Home</a>
            <a href="login.php">Login</a>
            <?php if (isset($_SESSION['usuario'])): ?>
                <span class="bem-vindo">Bem-vindo(a), <?= htmlspecialchars($_SESSION['nome']) ?></span>
                <a href="logout.php" class="sair">Sair</a>
            <?php endif; ?>
            </nav>
        </header>
        <main class="login-container">
            <form method="POST" class="formulario">
                <h2>Entrar</h2>
                <?php if (!empty($mensagem)) : ?>
                    <p class="sucesso"><?= $mensagem ?></p>
                <?php endif; ?>
                <?php if (!empty($erro)) : ?>
                    <p class="erro"><?= $erro ?></p>
                <?php endif; ?>
                <input type="text" name="usuario" placeholder="Usuário" required>
                <input type="password" name="senha" placeholder="Senha" required>
                <button type="submit">Entrar</button>
            </form>
        </main>
    </body>
</html>
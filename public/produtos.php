<?php
session_start();
require_once __DIR__ . '/../config/database.php';

//busca todos produtos do banco
$stmt = $pdo->query("SELECT * FROM Produto ORDER BY id ASC");
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Camisas Imortais - Home</title>
  <link rel="stylesheet" href="style.css">
</head>
  <body>
    <header>
      <h1>Camisas Imortais</h1>
      <nav class="menu">
        <a href="index.php">Home</a>
        <a href="login.php">Login</a>
        <?php if (isset($_SESSION['usuario'])): ?>
          <span class="bem-vindo">Bem-vindo(a), <?= htmlspecialchars($_SESSION['nome']) ?></span>
          <a href="logout.php" class="sair">Sair</a>
        <?php endif; ?>
      </nav>
    </header>
    <main class="produtos">
      <?php if (count($produtos) > 0): ?>
        <?php foreach ($produtos as $produto): ?>
          <div class="produto">
            <img src="img/<?= htmlspecialchars($produto['imagem']) ?>" alt="<?= htmlspecialchars($produto['descricao']) ?>">
            <h3><?= htmlspecialchars($produto['descricao']) ?></h3>
            <p>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
            <button disabled>Adicionar ao Carrinho</button>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p>Nenhum produto cadastrado.</p>
      <?php endif; ?>
    </main>
  </body>
</html>
<?php function renderProdutos($produtos) { ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Produtos</title>
</head>
<body>
    <h1>Lista de Produtos</h1>
    <form action="?controller=produto&action=store" method="POST">
        <input type="text" name="descricao" placeholder="Descrição" required>
        <input type="number" step="0.01" name="preco" placeholder="Preço" required>
        <input type="text" name="tamanho" placeholder="Tamanho">
        <input type="text" name="time" placeholder="Time">
        <button type="submit">Cadastrar</button>
    </form>
    <ul>
        <?php foreach ($produtos as $p): ?>
            <li>
                <?= htmlspecialchars($p['descricao']) ?> - R$<?= htmlspecialchars($p['preco']) ?>
                <a href="?controller=produto&action=delete&id=<?= $p['id'] ?>">[remover]</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
<?php } ?>
<?php function renderItensPedido($itens) { ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Itens do Pedido</title>
</head>
<body>
    <h1>Itens de Pedido</h1>
    <form action="?controller=itempedido&action=store" method="POST">
        <input type="number" name="pedido_id" placeholder="Pedido ID" required>
        <input type="number" name="produto_id" placeholder="Produto ID" required>
        <input type="number" name="quantidade" placeholder="Quantidade" required>
        <input type="number" step="0.01" name="preco_unitario" placeholder="Preço Unitário" required>
        <button type="submit">Adicionar Item</button>
    </form>
    <ul>
        <?php foreach ($itens as $item): ?>
            <li>
                Item #<?= $item['id'] ?> - Pedido: <?= $item['pedido_id'] ?>, Produto: <?= $item['produto_id'] ?>, Quantidade: <?= $item['quantidade'] ?>
                <a href="?controller=itempedido&action=delete&id=<?= $item['id'] ?>">[remover]</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
<?php } ?>
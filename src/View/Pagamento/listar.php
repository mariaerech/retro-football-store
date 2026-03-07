<?php function renderPagamentos($pagamentos) { ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Pagamentos</title>
</head>
<body>
    <h1>Lista de Pagamentos</h1>
    <form action="?controller=pagamento&action=store" method="POST">
        <input type="number" name="pedido_id" placeholder="Pedido ID" required>
        <input type="number" step="0.01" name="valor" placeholder="Valor" required>
        <input type="text" name="status" placeholder="Status">
        <input type="number" step="0.01" name="desconto" placeholder="Desconto">
        <input type="text" name="nota_fiscal" placeholder="Nota Fiscal">
        <input type="text" name="forma_pagamento" placeholder="Forma de Pagamento">
        <button type="submit">Registrar Pagamento</button>
    </form>
    <ul>
        <?php foreach ($pagamentos as $p): ?>
            <li>
                Pagamento #<?= $p['id'] ?> - Pedido #<?= $p['pedido_id'] ?> - R$<?= $p['valor'] ?>
                <a href="?controller=pagamento&action=delete&id=<?= $p['id'] ?>">[remover]</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
<?php } ?>
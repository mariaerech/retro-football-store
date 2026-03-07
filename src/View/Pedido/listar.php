<?php function renderPedidos($pedidos) { ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Pedidos</title>
</head>
<body>
    <h1>Lista de Pedidos</h1>
    <form action="?controller=pedido&action=store" method="POST">
        <input type="number" name="cliente_id" placeholder="ID do Cliente" required>
        <button type="submit">Criar Pedido</button>
    </form>
    <ul>
        <?php foreach ($pedidos as $p): ?>
            <li>
                Pedido #<?= $p['id'] ?> - Cliente ID: <?= $p['cliente_id'] ?>
                <a href="?controller=pedido&action=delete&id=<?= $p['id'] ?>">[remover]</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
<?php } ?>
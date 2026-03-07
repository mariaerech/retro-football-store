<?php function renderClientes($clientes) { ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Clientes</title>
</head>
<body>
    <h1>Lista de Clientes</h1>
    <form action="?controller=cliente&action=store" method="POST">
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="cpf" placeholder="CPF" required>
        <input type="text" name="rg" placeholder="RG">
        <input type="text" name="endereco" placeholder="Endereço">
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Cadastrar</button>
    </form>
    <ul>
        <?php foreach ($clientes as $c): ?>
            <li>
                <?= htmlspecialchars($c['nome']) ?> (<?= htmlspecialchars($c['email']) ?>)
                <a href="?controller=cliente&action=delete&id=<?= $c['id'] ?>">[remover]</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
<?php } ?>
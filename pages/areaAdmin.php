<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

require_once '../Classes/usuario.php';
require_once '../Classes/produto.php';

$usuario = new Usuario();
$produto = new Produto();

$lista_usuarios = [];
$lista_produtos = [];

if ($usuario->conectar() && $produto->conectar()) {
    $lista_usuarios = $usuario->listarUsuarios();
    $lista_produtos = $produto->listar();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>+STYLE - Admin</title>
    <link rel="stylesheet" href="../CSS/menu.css">
    <link rel="stylesheet" href="../CSS/admin.css">
</head>
<body>
    <header class="header">
        <div class="logo">
            <img src="../imagem/logo-icon.png" alt="+STYLE" class="logo-icon">
            +STYLE - Painel Admin
        </div>
        <nav class="nav">
            <span style="color: #ccc;">Olá, <?php echo $_SESSION['nome']; ?>!</span>
            <a href="home.php">Home</a>
            <a href="logout.php" class="btn-login">Sair</a>
        </nav>
    </header>

    <div class="admin-container">
        <div class="admin-card">
            <h2>➕ Cadastrar Novo Casaco</h2>
            <form action="processa_produto.php" method="POST">
                <input type="text" name="nome" placeholder="Nome do Casaco" required>
                <input type="number" name="qtd" placeholder="Quantidade" required>
                <textarea name="descricao" placeholder="Descrição" required></textarea>
                <input type="number" step="0.01" name="valor" placeholder="Valor R$" required>
                <input type="text" name="imagem" placeholder="Nome da imagem" required>
                <button type="submit">Cadastrar Produto</button>
            </form>
        </div>

        <div class="admin-card">
            <h2>👥 Usuários Cadastrados</h2>
            <div class="lista">
                <?php foreach ($lista_usuarios as $user): ?>
                <div class="item">
                    <strong><?php echo htmlspecialchars($user['nome']); ?></strong>
                    <br><?php echo htmlspecialchars($user['email']); ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="admin-card">
            <h2>🧥 Produtos Cadastrados</h2>
            <div class="lista">
                <?php foreach ($lista_produtos as $prod): ?>
                <div class="item">
                    <strong><?php echo htmlspecialchars($prod['nome']); ?></strong>
                    - R$ <?php echo number_format($prod['valor'], 2, ',', '.'); ?>
                    <br>Estoque: <?php echo $prod['qtd']; ?> unidades
                    <br><?php echo htmlspecialchars($prod['descricao']); ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
</html>
<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
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
            <img src="../imagem/icone.png" alt="+STYLE" class="logo-icon">
            +STYLE - Admin
        </div>
        <nav class="nav">
            <a href="home.php">Home</a>
            <a href="logout.php" class="btn-login">Sair</a>
        </nav>
    </header>

    <div class="admin-container">
    <!-- Formulário de Cadastro -->
    <div class="admin-card">
        <h2 class="section-title">Cadastrar Novo Casaco</h2>
        
        <form action="processa_produto.php" method="POST">
            <div class="form-group">
                <label>Nome do Casaco:</label>
                <input type="text" name="nome" required>
            </div>
            
            <div class="form-group">
                <label>Quantidade:</label>
                <input type="number" name="qtd" required>
            </div>
            
            <div class="form-group">
                <label>Descrição:</label>
                <textarea name="descricao" required></textarea>
            </div>
            
            <div class="form-group">
                <label>Valor:</label>
                <input type="number" step="0.01" name="valor" required>
            </div>
            
            <div class="form-group">
                <label>Nome da Imagem:</label>
                <input type="text" name="imagem" required>
                <div class="placeholder">ex: casaco1.jpg</div>
            </div>
            
            <button type="submit" class="btn-cadastrar">Cadastrar Produto</button>
        </form>
    </div>

    <hr class="divider">

    <!-- Lista de Produtos Cadastrados -->
    <div class="admin-card">
        <h2 class="section-title">Produtos Cadastrados</h2>
        
        <div class="produtos-lista">
            <?php
            try {
                $conexao = new PDO('mysql:host=localhost;dbname=estacio2025', 'root', '');
                $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $stmt = $conexao->query("SELECT * FROM produtos");
                $produtos = $stmt->fetchAll();
                
                if (count($produtos) > 0) {
                    foreach ($produtos as $produto) {
                        echo "
                        <div class='produto-item'>
                            <strong>{$produto['nome']} - R$ {$produto['valor']}</strong>
                            <br>Quantidade: {$produto['qtd']}
                        </div>";
                    }
                } else {
                    echo "<p>Nenhum produto cadastrado ainda.</p>";
                }
            } catch(PDOException $e) {
                echo "<p>Erro ao carregar produtos</p>";
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>
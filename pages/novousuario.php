<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>+STYLE - Cadastro</title>
    <link rel="stylesheet" href="../CSS/menu.css">
    <link rel="stylesheet" href="../CSS/novo_usuario.css">

</head>
<body>
    <header class="header">
        <div class="logo">
            <img src="../imagem/icone.png" alt="+STYLE" class="logo-icon">
            +STYLE
        </div>
        <nav class="nav">
            <a href="home.php" class="btn-login">Home</a>
            <a href="login.php" class="btn-login">Login</a>
        </nav>
    </header>

    <div class="cadastro-container">
        <div class="cadastro-card">
            <h2 class="cadastro-title">CADASTRO</h2>
            
            <form action="processa_cadastro.php" method="POST">
                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" name="nome" required>
                </div>
                
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label>Senha:</label>
                    <input type="password" name="senha" required>
                </div>
                
                <button type="submit" class="btn-cadastrar">Cadastrar</button>
            </form>

            <div class="login-link">
                <p><strong>Já tem conta? <a href="login.php">Faça login aqui</a></strong></p>
            </div>
        </div>
    </div>
</body>
</html>
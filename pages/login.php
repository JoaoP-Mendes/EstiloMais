<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - +STYLE</title>
    <link rel="stylesheet" href="../CSS/menu.css">
    <link rel="stylesheet" href="../CSS/login.css">
    
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
            <a href="areaAdmin.php" class="btn-login">Adm</a>
        </nav>
    </header>

     <div class="login_div">
        <div class="login_card">
            <h2 class="login_tittle">LOGIN</h2>
            
            <form action="processa_login.php" method="POST">
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label>Senha:</label>
                    <input type="password" name="senha" required>
                </div>
                
                <button type="submit" class="btn_entrar">Enter</button>
            </form>

            <div class="cadastro_login">
                <p>Não tem conta? <a href="novousuario.php">Aperta Aqui para cadastrar</a></p>
                
        </div>
    </div>
</body>
</html>
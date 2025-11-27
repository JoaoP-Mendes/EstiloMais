<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>+STYLE - Casacos</title>
    <link rel="stylesheet" href="../CSS/home.css">
    <link rel="stylesheet" href="../CSS/menu.css">
    <link rel="stylesheet" href="../CSS/footer.css">
</head>
<body>
    <header class="header">
    <div class="logo">
        <img src="../imagem/icone.png" alt="+STYLE" class="logo-icon">
        +STYLE
    </div>
    <nav class="nav">
        <a href="home.php " class="btn-login">Home</a>
        <a href="login.php" class="btn-login">Login</a>
    </nav>
</header>
    <!-- Carrossel COM BOTÕES -->
    <!-- Carrossel CORRIGIDO -->
<div class="carrossel">
    <div class="carrossel-container">
        <div class="carrossel-slide">
            <img src="../imagem/slide/promocao.png" alt="Casaco 1">
        </div>
        <div class="carrossel-slide">
            <img src="../imagem/slide/maismodelos.png" alt="Casaco 2">
        </div>
        <div class="carrossel-slide">
            <img src="../imagem/slide/strangerThings.png" alt="Casaco 3">
        </div>
    </div>
    
    <!-- Botões de navegação -->
    <div class="carrossel-botoes">
        <button class="carrossel-btn" onclick="prevSlide()">❮</button>
        <button class="carrossel-btn" onclick="nextSlide()">❯</button>
    </div>
</div>
    <section class="produtos">
    <div class="produto">
        <img src="../imagem/casacos/strangercasaco.png" alt="Casaco Style Preto">
        <h3>Casaco Style Preto</h3>
        <p>Casaco elegante para inverno</p>
        <p class="preco">R$ 99,99</p>
        <button>Comprar</button>
    </div>
    
    <div class="produto">
        <img src="../imagem/casacos/strangercasaco.png" alt="Casaco Elegance">
        <h3>Casaco Elegance</h3>
        <p>Casaco premium com design sofisticado</p>
        <p class="preco">R$ 129,99</p>
        <button>Comprar</button>
    </div>

    <div class="produto">
        <img src="../imagem/casacos/strangercasaco.png" alt="Casaco Elegance">
        <h3>Casaco Elegance</h3>
        <p>Casaco premium com design sofisticado</p>
        <p class="preco">R$ 129,99</p>
        <button>Comprar</button>
    </div>

    <div class="produto">
        <img src="../imagem/casacos/strangercasaco.png" alt="Casaco Elegance">
        <h3>Casaco Elegance</h3>
        <p>Casaco premium com design sofisticado</p>
        <p class="preco">R$ 129,99</p>
        <button>Comprar</button>
    </div>

    
</section>
    <!-- Restante do código permanece igual -->
    <section class="produtos">
        <?php
        try {
            $conexao = new PDO('mysql:host=localhost;dbname=estacio2025', 'root', '');
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $conexao->query("SELECT * FROM produtos WHERE qtd > 0");
            $produtos = $stmt->fetchAll();
            
            foreach ($produtos as $produto) {
                echo "
                <div class='produto'>
                    <img src='../imagem/{$produto['imagem']}' alt='{$produto['nome']}'>
                    <h3>{$produto['nome']}</h3>
                    <p>{$produto['descricao']}</p>
                    <p class='preco'>R$ {$produto['valor']}</p>
                    <button>Comprar</button>
                </div>";
            }
        } catch(PDOException $e) {
            echo "<p>Erro ao carregar produtos</p>";
        }
        ?>
    </section>

    <footer class="footer">
        <div class="contato">
            <p><strong>FALE CONOSCO:</strong></p>
            <p>(67) 9 9999-TIII</p>
            <p>seunome@gmail.com</p>
        </div>
        <p>&copy; 2024 +STYLE - Todos os direitos reservados</p>
    </footer>

    <script src="../JS/slideimagens.js"></script>
</body>
</html>
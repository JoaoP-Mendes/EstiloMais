<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>+STYLE</title>
    <link rel="stylesheet" href="../CSS/home.css">
    <link rel="stylesheet" href="../CSS/menu.css">

    <script src="../JS/slideimagens.js"></script>

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
        <a href="areaAdmin.php" class="btn-login">Adm</a>
    </nav>
</header>
   
<div class="slide">
     <!-- Area do Slide -->
    <div class="slide_div">
        <div class="slide_carrossel">
            <img src="../imagem/slide/promocao.png" alt="Casaco 1">
        </div>
        <div class="slide_carrossel">
            <img src="../imagem/slide/maismodelos.png" alt="Casaco 2">
        </div>
        <div class="slide_carrossel">
            <img src="../imagem/slide/strangerThings.png" alt="Casaco 3">
        </div>
    </div>
        <div class="botao_slide">
        <button class="btn_slide" onclick="prevSlide()">U+003e</button>
        <button class="btn_slide" onclick="nextSlide()">U+276f</button>
    </div>
</div>

    <!--Area produtos-->
<section class="produtos">
    <div class="casaco">
            <img src="../imagem/casacos/Azul bonito.png" alt="Casaco Style Preto">
            <h3>Casaco Style azul</h3>
            <p>Casaco estiliso azul</p>
            <p class="preco">R$ 249,99</p>
        <button>Comprar</button>

    </div>
    
    <div class="casaco">
            <img src="../imagem/casacos/Vemelho.png" alt="Casaco Elegance">
            <h3>Casaco Style Azul</h3>
            <p>Casaco estiliso vermelho</p>
            <p class="preco">R$ 249,99</p>
        <button>Comprar</button>

    </div>

    <div class="casaco">
            <img src="../imagem/casacos/strangercasaco.png" alt="Casaco Elegance">
            <h3>Casaco Stranger Things</h3>
            <p>Casaco premium Stranger Things</p>
            <p class="preco">R$ 199,99</p>
        <button>Comprar</button>

    </div>

    <div class="casaco">
        <img src="../imagem/casacos/Casaco vermelho comum.png" alt="Casaco Elegance">
        <h3>Casaco moletom</h3>
        <p>Casaco Moletom Simples</p>
        <p class="preco">R$ 129,99</p>
        <button>Comprar</button>

    </div>

    
</section>
<section class="produtos">

<?php
require_once '../Classes/produto.php';
$produto = new Produto();

if ($produto->conectar()) {
    $produtos = $produto->listar();
    
    foreach ($produtos as $prod) {
        echo "
        <div class='casaco'>
            <img src='../imagem/casacos/{$prod['imagem']}' alt='{$prod['nome']}'>
            <h3>{$prod['nome']}</h3>
            <p>{$prod['descricao']}</p>
            <p class='preco'>R$ {$prod['valor']}</p>
            <button>Comprar</button>
        </div>";
    }
}
?>
</section>

<footer class="footer">
        <div class="contato">
            <p><strong>FALE CONOSCO:</strong></p>
            <p>(67) 9 8112-7218</p>
            <p>maisStyle@gmail.com</p>
        </div>
        <p>&copy; 2025 +STYLE</p>
    </footer>


</body>
</html>
<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

require_once '../Classes/produto.php';

if ($_POST) {
    $produto = new Produto();
    
    if (!$produto->conectar()) {
        die("Erro banco: " . $produto->msgErro);
    }
    
    $nome = $_POST['nome'];
    $qtd = $_POST['qtd'];
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];
    $imagem = $_POST['imagem'];
    
    if ($produto->cadastrar($nome, $qtd, $descricao, $valor, $imagem)) {
        header('Location: areaAdmin.php?sucesso=1');
    } else {
        header('Location: areaAdmin.php?erro=1');
    }
    exit();
}
?>
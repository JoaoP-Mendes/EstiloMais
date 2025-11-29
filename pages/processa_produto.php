<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

require_once '../Classes/produtos.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $produto = new Produto();
    $produto->conectar("estacio2025", "localhost", "root", "");

    if ($produto->msgErro != ""){
        echo "Erro na conexão: ".$produto->msgErro;
        exit;
    }


    $produto->cadastrarProduto(
        $_POST['nome'],
        $_POST['qtd'],
        $_POST['descricao'],
        $_POST['valor'],
        $_POST['imagem'],

    );
    header('Location: areaAdmin.php?sucesso=1');
}
?>
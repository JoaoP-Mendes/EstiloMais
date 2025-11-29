<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

require_once '../Classes/produto.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $produto = new Produto();
    $produto->conectar("estacio2025", "localhost", "root", "");
    
    if ($produto->msgErro != "") {
        echo "Erro na conexão: ".$produto->msgErro;
        exit;
    }
    
    if (isset($_FILES['imagem_arquivo']) && $_FILES['imagem_arquivo']['error'] === 0) {
        $imagem = $_FILES['imagem_arquivo'];
        
        $tiposPermitidos = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($imagem['type'], $tiposPermitidos)) {
            die('Tipo de arquivo não permitido. Use JPG, PNG ou GIF.');
        }
        
        if ($imagem['size'] > 2 * 1024 * 1024) {
            die('Arquivo muito grande. Máximo: 2MB.');
        }
        
        $extensao = pathinfo($imagem['name'], PATHINFO_EXTENSION);
        $nomeImagem = uniqid() . '.' . $extensao;
        $caminhoDestino = '../imagem/uploads/' . $nomeImagem;  // ← MUDEI AQUI
        
        if (move_uploaded_file($imagem['tmp_name'], $caminhoDestino)) {
            $produto->cadastrarProduto(
                $_POST['nome'],
                $_POST['qtd'],
                $_POST['descricao'],
                $_POST['valor'],
                $nomeImagem
            );
            header('Location: areaAdmin.php?sucesso=1');
        } else {
            die('Erro ao fazer upload da imagem.');
        }
    } else {
        die('Erro no upload da imagem.');
    }
}
?>
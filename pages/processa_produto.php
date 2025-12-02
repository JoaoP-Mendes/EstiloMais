<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

require_once '../Classes/produto.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $produto = new Produto();
    
    if (!$produto->conectar()) {
        die("Erro no banco de dados");
    }
    
    if (isset($_FILES['imagem_arquivo']) && $_FILES['imagem_arquivo']['error'] == 0) {
        $imagem = $_FILES['imagem_arquivo'];
        
        $tiposPermitidos = ['image/jpeg', 'image/png', 'image/gif'];
        $tipoImagem = mime_content_type($imagem['tmp_name']);
        
        if (!in_array($tipoImagem, $tiposPermitidos)) {
            die('Tipo de arquivo não permitido. Use JPG, PNG ou GIF.');
        }
        
        if ($imagem['size'] > 2 * 1024 * 1024) {
            die(' Arquivo muito grande. Máximo: 2MB.');
        }
        
        $pastaUploads = '../imagem/uploads/';
        if (!is_dir($pastaUploads)) {
            mkdir($pastaUploads, 0777, true);
        }
        
        $extensao = pathinfo($imagem['name'], PATHINFO_EXTENSION);
        $nomeUnico = uniqid() . '_' . time() . '.' . $extensao;
        $caminhoDestino = $pastaUploads . $nomeUnico;
        
        if (move_uploaded_file($imagem['tmp_name'], $caminhoDestino)) {
            if ($produto->cadastrar(
                $_POST['nome'],
                $_POST['qtd'],
                $_POST['descricao'],
                $_POST['valor'],
                $nomeUnico  
            )) {
                header('Location: areaAdmin.php?sucesso=1');
            } else {
                die('Erro ao salvar no banco');
            }
        } else {
            die('Err upload imagem.');
        }
    } else {
        die('Nenhuma imagem foi enviada.');
    }
    exit();
}
?>
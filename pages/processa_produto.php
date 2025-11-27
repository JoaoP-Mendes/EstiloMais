<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $conexao = new PDO('mysql:host=localhost;dbname=estacio2025', 'root', '');
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "INSERT INTO produtos (nome, qtd, descricao, valor, imagem) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conexao->prepare($sql);
        $stmt->execute([
            $_POST['nome'],
            $_POST['qtd'],
            $_POST['descricao'],
            $_POST['valor'],
            $_POST['imagem']
        ]);
        
        header('Location: areaAdmin.php?sucesso=1');
    } catch(PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>
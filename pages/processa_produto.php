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
        
        // Processar upload da imagem
        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
            $imagem = $_FILES['imagem'];
            
            // Validar tipo de arquivo
            $tiposPermitidos = ['image/jpeg', 'image/png', 'image/gif'];
            if (!in_array($imagem['type'], $tiposPermitidos)) {
                die('Tipo de arquivo não permitido. Use apenas JPG, PNG ou GIF.');
            }
            
            // Validar tamanho (máx. 2MB)
            if ($imagem['size'] > 2 * 1024 * 1024) {
                die('Arquivo muito grande. Tamanho máximo: 2MB.');
            }
            
            // Gerar nome único para a imagem
            $extensao = pathinfo($imagem['name'], PATHINFO_EXTENSION);
            $nomeImagem = uniqid() . '.' . $extensao;
            $caminhoImagem = '../uploads/' . $nomeImagem;
            
            // Mover arquivo para pasta uploads
            if (move_uploaded_file($imagem['tmp_name'], $caminhoImagem)) {
                // Inserir no banco de dados
                $sql = "INSERT INTO produtos (nome, qtd, descricao, valor, imagem) VALUES (?, ?, ?, ?, ?)";
                $stmt = $conexao->prepare($sql);
                $stmt->execute([
                    $_POST['nome'],
                    $_POST['qtd'],
                    $_POST['descricao'],
                    $_POST['valor'],
                    $nomeImagem
                ]);
                
                header('Location: areaAdmin.php?sucesso=1');
            } else {
                die('Erro ao fazer upload da imagem.');
            }
        } else {
            die('Erro no upload da imagem.');
        }
        
    } catch(PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>
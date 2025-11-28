<?php
require_once '../Classes/usuario.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = new Usuario();
    $usuario->nome = $_POST['nome'];
    $usuario->email = $_POST['email'];
    $usuario->senha = $_POST['senha'];
    
    try {
        $conexao = new PDO('mysql:host=localhost;dbname=estacio2025', 'root', '');
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        if ($usuario->cadastrar($conexao)) {
            header('Location: login.php?sucesso=1');
        } else {
            header('Location: novousuario.php?erro=1');
        }
    } catch(PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>
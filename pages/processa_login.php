<?php
require_once '../Classes/usuario.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    try {
        $conexao = new PDO('mysql:host=localhost;dbname=estacio2025', 'root', '');
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $usuario = Usuario::login($conexao, $email, $senha);
        
        if ($usuario) {
            session_start();
            $_SESSION['usuario'] = $usuario['nome'];
            $_SESSION['id_usuario'] = $usuario['id_usuario'];
            $_SESSION['email'] = $usuario['email'];
            
            // Se for admin, redireciona para área admin
            if ($email == 'admin@style.com') {
                header('Location: areaAdmin.php');
            } else {
                header('Location: home.php');
            }
        } else {
            header('Location: login.php?erro=1');
        }
    } catch(PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>
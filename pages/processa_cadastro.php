<?php
session_start();
require_once '../Classes/usuario.php';

if ($_POST) {
    $usuario = new Usuario();
    
    if (!$usuario->conectar()) {
        die("Erro banco: " . $usuario->msgErro);
    }
    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    if ($usuario->cadastrar($nome, $email, $senha)) {
        header('Location: login.php?sucesso=1');
    } else {
        header('Location: novousuario.php?erro=1');
    }
    exit();
}
?>
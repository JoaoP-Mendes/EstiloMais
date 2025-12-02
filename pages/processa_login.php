<?php
session_start();
require_once '../Classes/usuario.php';

if ($_POST) {
    $usuario = new Usuario();
    
    if (!$usuario->conectar()) {
        die("Erro banco: " . $usuario->msgErro);
    }
    
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    if ($usuario->logar($email, $senha)) {
        header('Location: areaAdmin.php');
    } else {
        header('Location: login.php?erro=1');
    }
    exit();
}
?>
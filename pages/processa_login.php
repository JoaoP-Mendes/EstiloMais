<?php
require_once '../Classes/usuario.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    $usuario = new Usuario();
    $usuario->conectar("estacio2025", "localhost", "root", "");
    
    if ($usuario->msgErro != "") {
        echo "Erro na conexão: ".$usuario->msgErro;
        exit;
    }
    
    if ($usuario->logarUsuario($email, $senha)) {
        // QUALQUER usuário logado vai para a área admin
        header('Location: areaAdmin.php');
    } else {
        header('Location: login.php?erro=1');
    }
}
?>
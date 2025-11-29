<?php
require_once '../Classes/usuario.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = new Usuario();

    $usuario->conectar("estacio2025", "localhost", "root", "");
    
    if ($usuario->msgErro != "") {
        echo "Erro na conexão : ".$usuarui->msgerro;
        exit;
    }
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

    if ($usuario->cadastrar($nome, $email, $senha)){
        header('Location: login.php?sucesso=1');
    } else {
        header('Location: novousuario.php?erro=1');
    }

}
?>
<?php
require_once '../Classes/usuario.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = new Usuario();

    $usuario->conectar("estacio2025", "localhost", "root", "");
    // $usuario->conectar("estacio2025", "localhost", "root", "sua_senha"); ->teste
    
    if ($usuario->msgErro != "") {
        echo "Erro na conexão : ".$usuarui->msgerro;
        exit;
    }
    $nome = $_POST['nome'];
    //$endereco= $_POST['endereco'];
    //$cidade = $_POST['cidade'];
    //$estado = $_POST['estado'];
    //$telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if ($usuario->cadastrar($nome, $email, $senha)){
        header('Location: login.php?sucesso=1');
    } else {
        header('Location: novousuario.php?erro=1');
    }

}
?>
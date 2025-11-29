<?php
require_once '../Classes/usuario.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
        $usuario = new Usuario();
        $usuario->conectar("estacio2025", "localhost", "root", "");
        
        if ($usuario ->msgErro != "") {
            echo "Erro na conexão : ".$usuario->msgErro;
            exit;
        } 
        if ($usuario->logarUsuario($email, $senha)){
            if ($email == 'admin@style.com'){
                header('Location> areaAdmin.php');
            } else {
                header('Location: home.php');
            } 
        } else{
            header('Location: login.ph?erro=1');
        }
}
?>
<?php
require_once __DIR__ . '/../config.php';

class Usuario {
    public $msgErro = "";
    private $conn;
    
    public function conectar() {
        $this->conn = conectarBanco();
        return true;
    }
    
    public function cadastrar($nome, $email, $senha) {
        $nome = $this->conn->real_escape_string($nome);
        $email = $this->conn->real_escape_string($email);
                $sql = "SELECT id_usuario FROM usuarios WHERE email = '$email'";
        $result = $this->conn->query($sql);
        
        if ($result->num_rows > 0) {
            return false;
        }

        $senha_md5 = md5($senha);
        $sql = "INSERT INTO usuarios (nome, email, senha) 
                VALUES ('$nome', '$email', '$senha_md5')";
        
        return $this->conn->query($sql);
    }
    
    public function logar($email, $senha) {
        $email = $this->conn->real_escape_string($email);
        $senha_md5 = md5($senha);
        
        $sql = "SELECT id_usuario, nome FROM usuarios 
                WHERE email = '$email' AND senha = '$senha_md5'";
        
        $result = $this->conn->query($sql);
        
        if ($result->num_rows > 0) {
            $dados = $result->fetch_assoc();
            $_SESSION['id_usuario'] = $dados['id_usuario'];
            $_SESSION['nome'] = $dados['nome'];
            $_SESSION['email'] = $email;
            return true;
        }
        return false;
    }
    
    public function listarUsuarios() {
        $sql = "SELECT id_usuario, nome, email FROM usuarios ORDER BY nome";
        $result = $this->conn->query($sql);
        
        $usuarios = [];
        while ($row = $result->fetch_assoc()) {
            $usuarios[] = $row;
        }
        return $usuarios;
    }
}
?>
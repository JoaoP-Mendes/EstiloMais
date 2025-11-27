<?php
class Usuario {
    public $id;
    public $nome;
    public $email;
    public $senha;
    
    public function cadastrar($conexao) {
        // Verificar se email já existe
        $stmt = $conexao->prepare("SELECT id_usuario FROM usuarios WHERE email = ?");
        $stmt->execute([$this->email]);
        
        if ($stmt->fetch()) {
            return false; // Email já cadastrado
        }
        
        $senhaHash = password_hash($this->senha, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
        $stmt = $conexao->prepare($sql);
        return $stmt->execute([$this->nome, $this->email, $senhaHash]);
    }
    
    public static function login($conexao, $email, $senha) {
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->execute([$email]);
        $usuario = $stmt->fetch();
        
        if ($usuario && password_verify($senha, $usuario['senha'])) {
            return $usuario;
        }
        return false;
    }
}
?>
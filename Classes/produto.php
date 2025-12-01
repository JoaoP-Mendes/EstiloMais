<?php
require_once __DIR__ . '/../config.php';

class Produto {
    public $msgErro = "";
    private $conn;
    
    public function conectar() {
        $this->conn = conectarBanco();
        return true; 
    
    }
    

    public function cadastrar($nome, $qtd, $descricao, $valor, $imagem) {
        $nome = $this->conn->real_escape_string($nome);
        $descricao = $this->conn->real_escape_string($descricao);
        $imagem = $this->conn->real_escape_string($imagem);
        

        
        $sql = "INSERT INTO produtos (nome, qtd, descricao, valor, imagem) 
                VALUES ('$nome', '$qtd', '$descricao', '$valor', '$imagem')";
        
        return $this->conn->query($sql);
    }
    
    public function listar() {
        $sql = "SELECT * FROM produtos WHERE qtd > 0 ORDER BY nome";
        $result = $this->conn->query($sql);
        
        $produtos = [];
        while ($row = $result->fetch_assoc()) {
            $produtos[] = $row;
        }

        return $produtos;
    }
    
    public function buscarPorId($id) {
        $id = (int)$id;
        $sql = "SELECT * FROM produtos WHERE id_produto = $id";
        $result = $this->conn->query($sql);
        
        
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }return null;
    }
    
    public function atualizarEstoque($id, $nova_qtd) {
        $id = (int)$id;
        $nova_qtd = (int)$nova_qtd;
        $sql = "UPDATE produtos SET qtd = $nova_qtd WHERE id_produto = $id";
        return $this->conn->query($sql);
    }
}
?>
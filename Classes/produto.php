<?php
class Produto{
    private $pdo;
    public $msgErro = "";
    public function conectar($nome, $host, $usuario, $senha)
    {
        global $pdo;
        try {
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host, $usuario, $senha);
        } catch (PDOException $e) {
            $this->msgErro = $e->getMessage();
        }
    }
    public function cadastrarProduto($nome, $qtd, $descricao, $valor, $imagem)
    {
        global $pdo;
            $sql = $pdo->prepare("INSERT INTO produtos (nome, qtd, descricao, valor, imagem) VALUES (:n, :q, :d, :v, :i)");
            $sql->bindValue(":n", $nome);
            $sql->bindValue(":q", $qtd);
            $sql->bindValue(":d", $descricao);
            $sql->bindValue(":v", $valor);
            $sql->bindValue(":i", $imagem);
            $sql->execute();
            return true;
    }

    public function listarProdutos(){
        global $pdo;
        
        $sql = $pdo->prepare("SELECT * FROM produtos WHERE qtd > 0");
        $sql->execute();
        return $sql->fetchAll();
    }
}
?>
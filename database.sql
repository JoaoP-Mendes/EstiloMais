-- Banco de dados: estacio2025
CREATE DATABASE IF NOT EXISTS estacio2025;
USE estacio2025;

-- Tabela usuarios (mantendo a estrutura original)
CREATE TABLE usuarios (
    id_usuario int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome varchar(100) DEFAULT NULL,
    endereco varchar(100) DEFAULT NULL,
    cidade varchar(60) DEFAULT NULL,
    estado char(2) DEFAULT NULL,
    telefone int(11) DEFAULT NULL,
    email varchar(60) DEFAULT NULL,
    senha varchar(255) DEFAULT NULL
);

-- Tabela produtos (mantendo a estrutura original)
CREATE TABLE produtos (
    id_produto int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome varchar(100) DEFAULT NULL,
    qtd int(11) DEFAULT NULL,
    descricao text DEFAULT NULL,
    valor decimal(10,2) DEFAULT NULL,
    imagem varchar(255) DEFAULT NULL
);

-- Inserir alguns produtos de exemplo
INSERT INTO produtos (nome, qtd, descricao, valor, imagem) VALUES
('Casaco Style Preto', 10, 'Casaco elegante para inverno', 99.99, 'pngwing.com.png'),
('Casaco Elegance', 5, 'Casaco premium com design sofisticado', 129.99, 'pngwing.com (1).png'),
('Jaqueta Modern', 8, 'Jaqueta casual para o dia a dia', 89.99, 'pngwing.com (2).png'),
('Casaco Winter', 3, 'Casaco quente para temperaturas baixas', 159.99, 'pngwing.com (3).png');
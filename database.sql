CREATE DATABASE IF NOT EXISTS estacio2025;
USE estacio2025;

CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(60),
    senha VARCHAR(32));

CREATE TABLE produtos (
    id_produto INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    qtd INT,
    descricao TEXT,
    valor DECIMAL(10,2),
    imagem VARCHAR(255));

INSERT INTO usuarios (nome, email, senha) 
VALUES ('Admin', 'admin@style.com', MD5('123'));

INSERT INTO produtos (nome, qtd, descricao, valor, imagem) VALUES
('Casaco Azul', 10, 'Casaco estiloso azul', 249.99, 'Azul bonito.png'),
('Casaco Vermelho', 5, 'Casaco moletom simples', 129.99, 'Casaco vermelho comum.png');
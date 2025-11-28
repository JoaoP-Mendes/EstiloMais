CREATE DATABASE IF NOT EXISTS estacio2025;
USE estacio2025;

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

CREATE TABLE produtos (
    id_produto int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome varchar(100) DEFAULT NULL,
    qtd int(11) DEFAULT NULL,
    descricao text DEFAULT NULL,
    valor decimal(10,2) DEFAULT NULL,
    imagem varchar(255) DEFAULT NULL
);

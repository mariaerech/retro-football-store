-- Schema do banco de dados RetroJerseys
-- Execute este script no MySQL para criar todas as tabelas do projeto

CREATE DATABASE IF NOT EXISTS retro_jerseys;
USE retro_jerseys;

CREATE TABLE Cliente (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    cpf CHAR(11) NOT NULL UNIQUE,
    rg CHAR(9),
    endereco VARCHAR(200),
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE Produto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(200),
    preco DECIMAL(10,2) NOT NULL,
    tamanho VARCHAR(10),
    time VARCHAR(100),
    estoque INT DEFAULT 0
);

CREATE TABLE Pedido (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT NOT NULL,
    data_pedido DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (cliente_id) REFERENCES Cliente(id)
);

CREATE TABLE Pagamento (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pedido_id INT NOT NULL UNIQUE,
    valor DECIMAL(10,2) NOT NULL,
    status VARCHAR(50),
    desconto DECIMAL(10,2),
    nota_fiscal VARCHAR(50),
    forma_pagamento VARCHAR(50),
    FOREIGN KEY (pedido_id) REFERENCES Pedido(id)
);

CREATE TABLE ItemPedido (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pedido_id INT NOT NULL,
    produto_id INT NOT NULL,
    quantidade INT NOT NULL,
    preco_unitario DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (pedido_id) REFERENCES Pedido(id),
    FOREIGN KEY (produto_id) REFERENCES Produto(id)
);

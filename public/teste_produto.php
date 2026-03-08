<?php

require_once "../config/database.php";
require_once "../src/Model/Produto.php";

$produto = new Produto($pdo);

$produto->criar(
    "Camisa Brasil 2002",
    299.90,
    "M",
    "Brasil",
    10
);

echo "Produto criado!";
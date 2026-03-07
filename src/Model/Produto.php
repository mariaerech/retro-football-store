<?php
namespace App\Models;

require_once __DIR__ . '/../../config/database.php';

class Produto {
    public static function all() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM Produto ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public static function create($dados){
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO Produto (descricao, preco, tamanho, time) VALUES (:descricao, :preco, :tamanho, :time)");
        $stmt->execute($dados);
    }

    public static function delete($id){
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM Produto WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
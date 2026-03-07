<?php
namespace App\Models;

require_once __DIR__ . '/../../config/database.php';

class Pedido {
    public static function all() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM Pedido ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public static function create($dados){
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO Pedido (cliente_id) VALUES (:cliente_id)");
        $stmt->execute($dados);
    }

    public static function delete($id){
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM Pedido WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
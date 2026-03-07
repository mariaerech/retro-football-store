<?php
namespace App\Models;

require_once __DIR__ . '/../../config/database.php';

class ItemPedido {
    public static function all() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM ItemPedido ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public static function create($dados){
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO ItemPedido (pedido_id, produto_id, quantidade, preco_unitario) VALUES (:pedido_id, :produto_id, :quantidade, :preco_unitario)");
        $stmt->execute($dados);
    }

    public static function delete($id){
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM ItemPedido WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
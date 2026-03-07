<?php
namespace App\Models;

require_once __DIR__ . '/../../config/database.php';

class Pagamento {
    public static function all() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM Pagamento ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public static function create($dados){
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO Pagamento (pedido_id, valor, status, desconto, nota_fiscal, forma_pagamento) VALUES (:pedido_id, :valor, :status, :desconto, :nota_fiscal, :forma_pagamento)");
        $stmt->execute($dados);
    }

    public static function delete($id){
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM Pagamento WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
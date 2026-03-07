<?php
namespace App\Models;

require_once __DIR__ . '/../../config/database.php';

class Cliente {
    public static function all() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM Cliente ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public static function create($dados){
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO Cliente (nome, email, cpf, rg, endereco, senha) VALUES (:nome, :email, :cpf, :rg, :endereco, :senha)");
        $stmt->execute($dados);
    }

    public static function delete($id){
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM Cliente WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
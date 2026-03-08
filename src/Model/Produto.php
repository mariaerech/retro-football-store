<?php
class Produto {

    private $conn;

    public function __construct(PDO $pdo) {
        $this->conn = $pdo;
    }

    public function criar($descricao, $preco, $tamanho, $time, $estoque) {

        $sql = "INSERT INTO Produto (descricao, preco, tamanho, time, estoque)
                VALUES (:descricao, :preco, :tamanho, :time, :estoque)";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(":descricao", $descricao);
        $stmt->bindParam(":preco", $preco);
        $stmt->bindParam(":tamanho", $tamanho);
        $stmt->bindParam(":time", $time);
        $stmt->bindParam(":estoque", $estoque);

        return $stmt->execute();
    }

    public function listar() {

        $sql = "SELECT * FROM Produto";

        $stmt = $this->conn->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscar($id) {

        $sql = "SELECT * FROM Produto WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar($id, $descricao, $preco, $tamanho, $time, $estoque) {

        $sql = "UPDATE Produto 
                SET descricao=:descricao, preco=:preco, tamanho=:tamanho, time=:time, estoque=:estoque
                WHERE id=:id";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":descricao", $descricao);
        $stmt->bindParam(":preco", $preco);
        $stmt->bindParam(":tamanho", $tamanho);
        $stmt->bindParam(":time", $time);
        $stmt->bindParam(":estoque", $estoque);

        return $stmt->execute();
    }

    public function deletar($id) {

        $sql = "DELETE FROM Produto WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);

        return $stmt->execute();
    }
}
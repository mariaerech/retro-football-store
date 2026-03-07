<?php
namespace App\Controllers;

require_once __DIR__ . '/../Model/Produto.php';
require_once __DIR__ . '/../View/produto/listar.php';

use App\Models\Produto;

class ProdutoController {
    public function index(){
        $produtos = Produto::all();
        renderProdutos($produtos);
    }

    public function store($data) {
        if(!empty($data['descricao'])){
            Produto::create($data);
        }

        header('Location: /?controller=produto');
        exit;
    }

    public function delete($id){
        Produto::delete($id);
        header('Location: /?controller=produto');
        exit;
    }
}
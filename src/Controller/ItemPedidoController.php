<?php
namespace App\Controllers;

require_once __DIR__ . '/../Model/ItemPedido.php';
require_once __DIR__ . '/../View/item_pedido/listar.php';

use App\Models\ItemPedido;

class ItemPedidoController {
    public function index(){
        $itens = ItemPedido::all();
        renderItensPedido($itens);
    }

    public function store($data) {
        if(!empty($data['pedido_id']) && !empty($data['produto_id'])){
            ItemPedido::create($data);
        }

        header('Location: /?controller=itempedido');
        exit;
    }

    public function delete($id){
        ItemPedido::delete($id);
        header('Location: /?controller=itempedido');
        exit;
    }
}
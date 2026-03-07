<?php
namespace App\Controllers;

require_once __DIR__ . '/../Model/Pedido.php';
require_once __DIR__ . '/../View/pedido/listar.php';

use App\Models\Pedido;

class PedidoController {
    public function index(){
        $pedidos = Pedido::all();
        renderPedidos($pedidos);
    }

    public function store($data) {
        if(!empty($data['cliente_id'])){
            Pedido::create($data);
        }

        header('Location: /?controller=pedido');
        exit;
    }

    public function delete($id){
        Pedido::delete($id);
        header('Location: /?controller=pedido');
        exit;
    }
}
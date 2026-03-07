<?php
namespace App\Controllers;

require_once __DIR__ . '/../Model/Pagamento.php';
require_once __DIR__ . '/../View/pagamento/listar.php';

use App\Models\Pagamento;

class PagamentoController {
    public function index(){
        $pagamentos = Pagamento::all();
        renderPagamentos($pagamentos);
    }

    public function store($data) {
        if(!empty($data['pedido_id'])){
            Pagamento::create($data);
        }

        header('Location: /?controller=pagamento');
        exit;
    }

    public function delete($id){
        Pagamento::delete($id);
        header('Location: /?controller=pagamento');
        exit;
    }
}
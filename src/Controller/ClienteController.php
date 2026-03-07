<?php
namespace App\Controllers;

require_once __DIR__ . '/../Model/Cliente.php';
require_once __DIR__ . '/../View/cliente/listar.php';

use App\Models\Cliente;

class ClienteController {
    public function index(){
        $clientes = Cliente::all();
        renderClientes($clientes);
    }

    public function store($data) {
        if(!empty($data['nome'])){
            Cliente::create($data);
        }

        header('Location: /?controller=cliente');
        exit;
    }

    public function delete($id){
        Cliente::delete($id);
        header('Location: /?controller=cliente');
        exit;
    }
}
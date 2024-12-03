<?php

namespace App\Http\Controllers;

use App\Models\EFormaPagamento;
use App\Models\EPessoa;
use App\Models\EProduto;
use Illuminate\Http\Request;

class NovoPedidoController extends Controller
{
    public function index()
    {
        $clientes = EPessoa::all();
        $formasPagamento = EFormaPagamento::all();
        $produtos = EProduto::all();

        return view("novoPedido", compact('clientes', 'formasPagamento', 'produtos'));
    }
}

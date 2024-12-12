<?php

namespace App\Http\Controllers;

use App\Models\EDocumentoFiscal;
use Illuminate\Http\Request;

class ListagemPedidosController extends Controller
{
    public function index()
    {
        $pedidos = EDocumentoFiscal::all();
        
        return view('listagemPedidos', compact('pedidos'));
    }
}

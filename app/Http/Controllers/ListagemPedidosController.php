<?php

namespace App\Http\Controllers;

class ListagemPedidosController extends Controller
{
    public function index()
    {
        return view('listagemPedidos');
    }
}

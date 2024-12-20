<?php

namespace App\Http\Controllers;

use App\Models\EUnidadeEmpresarial;
use App\Models\EUsuarioAcesso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HelpersController extends Controller
{
    public function getAllBusinessUnits()
    {
        $unems = EUnidadeEmpresarial::where('unem_situacao', 'Ativa')->get();

        $data = [];

        foreach ($unems as $unem) {
            array_push(
                $data,
                [
                    'unem_id' => $unem->unem_id,
                    'unem_codigo' => $unem->unem_codigo,
                    'unem_logo' => base64_encode($unem->unem_logo),
                    'unem_nome_fantasia' => $unem->unem_nome_fantasia
                ]
            );
        }

        return response()->json($data);
    }

    public function getAllBusinessUnitsToUserLogged()
    {
        if (!is_null(Auth::user()->unem_id)) {
            return redirect()->route('listagemPedidos');
        }

        $unems = EUsuarioAcesso::select('a.*')
            ->join('e_unidades_empresariais as a', 'a.unem_id', '=', 'e_usuarios_acessos.unem_id')
            ->where('a.unem_situacao', 'Ativa')
            ->get();

        return view('selecaoUnidadeEmpresarial', compact('unems'));
    }

    public function getSalesListing()
    {
        if (is_null(Auth::user()->unem_id)) {
            return redirect()->route('selecaoUnidadeEmpresarial');
        }
        
        return view('listagemPedidos');
    }

    public function getNewSale()
    {
        if (is_null(Auth::user()->unem_id)) {
            return redirect()->route('selecaoUnidadeEmpresarial');
        }

        return view('cadastroPedido');
    }

    public function setUnemIdToUserLogged(Request $request)
    {
        try {
            $user = Auth::user();
            $user->unem_id = $request->get('unemId');
            $user->save();
    
            return response()->json(['message' => 'Unidade empresarial definida com sucesso!']);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao definir a unidade empresarial de usuário logado!'], 500);
        }
    }
}

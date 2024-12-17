<?php

namespace App\Http\Controllers;

use App\Models\EUnidadeEmpresarial;

class HelpersController extends Controller
{
    public function getAllUnidadesEmpresariais()
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
}

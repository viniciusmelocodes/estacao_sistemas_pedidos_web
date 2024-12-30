<?php

namespace App\Http\Controllers;

use App\Models\EDocumentoFiscal;
use App\Models\EDocumentoFiscalItem;
use App\Models\EDocumentoFiscalPagamento;
use App\Models\EFormaPagamento;
use App\Models\EPessoa;
use App\Models\EProduto;
use App\Models\EUnidadeEmpresarial;
use App\Models\EUsuarioAcesso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

class HelpersController extends Controller
{
    public function getAllBusinessUnitsToUserLogged()
    {
        if (!is_null(Auth::user()->unem_id)) {
            return redirect()->route('pedidos');
        }

        $unems = EUsuarioAcesso::select('unem.*')
            ->join('e_unidades_empresariais as unem', 'unem.unem_id', '=', 'e_usuarios_acessos.unem_id')
            ->where('unem.unem_situacao', 'Ativa')
            ->get();

        return view('selecaoUnidadeEmpresarial', compact('unems'));
    }

    public function getBusinessUnitData(Request $request)
    {
        try {
            if ($request->has('id')) {
                $unem = EUnidadeEmpresarial::find($request->get('id'));
            } else {
                $unem = EUnidadeEmpresarial::find(Auth::user()->unem_id);
            }

            return response()->json([
                "unem_id" => $unem->unem_id,
                "muni_id" => $unem->muni_id,
                "unem_codigo" => $unem->unem_codigo,
                "unem_razao_social" => $unem->unem_razao_social,
                "unem_nome_fantasia" => $unem->unem_nome_fantasia,
                "unem_sigla" => $unem->unem_sigla,
                "unem_cnpj" => $unem->unem_cnpj,
                "unem_inscricao_estadual" => $unem->unem_inscricao_estadual,
                "unem_inscricao_municipal" => $unem->unem_inscricao_municipal,
                "unem_codigo_regime_tributario" => $unem->unem_codigo_regime_tributario,
                "unem_ende_logradouro" => $unem->unem_ende_logradouro,
                "unem_ende_numero" => $unem->unem_ende_numero,
                "unem_ende_complemento" => $unem->unem_ende_complemento,
                "unem_ende_bairro" => $unem->unem_ende_bairro,
                "unem_ende_cep" => $unem->unem_ende_cep,
                "unem_fone_numero" => $unem->unem_fone_numero,
                "unem_fone_fax" => $unem->unem_fone_fax,
                "unem_fone_celular" => $unem->unem_fone_celular,
                "unem_email" => $unem->unem_email,
                "unem_site" => $unem->unem_site,
                "unem_data_fundacao" => $unem->unem_data_fundacao,
                "unem_mensagem" => $unem->unem_mensagem,
                "unem_situacao" => $unem->unem_situacao,
                "unem_logo" => base64_encode($unem->unem_logo),
                "created_at" => $unem->created_at,
                "updated_at" => $unem->updated_at
            ]);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao obter dados de unidade empresarial! Detalhes: ' . $th->getMessage()], 500);
        }
    }

    public function getSalesListing()
    {
        if (is_null(Auth::user()->unem_id)) {
            return redirect()->route('selecaoUnidadeEmpresarial');
        }

        return view('pedidos');
    }

    public function getNewSale()
    {
        if (is_null(Auth::user()->unem_id)) {
            return redirect()->route('selecaoUnidadeEmpresarial');
        }

        return view('pedido');
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

    public function getAllSales()
    {
        try {
            $sales = EDocumentoFiscal::with(['pessoa'])->orderBy('dcfs_atualizacao', 'desc')->get();

            return response()->json($sales);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao buscar pedidos!'], 500);
        }
    }

    public function getAllPeople()
    {
        try {
            $people = EPessoa::where('pess_situacao', 'A')->where('unem_id', Auth::user()->unem_id)->orderBy('pess_atualizacao', 'desc')->get();

            return response()->json($people);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao buscar pessoas!'], 500);
        }
    }

    public function getSale(Request $request)
    {
        try {
            $sale = EDocumentoFiscal::with(['pessoa', 'itens', 'pagamentos'])->where('dcfs_id', $request->get('id'))->first();

            return response()->json($sale);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao buscar pedidos! Detalhes: ' . $th->getMessage()], 500);
        }
    }

    public function saveSale(Request $request)
    {
        try {
            dd($request->all());

            $sale = new EDocumentoFiscal();

            $sale->pess_id = $request->get('pess_id');
            $sale->unem_id = Auth::user()->unem_id;
            $sale->usrs_id = Auth::user()->usrs_id;
            $sale->dcfs_observacao = $request->get('dcfs_observacao');
            $sale->dcfs_atualizacao = now();

            $sale->save();

            foreach ($request->get('itens') as $item) {
                $itemsSale = new EDocumentoFiscalItem();

                $itemsSale->dcfs_id = $sale->dcfs_id;
                $itemsSale->unem_id = Auth::user()->unem_id;
                $itemsSale->prod_id = $item[0];
                $itemsSale->dcfs_quantidade = $item['dcfs_quantidade'];
                $itemsSale->dcfs_valor_unitario = $item['dcfs_valor_unitario'];
                $itemsSale->dcfs_valor_total = $item['dcfs_valor_total'];
                $itemsSale->dcfs_atualizacao = now();

                $itemsSale->save();
            }

            foreach ($request->get('pagamentos') as $payment) {
                $paymentsSale = new EDocumentoFiscalPagamento();
                $paymentsSale->dcfs_id = $sale->dcfs_id;
                $paymentsSale->unem_id = Auth::user()->unem_id;
                $paymentsSale->usrs_id = Auth::user()->usrs_id;
                $paymentsSale->frpg_id = $payment;

                $paymentsSale->save();
            }

            return response()->json(['message' => 'Pedido salvo com sucesso!']);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao salvar pedido! Detalhes: ' . $th->getMessage()], 500);
        }
    }

    public function getAllPaymentMethods()
    {
        try {
            $paymentMethod = EFormaPagamento::where('unem_id', Auth::user()->unem_id)->orderBy('frpg_nome')->get();

            return response()->json($paymentMethod);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao buscar formas de pagamento!'], 500);
        }
    }

    public function getAllProducts()
    {
        try {
            $data = EProduto::where('unem_id', Auth::user()->unem_id)->orderBy('updated_at')->get();

            $products = [];

            foreach ($data as $produto) {
                array_push($products, [
                    'prod_id' => $produto->prod_id,
                    'unem_id' => $produto->unem_id,
                    'prod_codigo' => $produto->prod_codigo,
                    'prod_nome' => $produto->prod_nome,
                    'prod_marca' => $produto->prod_marca,
                    'prod_cor' => $produto->prod_cor,
                    'prod_tamanho' => $produto->prod_tamanho,
                    'prod_material' => $produto->prod_material,
                    'prod_gtin' => $produto->prod_gtin,
                    'prod_referencia' => $produto->prod_referencia,
                    'prod_ncms' => $produto->prod_ncms,
                    'prod_genero' => $produto->prod_genero,
                    'prod_producao' => $produto->prod_producao,
                    'prod_peso_bruto' => $produto->prod_peso_bruto,
                    'prod_peso_liquido' => $produto->prod_peso_liquido,
                    'prod_prazo_entrega' => $produto->prod_prazo_entrega,
                    'prod_embalagem_altura' => $produto->prod_embalagem_altura,
                    'prod_embalagem_largura' => $produto->prod_embalagem_largura,
                    'prod_embalagem_profundidade' => $produto->prod_embalagem_profundidade,
                    'prod_saldo_estoque' => $produto->prod_saldo_estoque,
                    'prod_preco_custo' => $produto->prod_preco_custo,
                    'prod_markup' => $produto->prod_markup,
                    'prod_preco_varejo' => $produto->prod_preco_varejo,
                    'prod_preco_atacado' => $produto->prod_preco_atacado,
                    'prod_modalidade_frete' => $produto->prod_modalidade_frete,
                    'prod_aliquota_ipi' => $produto->prod_aliquota_ipi,
                    'prod_aliquota_icms_st' => $produto->prod_aliquota_icms_st,
                    'prod_aliquota_iss_retido' => $produto->prod_aliquota_iss_retido,
                    'prod_disponivel' => $produto->prod_disponivel,
                    'prod_tipo_item' => $produto->prod_tipo_item,
                    'prod_origem' => $produto->prod_origem,
                    'prod_movimenta_estoque' => $produto->prod_movimenta_estoque,
                    "prod_foto" => base64_encode($produto->prod_foto),
                ]);
            }

            return response()->json($products);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao buscar produtos!'], 500);
        }
    }
}

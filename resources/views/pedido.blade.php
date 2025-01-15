<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" id="tituloPedido">
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form class="w-full max-w" action="{{ route('saveSale') }}" method="POST" id="formSaveSale">
                        @csrf

                        <input type="hidden" name="id" id="id" value="0">
                        <div class="flex flex-wrap -mx-3 mb-2">
                            <!-- Cliente -->
                            <div class="w-full md:w-2/3 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2"
                                    for="nomeCliente">
                                    Cliente
                                </label>
                                <select id="cliente" name="pess_id"
                                    class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 select2">
                                    <option value="">Selecione um cliente</option>
                                </select>
                                <div id="warningCliente" class="text-red-500 text-sm hidden">É necessário selecionar o
                                    cliente.</div>
                            </div>

                            <!-- Tipo de Frete -->
                            <div class="w-full md:w-1/3 px-3" id="divTipoFrete">
                                <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2"
                                    for="frete">
                                    Tipo de Frete
                                </label>
                                <select id="modalidadeFrete" name="dcfs_modalidade_frete"
                                    class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 select2">
                                    <option value="">Selecione um tipo de frete</option>
                                    <option value="0">CONTRATAÇÃO DO FRETE POR CONTA DO REMETENTE (CIF)</option>
                                    <option value="1">CONTRATAÇÃO DO FRETE POR CONTA DO DESTINATÁRIO (FOB)</option>
                                    <option value="2">CONTRATAÇÃO DO FRETE POR CONTA DE TERCEIROS</option>
                                    <option value="3">TRANSPORTE PRÓPRIO POR CONTA DO REMETENTE</option>
                                    <option value="4">TRANSPORTE PRÓPRIO POR CONTA DO DESTINATÁRIO</option>
                                    <option value="9">SEM OCORRÊNCIA DE TRANSPORTE</option>
                                </select>
                                <div id="warningTipoFrete" class="text-red-500 text-sm hidden">É necessário selecionar o
                                    tipo de frete.</div>
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-1">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2"
                                    for="referencia">
                                    Referência
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="referencia" name="dcfs_referencia" type="text"
                                    oninput="window.converterCaixaAlta(event)">
                            </div>
                        </div>
                        <hr>
                        <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mt-2 mb-2">
                            Novo Item
                        </label>
                        <div
                            class="block max-w p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 cursor-pointer">
                            <div class="flex flex-wrap -mx-3 mb-2">
                                <div class="w-full sm:w-4/12 md:w-4/12 lg:w-4/12 xl:w-5/12 px-3 mb-6 md:mb-0">
                                    <label class="tracking-wide text-gray-700 text-sm font-bold mb-2">
                                        Produto
                                    </label>
                                    <select id="produto" name="prod_id"
                                        class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 select2"
                                        onchange="handleProdutoChange(this)">
                                        <option value="">Selecione um produto</option>
                                    </select>
                                    <div id="warningProduto" class="text-red-500 text-sm hidden">É necessário selecionar
                                        o produto.</div>
                                </div>
                                <div class="w-full md:w-2/12 px-3 mb-6 md:mb-0">
                                    <label class="tracking-wide text-gray-700 text-sm font-bold mb-2">
                                        Qtde
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="quantidade" type="number" placeholder="0" min="0" step="0.01">
                                    <div id="warningQuantidade" class="text-red-500 text-sm hidden">É necessário
                                        informar a quantidade.</div>
                                </div>
                                <div class="w-full md:w-1/6 px-3 mb-6 md:mb-0">
                                    <label id="valorUnitarioProduto"
                                        class="tracking-wide text-gray-700 text-sm font-bold mb-2">
                                        Valor Unitário
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="valorUnitario" type="number" placeholder="0,00" readonly>
                                </div>
                                <div class="w-full md:w-1/6 px-3 mb-6 md:mb-0">
                                    <label id="valorTotalProduto"
                                        class="tracking-wide text-gray-700 text-sm font-bold mb-2">
                                        Total
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="valorTotal" type="number" placeholder="0,00" readonly>
                                </div>
                                <div class="w-full md:w-1/12 flex items-center justify-start" id="divAdicionarItem">
                                    <button id="btnAdicionarItem" type="button"
                                        class="bg-blue-500 hover:bg-blue-400 text-white font-bold mt-6 py-2 px-3 border-b-4 border-blue-700 hover:border-blue-500 rounded">Adicionar</button>
                                </div>
                            </div>
                        </div>
                        <div class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2 mt-4">
                            <div>Itens do Pedido</div>
                            <div id="divItens"></div>
                            <div id="warningItens" class="text-red-500 text-sm hidden">É necessário adicionar itens ao
                                pedido.</div>
                        </div>
                        <hr>
                        <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mt-2 mb-2">
                            Nova Forma de Pagamento
                        </label>
                        <div
                            class="block max-w p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 cursor-pointer">
                            <div class="flex flex-wrap -mx-3 mb-2">
                                <div class="w-full md:w-5/12 lg:w-5/12 xl:w-6/12 px-3 mb-6 md:mb-0">
                                    <!-- Forma de pagamento -->
                                    <label class="tracking-wide text-gray-700 text-sm font-bold mb-2" for="pagamento">
                                        Forma de Pagamento
                                    </label>
                                    <select id="formasPagamento"
                                        class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 select2">
                                        <option value="">Selecione uma forma de pagamento</option>
                                    </select>
                                    <div id="warningFormaPagamento" class="text-red-500 text-sm hidden">É necessário
                                        selecionar uma forma de pagamento.</div>
                                </div>
                                <div class="w-full md:w-2/12 px-3 mb-6 md:mb-0">
                                    <label class="tracking-wide text-gray-700 text-sm font-bold mb-2">
                                        Valor
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="valorFormaPagamento" type="number" placeholder="0,00" min="0"
                                        step="0.01">
                                    <div id="warningValorFormaPagamento" class="text-red-500 text-sm hidden">É
                                        necessário informar o valor da forma de pagamento.</div>
                                </div>
                                <div class="w-full md:w-3/12 px-3 mb-6 md:mb-0">
                                    <label class="tracking-wide text-gray-700 text-sm font-bold mb-2">
                                        Qtde Parcelas
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="quantidadeParcelas" type="number" placeholder="0" min="0"
                                        step="1">
                                    <div id="warningQuantidadeParcelas" class="text-red-500 text-sm hidden">É
                                        necessário informar a quantidade de parcelas da forma de pagamento.</div>
                                </div>
                                <div class="w-full md:w-1/12 flex items-center justify-start"
                                    id="divAdicionarFormaPagamento">
                                    <button id="btnAdicionarFormaPagamento" type="button"
                                        class="bg-blue-500 hover:bg-blue-400 text-white font-bold mt-6 py-2 px-3 border-b-4 border-blue-700 hover:border-blue-500 rounded">Adicionar</button>
                                </div>
                            </div>
                        </div>
                        <div class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2 mt-4">
                            <p>Formas de Pagamento do Pedido</p>
                            <div id="divFormasPagamento"></div>
                            <div id="warningFormasPagamento" class="text-red-500 text-sm hidden">É necessário
                                adicionar formas de pagamento ao pedido.</div>
                        </div>
                        <hr>
                        <div class="flex flex-wrap -mx-3 mt-4 mb-2">
                            <div class="w-full msm:w-4/12 md:w-4/12 lg:w-4/12 xl:w-5/12 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2">
                                    Valor de Desconto Neste Pedido
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="descontoPedido" type="number" placeholder="0,00" step="0.01">
                            </div>
                            <div class="w-full sm:w-4/12 md:w-4/12 lg:w-4/12 xl:w-5/12 px-3 mb-6 mt-2 md:mb-0">
                                <label class="tracking-wide text-gray-700 text-xl font-bold mb-2"
                                    id="labelValorTotalLiquido">
                                    Valor Total Líquido: R$ 0,00
                                </label>
                            </div>
                            <div class="w-full sm:w-4/12 md:w-4/12 lg:w-4/12 xl:w-5/12 px-3 mb-6 mt-2 md:mb-0">
                                <label class="tracking-wide text-gray-700 text-xl font-bold mb-2"
                                    id="labelValorTotalBruto">
                                    Valor Total Bruto: R$ 0,00
                                </label>
                            </div>
                            <div class="w-full sm:w-4/12 md:w-4/12 lg:w-4/12 xl:w-5/12 px-3 mb-6 mt-2 md:mb-0">
                                <label class="tracking-wide text-gray-700 text-xl font-bold mb-2"
                                    id="labelValorTotalIPI">
                                    Valor Total IPI: R$ 0,00
                                </label>
                            </div>
                            <div class="w-full sm:w-4/12 md:w-4/12 lg:w-4/12 xl:w-5/12 px-3 mb-6 mt-2 md:mb-0">
                                <label class="tracking-wide text-gray-700 text-xl font-bold mb-2"
                                    id="labelValorTotalIcmsSt">
                                    Valor Total ICMS ST: R$ 0,00
                                </label>
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-2">
                            <div class="w-full px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2">
                                    Observações
                                </label>
                                <textarea
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="dcfs_observacao" name="dcfs_observacao" rows="5" oninput="window.converterCaixaAlta(event)"></textarea>
                            </div>
                        </div>
                        <div class="py-4">
                            <div class="flex justify-end">
                                <button
                                    class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 mr-28 px-4 border-b-4 border-green-700 hover:border-blue-500 rounded hidden"
                                    type="button" onclick="goToNewPedido()" id="btnNovoPedido">
                                    Novo Pedido
                                </button>
                                <button
                                    class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded"
                                    type="submit">
                                    Concluir Pedido
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

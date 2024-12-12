<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Novo Pedido') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form class="w-full max-w">
                        <div class="flex flex-wrap -mx-3 mb-6">
                                <!-- Campo Cliente (Maior) -->
                                <div class="w-full md:w-1/2 px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nomeCliente">
                                        Cliente
                                    </label>
                                    <select id="selecioneCliente" class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 select2">
                                        <option value="" disabled selected>Selecione uma opção</option>
                                        <option value="1">The Fiber</option>
                                        <option value="2">Vivo</option>
                                        <option value="3">Claro</option>
                                        <option value="4">Intercell</option>
                                        <option value="5">Oi</option>
                                    </select>
                                    <p class="text-red-500 text-xs italic">Selecione um cliente</p>
                                </div>

                                <!-- Campo Forma de pagamento (Médio) -->
                                <div class="w-full md:w-1/3 px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="pagamento">
                                        Forma de pagamento
                                    </label>
                                    <select id="opcoesPagamento" class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 select2">
                                        <option value="" disabled selected>Selecione uma opção</option>
                                        <option value="1">Pix</option>
                                        <option value="2">Dinheiro</option>
                                        <option value="3">Cartão</option>
                                    </select>
                                </div>

                                <!-- Campo Tipo de Frete (Pequeno) -->
                                <div class="w-full md:w-1/6 px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="frete">
                                        Tipo de Frete
                                    </label>
                                    <select id="tiposDeFrete" class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 select2">
                                        <option value="" disabled selected>Selecione uma opção</option>
                                        <option value="1">Expresso</option>
                                        <option value="2">Econômico</option>
                                        <option value="3">Grátis</option>
                                    </select>
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="referencia">
                                        Referência
                                    </label>
                                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="referencia" type="text" placeholder="">
                                </div>
                            </div>
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                    Novo Item
                             </label>
                            <div class="block max-w p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 cursor-pointer">
                                <div class="flex flex-wrap -mx-3 mb-2">
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                            Produto
                                        </label>
                                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="produto" type="text" placeholder="Informe produto">
                                    </div>
                                    <div class="w-full md:w-1/12 px-3 mb-6 md:mb-0">
                                        <label class="tracking-wide text-gray-700 text-xs font-bold mb-2">
                                            Qtde
                                        </label>
                                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="quantidade" type="number" placeholder="" min="0">
                                    </div>
                                    <div class="w-full md:w-1/6 px-3 mb-6 md:mb-0">
                                        <label class="tracking-wide text-gray-700 text-xs font-bold mb-2">
                                            Valor Unitário
                                        </label>
                                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="valorUnitario" type="number" placeholder="0,00" min="0">
                                    </div>
                                    <div class="w-full md:w-1/6 px-3 mb-6 md:mb-0">
                                        <label class="tracking-wide text-gray-700 text-xs font-bold mb-2">
                                            Total
                                        </label>
                                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="precoTotal" type="number" placeholder="0,00" min="0">
                                    </div>
                                    <div class="w-full md:w-1/12 flex items-center justify-start">
                                        <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold mt-6 py-2 px-3 border-b-4 border-blue-700 hover:border-blue-500 rounded" onclick="window.location.href='/cadastroPedido'">Adicionar</button>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                <div>Itens</div>
                                <div id="wrapper"></div>
                            </div>
                            <div class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-2">
                                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                        Valor de Desconto Neste Pedido
                                    </label>
                                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="descontoNoPedido" type="text" placeholder="Informe valor">
                                </div>
                                <div class="w-full md:w-1/3 px-3 mb-6 mt-12 md:mb-0">
                                    <label class="tracking-wide text-gray-700 text-xs font-bold mb-2">
                                        Valor Total Líquido: 
                                    </label>
                                </div>
                                <div class="w-full md:w-1/3  px-3 mb-6 mt-12 md:mb-0">
                                    <label class="tracking-wide text-gray-700 text-xs font-bold mb-2">
                                        Valor Total Bruto: 
                                    </label>
                                </div>
                            </div>
                            <br>
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                 Observações
                            </label>                           
                            <div class="flex flex-wrap -mx-3 mb-2">
                                <div class="w-full px-3 mb-6 md:mb-0">
                                    <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="observacao" type="text" placeholder=""></textarea>
                                </div>
                            </div>
                            <div class="py-12">
                                <div class="flex justify-end">
                                    <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 mb-3 mr-18 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded" onclick="window.location.href='/'">Concluir Pedido</button>
                                </div>
                            </div>
                        </div>
                    </form> 

                </div>
            </div>
        </div>
    </div>


    <script type="module">
    import{
        Grid,
        html
    } from "https://unpkg.com/gridjs?module";

    const grid = new Grid({
        columns:[
            "Produto","Qtde","IPI","ICMS ST", "Valor Unitário", "Total", "Ações"],
            sort: true,
            search: false, 
            pagination: true,
            language: {
                'pagination': {
                    'previous': 'Anterior',
                    'next': 'Próxima',
                    'navigate': (page, pages) => `Página ${page} de ${pages}`,
                    'page': (page) => `Página ${page}`,
                    'showing': 'Mostrando',
                    'of': 'de',
                    'to': 'até',
                    'results': () => 'resultados',
                },     
                'loading': 'Carregando...',
                'noRecordsFound': 'Nenhum registro encontrado',
                'error': 'Ocorreu um erro ao buscar os dados',
        },
        data : [
            
        ]

    }).render(document.getElementById("wrapper"));

</script>
</x-app-layout>



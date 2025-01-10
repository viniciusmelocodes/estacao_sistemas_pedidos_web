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
                                    <option value="0">Contratação do Frete por conta do Remetente (CIF)</option>
                                    <option value="1">Contratação do Frete por conta do Destinatário (FOB)</option>
                                    <option value="2">Contratação do Frete por conta de Terceiros</option>
                                    <option value="3">Transporte Próprio por conta do Remetente</option>
                                    <option value="4">Transporte Próprio por conta do Destinatário</option>
                                    <option value="9">Sem Ocorrência de Transporte</option>
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
                                    id="referencia" name="dcfs_referencia" type="text">
                            </div>
                        </div>
                        <hr>
                        <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mt-2 mb-2">
                            Novo Item
                        </label>
                        <div
                            class="block max-w p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 cursor-pointer">
                            <div class="flex flex-wrap -mx-3 mb-2">
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
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
                                <div class="w-full md:w-1/12 px-3 mb-6 md:mb-0">
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
                            class="block max-w p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 cursor-pointer">
                            <div class="flex flex-wrap -mx-3 mb-2">
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
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
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2">
                                    Valor de Desconto Neste Pedido
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="descontoPedido" type="number" placeholder="0,00" step="0.01">
                            </div>
                            <div class="w-full md:w-1/3 px-3 mb-6 mt-2 md:mb-0">
                                <label class="tracking-wide text-gray-700 text-xl font-bold mb-2"
                                    id="labelValorTotalLiquido">
                                    Valor Total Líquido: R$ 0,00
                                </label>
                            </div>
                            <div class="w-full md:w-1/3  px-3 mb-6 mt-2 md:mb-0">
                                <label class="tracking-wide text-gray-700 text-xl font-bold mb-2"
                                    id="labelValorTotalBruto">
                                    Valor Total Bruto: R$ 0,00
                                </label>
                            </div>
                            <div class="w-full md:w-1/3  px-3 mb-6 mt-2 md:mb-0">
                                <label class="tracking-wide text-gray-700 text-xl font-bold mb-2"
                                    id="labelValorTotalIPI">
                                    Valor Total IPI: R$ 0,00
                                </label>
                            </div>
                            <div class="w-full md:w-1/3  px-3 mb-6 mt-2 md:mb-0">
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
                                    id="dcfs_observacao" name="dcfs_observacao" rows="5"></textarea>
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

    <script type="module">
        import {
            Grid,
            html
        } from "https://unpkg.com/gridjs?module";

        let gridItens = new Grid();
        let gridFormasPagamento = new Grid();
        window.dataItemsSale = []
        window.dataPaymentMethods = []

        $(function() {
            $("#quantidade").val("")
            $("#valorUnitario").val("")
            $("#valorTotal").val("")

            $("#valorFormaPagamento").val("")
            $("#quantidadeParcelas").val("")

            $('.select2').select2();
            window.notyf = new Notyf({
                duration: 3000,
                position: {
                    x: 'right',
                    y: 'top',
                },
                types: [{
                        type: 'warning',
                        background: 'orange',
                    },
                    {
                        type: 'success',
                        background: 'green',
                    }
                ]
            });

            handleInitForm()
            handleValidationForm()

            $('#produto').on('select2:select', function(e) {
                let selectedOption = e.params.data;
                let valorUnitario = $(selectedOption.element).data('valor-unitario');
                $('#valorUnitario').val(valorUnitario);

                let quantidade = $("#quantidade").val();
                quantidade = quantidade == '' ? 0 : quantidade;

                if (quantidade > 0) {
                    let valorUnitario = $('#valorUnitario').val();
                    let valorTotal = calcularValorTotalProduto(parseFloat(quantidade), parseFloat(
                        valorUnitario))
                    $('#valorTotal').val(valorTotal.toFixed(2));
                }
            });

            $('#formasPagamento').on('select2:select', function(e) {
                let selectedOption = e.params.data;
                let qtdeParcelas = $(selectedOption.element).data('qtde-parcelas');
                if (qtdeParcelas == 1) {
                    $('#quantidadeParcelas').attr("disabled", true);
                    $('#quantidadeParcelas').val(1)
                } else {
                    $('#quantidadeParcelas').attr("disabled", false);
                    $('#quantidadeParcelas').val('')
                }
            });

            $("#quantidade").on('input', function() {
                let quantidade = $(this).val();
                quantidade = quantidade == '' ? 0 : quantidade;

                let valorUnitario = $('#valorUnitario').val();
                let valorTotal = calcularValorTotalProduto(parseFloat(quantidade), parseFloat(
                    valorUnitario))
                $('#valorTotal').val(valorTotal.toFixed(2));
            })

            $('#descontoPedido').on('input', function() {
                calcularTotais()
            })
        });

        if (window.innerWidth < 600) {
            gridItens = new Grid({
                columns: [{
                        name: 'prod_id',
                        hidden: true
                    },
                    {
                        name: "Produto\nQtde\nValor Unit.\nTotal",
                        formatter: (cell, row) => {
                            return html(`<div style="white-space: pre-line;">${cell}</div>`);
                        },
                        attributes: (cell, row) => {
                            return {
                                'data-column-title': 'true',
                                'style': 'white-space: pre-line;'
                            };
                        },
                    },
                    {
                        name: 'Ações',
                        formatter: (_, row) => html(
                            `<button type="button" data-id="${Math.floor(Math.random() * 100)}" class="btnRemoverItem bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 mb-2 mr-2 px-2 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                            Remover
                         </button>`
                        )
                    },
                    {
                        name: 'dfit_id',
                        hidden: true
                    }
                ],
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
                    'noRecordsFound': 'Nenhum item adicionado',
                    'error': 'Ocorreu um erro ao buscar os dados',
                },
                data: window.dataItemsSale,
                footer: true
            }).render(document.getElementById("divItens"));

            gridFormasPagamento = new Grid({
                columns: [{
                        name: 'frpg_id',
                        hidden: true
                    },
                    {
                        name: "Forma de Pag.\nValor\nQtde Parc.",
                        formatter: (cell, row) => {
                            return html(`<div style="white-space: pre-line;">${cell}</div>`);
                        },
                        attributes: (cell, row) => {
                            return {
                                'data-column-title': 'true',
                                'style': 'white-space: pre-line;'
                            };
                        },
                    },
                    {
                        name: 'Ações',
                        formatter: (_, row) => html(
                            `<button type="button" data-id="${Math.floor(Math.random() * 100)}" class="btnRemoverFormaPagamento bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 mb-2 mr-2 px-2 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                            Remover
                         </button>`
                        )
                    },
                    {
                        name: 'dfpg_id',
                        hidden: true
                    }
                ],
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
                    'noRecordsFound': 'Nenhuma forma de pagamento adicionada',
                    'error': 'Ocorreu um erro ao buscar os dados',
                },
                data: window.dataPaymentMethods,
                footer: true
            }).render(document.getElementById("divFormasPagamento"));
        } else {
            gridItens = new Grid({
                columns: [{
                        name: 'prod_id',
                        hidden: true
                    },
                    "Produto", "Qtde", "Valor Unitário", "Total",
                    {
                        name: 'Ações',
                        formatter: (_, row) => html(
                            `<button type="button" data-id="${Math.floor(Math.random() * 100)}" data-total-item="${row.cells[4].data}" class="btnRemoverItem bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 mb-2 mr-2 px-2 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                            Remover
                         </button>`
                        )
                    },
                    {
                        name: 'dfit_id',
                        hidden: true
                    }
                ],
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
                data: window.dataItemsSale,
                footer: true
            }).render(document.getElementById("divItens"));

            gridFormasPagamento = new Grid({
                columns: [{
                        name: 'frpg_id',
                        hidden: true
                    },
                    "Forma de Pagamento", "Valor", "Qtde Parcelas",
                    {
                        name: 'Ações',
                        formatter: (_, row) => html(
                            `<button type="button" data-id="${Math.floor(Math.random() * 100)}" class="btnRemoverFormaPagamento bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 mb-2 mr-2 px-2 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                            Remover
                         </button>`
                        )
                    },
                    {
                        name: 'dfpg_id',
                        hidden: true
                    }
                ],
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
                data: window.dataPaymentMethods,
                footer: true
            }).render(document.getElementById("divFormasPagamento"));
        }

        function calcularTotalQtdeRodape() {
            return window.dataItemsSale.reduce((acc, row) => acc + parseFloat(row[2]), 0);
        }

        function calcularTotalRodape() {
            return window.dataItemsSale.reduce((acc, row) => acc + parseFloat(row[4]), 0);
        }

        function atualizarRodape() {
            const totalQtde = calcularTotalQtdeRodape();
            const total = calcularTotalRodape();
            const rodapeHtml =
                ` <tr class="gridjs-foot">
                    <td colspan="1">Totais</td>
                    <td class="qtde-total">${(totalQtde.toFixed(2)).replace('.', ',')}</td>
                    <td colspan="1"></td> <td>${(total.toFixed(2)).replace('.', ',')}</td>
                    <td></td>
                  </tr> `;

            const rodapeExistente = document.querySelector('.gridjs-foot');

            if (rodapeExistente) {
                rodapeExistente.remove();
            }

            document.querySelector('.gridjs-tbody').insertAdjacentHTML('afterend', rodapeHtml);

            window.totalQtde = totalQtde;
            window.valorTotalPedido = total;
            window.descontoPedido = document.getElementById('descontoPedido').value == '' ? 0 : parseFloat(document
                .getElementById('descontoPedido').value);
            window.valorTotalLiquidoPedido = parseFloat(window.valorTotalPedido - window.descontoPedido);

            $("#labelValorTotalLiquido").text('Valor Total Líquido: R$ ' + (parseFloat(window.valorTotalPedido - window
                    .descontoPedido)
                .toFixed(2)).replace('.', ','));
            $("#labelValorTotalBruto").text('Valor Total Bruto: R$ ' + (parseFloat(window.valorTotalPedido).toFixed(2))
                .replace('.',
                    ','));
        }

        window.calcularTotais = () => {
            if (window.valorTotalPedido == undefined) {
                window.valorTotalPedido = 0
            }

            window.descontoPedido = $('#descontoPedido').val() == '' ? 0 : parseFloat($('#descontoPedido').val());

            let valorTotalPedido = 0;

            window.dataItemsSale.forEach(item => {
                let arr = item[1].split(' / ');
                valorTotalPedido += parseFloat(arr[1]) * parseFloat(arr[2]);
            })

            window.valorTotalPedido = valorTotalPedido

            window.valorTotalLiquidoPedido = parseFloat(window.valorTotalPedido - window.descontoPedido);
            $("#labelValorTotalLiquido").text('Valor Total Líquido: R$ ' + (parseFloat(window.valorTotalPedido - window
                .descontoPedido).toFixed(2)).replace('.', ','));
            $("#labelValorTotalBruto").text('Valor Total Bruto: R$ ' + (parseFloat(window.valorTotalPedido).toFixed(2))
                .replace(
                    '.', ','));
        }

        window.handleProdutoChange = (select) => {
            const idProduto = select.value;
            const nomeProduto = select.options[select.selectedIndex].text;
        }

        document.getElementById("btnAdicionarItem").addEventListener("click", () => {
            const selectElement = document.getElementById('produto');
            const idProduto = selectElement.options[selectElement.selectedIndex].value;
            const nomeProduto = selectElement.options[selectElement.selectedIndex].text;

            let isValid = true;
            $("#warningProduto").addClass('hidden');
            $("#warningQuantidade").addClass('hidden');

            if (idProduto == "") {
                $("#warningProduto").removeClass('hidden')
                isValid = false
            }

            if (document.getElementById('quantidade').value == "" || $("#quantidade").val() == 0) {
                $("#warningQuantidade").removeClass('hidden')
                isValid = false
            }

            let quantidade = document.getElementById('quantidade').value
            let valorUnitario = document.getElementById('valorUnitario').value
            let valorTotal = document.getElementById('valorTotal').value

            // Itens com produtos repetidos não podem ser adicionados
            if (window.innerWidth < 600) {
                window.dataItemsSale.forEach(row => {
                    if (row[0] == idProduto) {
                        Swal.fire({
                            text: 'Produto já adicionado ao pedido! Deseja substituí-lo por este?',
                            icon: 'question',
                            confirmButtonText: 'Sim',
                            denyButtonText: 'Não',
                            showDenyButton: true,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.dataItemsSale.forEach(row => {
                                    if (row[0] == idProduto) {
                                        let arrayItem = row[1].split(" / ");

                                        row[1] = nomeProduto + " / " + (parseFloat(
                                                quantidade).toFixed(2)).replace('.',
                                                ',') +
                                            " / " + (parseFloat(valorUnitario).toFixed(2))
                                            .replace('.', ',') + " / " + (parseFloat(
                                                valorTotal).toFixed(2)).replace('.',
                                                ',');

                                        $("#warningItens").addClass('hidden')

                                        $("#produto").val("").trigger("change");
                                        $("#quantidade").val("")
                                        $("#valorUnitario").val("")
                                        $("#valorTotal").val("")

                                        gridItens.updateConfig({
                                            data: window.dataItemsSale
                                        }).forceRender();

                                        if (window.innerWidth > 600) {
                                            atualizarRodape();
                                        } else {
                                            calcularTotais()
                                        }
                                    }
                                })
                            }
                        })

                        isValid = false
                    }
                })
            } else {
                window.dataItemsSale.forEach(row => {
                    if (row[0] == idProduto) {
                        Swal.fire({
                            text: 'Produto já adicionado ao pedido! Deseja substituí-lo por este?',
                            icon: 'question',
                            confirmButtonText: 'Sim',
                            denyButtonText: 'Não',
                            showDenyButton: true,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.dataItemsSale.forEach(row => {
                                    if (row[0] == idProduto) {
                                        row[2] = (parseFloat(quantidade).toFixed(2))
                                            .replace('.', ',');
                                        row[4] = (parseFloat(valorTotal).toFixed(2))
                                            .replace('.', ',');

                                        $("#warningItens").addClass('hidden')

                                        $("#produto").val("").trigger("change")
                                        $("#quantidade").val("")
                                        $("#valorUnitario").val("")
                                        $("#valorTotal").val("")

                                        gridItens.updateConfig({
                                            data: window.dataItemsSale
                                        }).forceRender();

                                        if (window.innerWidth > 600) {
                                            atualizarRodape();
                                        } else {
                                            calcularTotais()
                                        }
                                    }
                                })
                            }
                        })

                        isValid = false
                    }
                })
            }

            if (!isValid) {
                return;
            }

            let newRow = handleNewItemGrid(idProduto, nomeProduto, quantidade, valorUnitario, valorTotal, 0)
            window.dataItemsSale.push(newRow);

            $("#warningItens").addClass('hidden')

            window.notyf.open({
                type: 'success',
                message: 'Item adicionado ao pedido.',
            });

            $("#produto").val("").trigger("change");
            $("#quantidade").val("")
            $("#valorUnitario").val("")
            $("#valorTotal").val("")

            gridItens.updateConfig({
                data: window.dataItemsSale
            }).forceRender();

            if (window.innerWidth > 600) {
                atualizarRodape();
            } else {
                calcularTotais()
            }
        });

        document.getElementById("btnAdicionarFormaPagamento").addEventListener("click", () => {
            const selectElement = document.getElementById('formasPagamento');
            const idFormaPagamento = selectElement.options[selectElement.selectedIndex].value;
            const nomeFormaPagamento = selectElement.options[selectElement.selectedIndex].text;

            let isValid = true;
            $("#warningFormaPagamento").addClass('hidden');
            $("#warningValorFormaPagamento").addClass('hidden');
            $("#warningQuantidadeParcelas").addClass('hidden');

            if (idFormaPagamento == "") {
                $("#warningFormaPagamento").removeClass('hidden')
                isValid = false
            }

            if (document.getElementById('valorFormaPagamento').value == "" || parseFloat(document.getElementById(
                    'valorFormaPagamento').value) < 0.01) {
                $("#warningValorFormaPagamento").removeClass('hidden')
                isValid = false
            }

            if (document.getElementById('quantidadeParcelas').value == "") {
                $("#warningQuantidadeParcelas").removeClass('hidden')
                isValid = false
            }

            let valorFormaPagamento = document.getElementById('valorFormaPagamento').value
            let quantidadeParcelas = document.getElementById('quantidadeParcelas').value

            // Formas de pagamento repetidos não podem ser adicionados
            if (window.innerWidth < 600) {
                window.dataPaymentMethods.forEach(row => {
                    if (row[0] == idFormaPagamento) {
                        Swal.fire({
                            text: 'Forma de Pagamento já adicionada ao pedido! Deseja alterá-la?',
                            icon: 'question',
                            confirmButtonText: 'Sim',
                            denyButtonText: 'Não',
                            showDenyButton: true,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.dataPaymentMethods.forEach(row => {
                                    if (row[0] == idFormaPagamento) {
                                        row[1] = nomeFormaPagamento + " / R$ " + (
                                                parseFloat(
                                                    valorFormaPagamento).toFixed(2))
                                            .replace('.',
                                                ',') + " / " +
                                            quantidadeParcelas;

                                        $("#warningFormasPagamento").addClass('hidden')

                                        $("#formasPagamento").val("").trigger("change");
                                        $("#valorFormaPagamento").val("")
                                        $("#quantidadeParcelas").val("")

                                        gridFormasPagamento.updateConfig({
                                            data: window.dataPaymentMethods
                                        }).forceRender();
                                    }
                                })
                            }
                        })

                        isValid = false
                    }
                })
            } else {
                window.dataPaymentMethods.forEach(row => {
                    if (row[0] == idFormaPagamento) {
                        Swal.fire({
                            text: 'Forma de Pagamento já adicionada ao pedido! Deseja alterá-la?',
                            icon: 'question',
                            confirmButtonText: 'Sim',
                            denyButtonText: 'Não',
                            showDenyButton: true,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.dataPaymentMethods.forEach(row => {
                                    if (row[0] == idFormaPagamento) {
                                        row[2] = 'R$ ' + (parseFloat(valorFormaPagamento)
                                            .toFixed(2)).replace('.', ',');
                                        row[3] = quantidadeParcelas;

                                        $("#warningFormasPagamento").addClass('hidden')

                                        $("#formasPagamento").val("").trigger("change");
                                        $("#valorFormaPagamento").val("")
                                        $("#quantidadeParcelas").val("")

                                        gridFormasPagamento.updateConfig({
                                            data: window.dataPaymentMethods
                                        }).forceRender();
                                    }
                                })
                            }
                        })

                        isValid = false
                    }
                })
            }

            if (!isValid) {
                return;
            }

            let newRow = handleNewPaymentMethodGrid(idFormaPagamento, nomeFormaPagamento, valorFormaPagamento, quantidadeParcelas, 0)
            window.dataPaymentMethods.push(newRow);

            $("#warningFormasPagamento").addClass('hidden')

            window.notyf.open({
                type: 'success',
                message: 'Forma de Pagamento adicionada ao pedido.',
            });

            $("#formasPagamento").val("").trigger("change");
            $("#valorFormaPagamento").val("")
            $("#quantidadeParcelas").val("")

            gridFormasPagamento.updateConfig({
                data: window.dataPaymentMethods
            }).forceRender();
        });

        document.addEventListener("click", function(event) {
            if (event.target.classList.contains("btnRemoverItem")) {
                const rowIndex = Array.from(document.querySelectorAll(".btnRemoverItem")).indexOf(event.target);

                if (rowIndex > -1) {
                    let tempDiv = document.createElement('div');
                    let column = window.innerWidth > 600 ? 5 : 2;
                    tempDiv.innerHTML = window.dataItemsSale[rowIndex][column];
                    const button = tempDiv.querySelector('button');
                    const totalItemRemovido = parseFloat(button.getAttribute('data-total-item'));

                    window.dataItemsSale.splice(rowIndex, 1);

                    gridItens.updateConfig({
                        data: window.dataItemsSale
                    }).forceRender();

                    if (window.innerWidth > 600) {
                        atualizarRodape();
                    } else {
                        calcularTotais()
                    }
                }
            }
        });

        document.addEventListener("click", function(event) {
            if (event.target.classList.contains("btnRemoverFormaPagamento")) {
                const rowIndex = Array.from(document.querySelectorAll(".btnRemoverFormaPagamento")).indexOf(event
                    .target);

                if (rowIndex > -1) {
                    window.dataPaymentMethods.splice(rowIndex, 1);

                    gridFormasPagamento.updateConfig({
                        data: window.dataPaymentMethods
                    }).forceRender();
                }
            }
        });

        function calcularValorTotalProduto(quantidade, valorUnitario) {
            quantidade = quantidade == '' ? 0 : quantidade;
            return parseFloat(quantidade) * parseFloat(valorUnitario);
        }

        function handleInitForm() {
            window.pedidoId = getQueryVariable("id");

            if (window.pedidoId != undefined) {
                window.notyf.open({
                    type: 'warning',
                    message: '<i class="bi bi-exclamation-circle"></i> Carregando pedido...',
                    duration: 3000,
                });

                getSale(window.pedidoId)
            } else {
                window.notyf.open({
                    type: 'warning',
                    message: '<i class="bi bi-exclamation-circle"></i> Carregando clientes e demais informações...',
                });

            }

            getBusinessUnitData()
            handlePeople()
            handlePaymentMethod()
            handleProducts()

            if (window.innerWidth > 600) {
                $("#labelValorTotalLiquido").parent().addClass('mt-8')
                $("#labelValorTotalBruto").parent().addClass('mt-8')
            } else {
                $("#divTipoFrete").addClass('mt-2')
                $("#divAdicionarItem").removeClass('justify-start')
                $("#divAdicionarItem").addClass('justify-center')
                $("#divAdicionarFormaPagamento").removeClass('justify-start')
                $("#divAdicionarFormaPagamento").addClass('justify-center')
            }
        }

        function handlePeople() {
            axios.get('/getAllPeople')
                .then(function(response) {
                    const data = response.data;

                    if (data.length == 0) {
                        window.notyf.open({
                            type: 'warning',
                            message: '<i class="bi bi-exclamation-circle"></i> Não foram encontrados clientes para essa unidade empresarial.',
                        });
                    }

                    const options = data.map(item => ({
                        id: item.pess_id,
                        text: item.pess_apelido_fantasia
                    }));

                    $('#cliente').select2({
                        data: options
                    });
                })
                .catch(function(error) {
                    console.error(error);
                });
        }

        function handlePaymentMethod() {
            $('#formasPagamento').select2()

            axios.get('/getAllPaymentMethods')
                .then(function(response) {
                    const data = response.data;

                    if (data.length == 0) {
                        window.notyf.open({
                            type: 'warning',
                            message: '<i class="bi bi-exclamation-circle"></i> Não foram encontrados formas de pagamento para essa unidade empresarial.',
                        });
                    }

                    data.forEach(function(paymentMethod) {
                        var newOption = new Option(paymentMethod.frpg_nome, paymentMethod.frpg_id, false,
                            false);
                        $(newOption).attr('data-qtde-parcelas', paymentMethod.frpg_parcelas);
                        $('#formasPagamento').append(newOption).trigger('change');
                    });
                })
                .catch(function(error) {
                    console.error(error);
                });
        }

        function handleProducts() {
            $('#produto').select2()

            axios.get('/getAllProducts')
                .then(function(response) {
                    const data = response.data;

                    if (data.length == 0) {
                        window.notyf.open({
                            type: 'warning',
                            message: '<i class="bi bi-exclamation-circle"></i> Não foram encontrados produtos para essa unidade empresarial.',
                        });
                    }

                    data.forEach(function(product) {
                        var newOption = new Option(product.prod_nome, product.prod_id, false, false);
                        $(newOption).attr('data-valor-unitario', product.prod_preco_varejo);
                        $(newOption).attr('data-aliquota-ipi', product.prod_aliquota_ipi);
                        $(newOption).attr('data-aliquota-icms-st', product.prod_aliquota_icms_st);
                        $('#produto').append(newOption).trigger('change');
                    });
                })
                .catch(function(error) {
                    console.error(error);
                });
        }

        function getQueryVariable(variable) {
            let query = window.location.search.substring(1);
            let vars = query.split("&");

            for (var i = 0; i < vars.length; i++) {
                let pair = vars[i].split("=");

                if (pair[0] == variable) {
                    return pair[1];
                }
            }
        }

        function getSale(id) {
            axios.get('/getSale', {
                    params: {
                        id: id
                    }
                })
                .then((response) => {
                    setTimeout(() => {
                        $("#btnNovoPedido").removeClass('hidden');
                        $("#id").val(response.data.dcfs_id);
                        $("#cliente").val(response.data.pess_id).trigger('change');
                        $("#modalidadeFrete").val(response.data.dcfs_modalidade_frete).trigger('change');
                        $("#referencia").val(response.data.dcfs_referencia);

                        // Itens
                        window.dataItemsSale = [];

                        response.data.itens.forEach(function(item) {
                            let idProduto = item.prod_id;
                            let nomeProduto = item.produto.prod_nome;
                            let quantidade = item.dfit_quantidade;
                            let valorUnitario = item.dfit_valor_unitario;
                            let valorTotal = item.dfit_valor_total_bruto
                            let newRow = handleNewItemGrid(idProduto, nomeProduto, quantidade, valorUnitario, valorTotal, item.dfit_id)
                            window.dataItemsSale.push(newRow);
                        })

                        gridItens.updateConfig({
                            data: window.dataItemsSale
                        }).forceRender();

                        if (window.innerWidth > 600) {
                            atualizarRodape();
                        }

                        // Formas de Pagamento
                        window.dataPaymentMethods = [];

                        response.data.formas_pagamento.forEach(function(formaPagamento) {
                            let idFormaPagamento = formaPagamento.frpg_id;
                            let nomeFormaPagamento = formaPagamento.forma_pagamento.frpg_nome;
                            let valorFormaPagamento = formaPagamento.dfpg_valor
                            let quantidadeParcelas = formaPagamento.dfpg_quantidade_parcelas;
                            let newRow = handleNewPaymentMethodGrid(idFormaPagamento, nomeFormaPagamento, valorFormaPagamento, quantidadeParcelas, formaPagamento.dfpg_id)
                            window.dataPaymentMethods.push(newRow);
                        })

                        gridFormasPagamento.updateConfig({
                            data: window.dataPaymentMethods
                        }).forceRender();

                        let valorTotalBruto = parseFloat(response.data.dcfs_valor_total);
                        let valorTotalDesconto = parseFloat(response.data.dcfs_valor_desconto);
                        let valorTotalLiquido = parseFloat(valorTotalBruto - valorTotalDesconto);

                        $("#descontoPedido").val(valorTotalDesconto);
                        $("#labelValorTotalLiquido").text(`Valor Total Líquido: R$ ${valorTotalLiquido.toFixed(2).replace('.', ',')}`);
                        $("#labelValorTotalBruto").text(`Valor Total Bruto: R$ ${valorTotalBruto.toFixed(2).replace('.', ',')}`);

                        window.descontoPedido = valorTotalDesconto;
                        window.valorTotalLiquidoPedido = valorTotalLiquido;
                        window.valorTotalPedido = valorTotalBruto;

                        window.notyf.open({
                            type: 'success',
                            message: 'Pedido carregado com sucesso!',
                            duration: 3000,
                        });
                    }, 2000);
                }).catch((err) => {
                    console.error(err);
                });
        }

        function getBusinessUnitData() {
            axios.get('/getBusinessUnitData')
                .then((response) => {
                    let textoTituloPedido = '';

                    if (window.pedidoId != undefined) {
                        textoTituloPedido = 'Edição de Pedido - ' + response.data.unem_codigo + ' (' + response
                            .data.unem_nome_fantasia + ')';
                    } else {
                        textoTituloPedido = 'Novo Pedido - ' + response.data.unem_codigo + ' (' + response.data
                            .unem_nome_fantasia + ')';
                    }

                    $("#tituloPedido").text(textoTituloPedido);
                })
                .catch((err) => {
                    console.error(err);
                })
        }

        function handleValidationForm() {
            $("#formSaveSale").submit(function(event) {
                event.preventDefault();

                let isValid = true;
                let message = 'Revise os campos com aviso em vermelho e tente novamente.';
                let messagePaymentMethods = '';

                $("#warningCliente").addClass('hidden')
                $("#warningFormaPagamento").addClass('hidden')
                $("#warningTipoFrete").addClass('hidden')
                $("#warningItens").addClass('hidden')
                $("#warningFormasPagamento").addClass('hidden')

                if ($('[name="pess_id"] option:selected').val() == '') {
                    $("#warningCliente").removeClass('hidden')
                    isValid = false;
                }

                if ($('[name="dcfs_modalidade_frete"] option:selected').val() == '') {
                    $("#warningTipoFrete").removeClass('hidden')
                    isValid = false;
                }

                if (window.dataItemsSale.length == 0) {
                    $("#warningItens").removeClass('hidden')
                    isValid = false;
                }

                if (window.dataPaymentMethods.length == 0) {
                    $("#warningFormasPagamento").removeClass('hidden')
                    isValid = false;
                }

                let valorTotalFormaPagamento = 0

                if (window.innerWidth < 600) {
                    window.dataPaymentMethods.forEach(row => {
                        let arrayFormaPagamento = row[1].split(" / ");
                        valorTotalFormaPagamento += parseFloat(arrayFormaPagamento[1].replace(',', '.')
                            .replace('R$ ', ''))
                    })

                    if (valorTotalFormaPagamento > 0 && valorTotalFormaPagamento != window
                        .valorTotalLiquidoPedido) {
                        messagePaymentMethods =
                            'O valor total das formas de pagamento não corresponde ao valor total do pedido.';
                        isValid = false;
                    }
                } else {
                    window.dataPaymentMethods.forEach(row => {
                        valorTotalFormaPagamento += parseFloat(row[2].replace(',', '.')
                            .replace('R$ ', ''))
                    })

                    if (valorTotalFormaPagamento > 0 && valorTotalFormaPagamento != window
                        .valorTotalLiquidoPedido) {
                        messagePaymentMethods =
                            'O valor total das formas de pagamento não corresponde ao valor total do pedido.';
                        isValid = false;
                    }
                }

                if (!isValid) {
                    window.notyf.open({
                        type: 'warning',
                        duration: messagePaymentMethods != '' ? 6000 : 3000,
                        message: `<i class="bi bi-exclamation-circle"></i> ${messagePaymentMethods != '' ? messagePaymentMethods : message}`,
                    });
                } else {
                    window.notyf.open({
                        type: 'warning',
                        duration: 5000,
                        message: '<i class="bi bi-exclamation-circle"></i> Aguarde um momento que estamos concluindo o seu pedido...',
                    });

                    saveSale();
                }
            })
        }

        function handleNewItemGrid(idProduto, nomeProduto, quantidade, valorUnitario, valorTotal, dfitId) {
            let newRow = [];

            if (window.innerWidth < 600) {
                let item = nomeProduto + ' / ' + (parseFloat(quantidade).toFixed(2)).replace('.', ',') + ' / ' +
                    (parseFloat(valorUnitario).toFixed(2)).replace('.', ',') + ' / ' +
                    (parseFloat(valorTotal).toFixed(2)).replace('.', ',')

                newRow = [
                    idProduto,
                    item,
                    `<button type="button" class="btnRemoverItem bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 mb-3 mr-16 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded" data-id="${Math.floor(Math.random() * 100)}" data-total-item="${parseFloat(valorTotal).toFixed(2)}">Remover</button>`,
                    dfitId
                ];
            } else {
                newRow = [
                    idProduto,
                    nomeProduto,
                    (parseFloat(quantidade).toFixed(2)).replace('.', ','),
                    (parseFloat(valorUnitario).toFixed(2)).replace('.', ','),
                    (parseFloat(valorTotal).toFixed(2)).replace('.', ','),
                    `<button type="button" class="btnRemoverItem bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 mb-3 mr-16 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded" data-id="${Math.floor(Math.random() * 100)}" data-total-item="${parseFloat(valorTotal).toFixed(2)}">Remover</button>`,
                    dfitId
                ];
            }

            return newRow;
        }

        function handleNewPaymentMethodGrid(idFormaPagamento, nomeFormaPagamento, valorFormaPagamento, quantidadeParcelas, dfpgId) {
            let newRow = [];

            if (window.innerWidth < 600) {
                let item = nomeFormaPagamento + ' / R$ ' + (parseFloat(valorFormaPagamento).toFixed(2)).replace('.',
                        ',') + ' / ' +
                    quantidadeParcelas

                newRow = [
                    idFormaPagamento,
                    item,
                    `<button type="button" class="btnRemoverFormaPagamento bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 mb-3 mr-16 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded" data-id="${Math.floor(Math.random() * 100)}">Remover</button>`,
                    dfpgId
                ];
            } else {
                newRow = [
                    idFormaPagamento,
                    nomeFormaPagamento,
                    'R$ ' + (parseFloat(valorFormaPagamento).toFixed(2)).replace('.', ','),
                    quantidadeParcelas,
                    `<button type="button" class="btnRemoverFormaPagamento bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 mb-3 mr-16 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded" data-id="${Math.floor(Math.random() * 100)}">Remover</button>`,
                    dfpgId
                ];
            }

            return newRow;
        }

        window.goToNewPedido = () => {
            Swal.fire({
                title: 'Deseja criar novo pedido?',
                icon: 'question',
                showDenyButton: true,
                denyButtonText: 'Não',
                showConfirmButton: true,
                confirmButtonText: 'Sim',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/pedido';
                }
            })
        }

        function saveSale() {
            axios.post('/saveSale', {
                id: $("#id").val(),
                mobile: window.innerWidth < 600 ? true : false,
                pess_id: $('[name="pess_id"] option:selected').val(),
                dcfs_modalidade_frete: $('[name="dcfs_modalidade_frete"] option:selected')
                    .val(),
                dcfs_referencia: $('[name="dcfs_referencia"]').val(),
                itens: window.dataItemsSale,
                formas_pagamento: window.dataPaymentMethods,
                valor_desconto: window.descontoPedido,
                valor_total_liquido: window.valorTotalLiquidoPedido,
                valor_total_bruto: window.valorTotalPedido,
            })
            .then((response) => {
                window.notyf.open({
                    type: 'success',
                    duration: 3000,
                    message: 'Pedido concluído com sucesso!',
                });

                setTimeout(() => {
                    window.location.href = '/pedidos';
                }, 3000);
            }).catch((err) => {
                console.error(err);
            });
        }
    </script>
</x-app-layout>

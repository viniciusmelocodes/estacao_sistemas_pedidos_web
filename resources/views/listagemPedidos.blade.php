<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listagem de Pedidos') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="flex justify-end">
            <button
                class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 mb-3 mr-16 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded"
                onclick="window.location.href='/cadastroPedido'">Cadastrar novo pedido</button>
        </div>


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div id="wrapper"></div>
                </div>
            </div>
        </div>
    </div>

    <script type="module">
        import {
            Grid,
            html
        } from "https://unpkg.com/gridjs?module";

        const grid = new Grid({
            columns: [{
                    name: 'Número do Pedido',
                    formatter: (_, row) => html(`<button class="btn btn-primary">${row.cells[0].data}</button>`)
                },
                "Data do Pedido",
                "CPF/CNPJ do cliente"
            ],
            sort: true,
            search: true,
            pagination: true,
            language: {
                'search': {
                    'placeholder': 'Busque pelo código ou data ...'
                },
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
            data: [
                ["1", "25/11/2024", "094.048.581-30"],
                ["2", "28/11/2024", "86.578.185/0001-31"],
                ["32", "29/11/2024", "03.608.105/0001-16"]
            ]

        }).render(document.getElementById("wrapper"));
    </script>

</x-app-layout>

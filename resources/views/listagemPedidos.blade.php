<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" id="tituloListagemPedidos">
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="flex justify-end">
            <button
                class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 mb-3 mr-16 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded"
                onclick="window.location.href='/cadastroPedido'">Novo pedido</button>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 hidden" id="divListagemPedidos">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div id="divTableListagemPedidos"></div>
                </div>
            </div>
        </div>
    </div>

    <script type="module">
        getBusinessUnitData()

        const notyf = new Notyf({
            duration: 3000,
            position: {
                x: 'right',
                y: 'top',
            },
            types: [{
                type: 'warning',
                background: 'orange',
            }]
        });

        notyf.open({
            type: 'warning',
            message: '<i class="bi bi-exclamation-circle"></i> Buscando pedidos...',
        });

        function formatDate(dateString) {
            const date = new Date(dateString);

            const day = String(date.getDate()).padStart(2, '0');
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const year = date.getFullYear();

            const hours = String(date.getHours()).padStart(2, '0');
            const minutes = String(date.getMinutes()).padStart(2, '0');
            const seconds = String(date.getSeconds()).padStart(2, '0');

            return `${day}/${month}/${year} ${hours}:${minutes}:${seconds}`;
        }

        import {
            Grid,
            html
        } from "https://unpkg.com/gridjs?module";

        let dataSales = []

        axios.get('/getAllSales')
            .then(response => {
                response.data.forEach(element => {
                    const dateSale = formatDate(element.dcfs_data_emissao)

                    dataSales.push([
                        element.dcfs_numero,
                        dateSale,
                        element.pessoa.pess_apelido_fantasia,
                        element.dcfs_valor_total,
                        null
                    ])
                })

                document.getElementById('divListagemPedidos').style.display = 'block';

                const grid = new Grid({
                    columns: [
                        "Nº Pedido",
                        "Data",
                        "Nome/Razão Social/Fantasia",
                        "Valor Total",
                        {
                            name: 'Ações',
                            formatter: (_, row) => html(
                                `<button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 mb-3 mr-16 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded" onclick="window.location.href='/cadastroPedido?id=${row.cells[0].data}'">
                                    Editar
                                 </button>`
                            )
                        }
                    ],
                    sort: true,
                    search: true,
                    pagination: true,
                    language: {
                        'search': {
                            'placeholder': 'Pesquise seu pedido...'
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
                    data: dataSales
                }).render(document.getElementById("divTableListagemPedidos"));
            })
            .catch(error => {
                console.log(error)
            })

        
        function getBusinessUnitData() {
            axios.get('/getBusinessUnitData')
                .then((response) => {
                    $("#tituloListagemPedidos").text('Listagem de Pedidos - ' + response.data.unem_codigo + ' (' + response.data.unem_nome_fantasia + ')');
                })
                .catch((err) => {
                    console.error(err);
                })
        }
    </script>

</x-app-layout>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

        <style>
            #unem-id + .select2-container .select2-selection__rendered img, .img-flag{
                width: 14px;
                height: 14px;
                margin-right: 5px;
                vertical-align: middle;
            }

            #unem-id + .select2-container .select2-dropdown {
                display: none;
            }

            .select2-container--default .select2-selection--single {
                background-color: #ECF2FF;
                border: 1px solid #aaa;
            }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            @auth
                <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 mb-3 mr-16 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded" onclick="window.location.href='/listagemPedidos'">
                    Visualizar lista de pedidos.
                </button>
            @else
                <div>
                    <a href="/">
                        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                    </a>
                </div>

                <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    {{ $slot }}
                </div>
            @endauth
        </div>
    </body>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.8/axios.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    @auth
        Swal.fire({
            title: 'Você já está logado. Deseja voltar ao sistema?',
            icon: 'question',
            confirmButtonText: "Sim",
            denyButtonText: "Não",
            showDenyButton: true,
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/listagemPedidos';
            }
        });
    @else
        $(document).ready(function() {
            function formatOption(option) {
                if (!option.id) {
                    return option.text;
                }

                var optionWithImage = $(
                    '<span><img src="' + option.icon + '" class="img-flag" width="20"/> ' + option.text + '</span>'
                );

                return optionWithImage;
            }

            let options = []

            axios.get('/getAllUnidadesEmpresariais')
                .then(function (response) {
                    Object.keys(response.data).forEach((k, i) => {
                        options.push({
                            id: response.data[k].unem_id,
                            icon: response.data[k].unem_logo,
                            text: response.data[k].unem_nome_fantasia,
                        });
                    });

                    $('#unem-id').select2({
                        templateResult: formatOption,
                        templateSelection: formatOption,
                        data: options,
                        minimumResultsForSearch: Infinity
                    });

                    Toastify({
                        text: "Unidades empresariais carregadas com sucesso!",
                        duration: 3000,
                        newWindow: true,
                        close: true,
                        gravity: "top", // `top` or `bottom`
                        position: "center", // `left`, `center` or `right`
                        stopOnFocus: true, // Prevents dismissing of toast on hover
                        style: {
                            background: "orange",
                        },
                    }).showToast();
                })
                .catch(function (error) {
                    console.log(error);
                })
        })
        @endauth
    </script>
</html>

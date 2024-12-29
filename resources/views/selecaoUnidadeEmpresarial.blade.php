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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.8/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
</head>

<body class="font-sans antialiased">
    <div class="container mx-auto px-4 mt-6">
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <div class="flex  justify-end">
                <button :href="route('logout')"
                    onclick="event.preventDefault();
                            this.closest('form').submit();"
                    class="bg-sky-400 hover:bg-sky-500 text-white font-bold py-2 mb-3 mr-16 px-4 border-b-4 border-sky-800 hover:border-sky-600 rounded">
                    Sair
                </button>
            </div>
        </form>

        @if (count($unems))
            <center>
                <h2 class="text-black dark:text-white text-lg font-medium">Selecione unidade empresarial para continuar:
                </h2>
            </center>
        @endif

        <div class="flex flex-wrap justify-center mt-4">
            @foreach ($unems as $unem)
                <div class="p-4 max-w-sm" onclick="selecionarUnidade({{ $unem->unem_id }})">
                    <div class="flex rounded-lg h-full dark:bg-gray-800 bg-cyan-500 p-8 flex-col">
                        <div class="flex items-center mb-3">
                            <h2 class="text-white dark:text-white text-lg font-medium">{{ $unem->unem_nome_fantasia }}
                            </h2>
                        </div>
                        <div class="flex flex-col justify-between flex-grow">
                            <center>
                                <img src="data:image/jpeg;base64, {{ base64_encode($unem->unem_logo) }}"
                                    width="100" />
                            </center>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

<script>
    function selecionarUnidade(id) {
        const nome = '{{ Auth::user()->name }}';
        
        const notyf = new Notyf({
            duration: 10000,
            position: {
                x: 'center',
                y: 'top',
            },
            types: [{
                type: 'warning',
                background: 'orange',
            }]
        });

        notyf.open({
            type: 'warning',
            message: '<i class="bi bi-exclamation-circle"></i> Aguarde um momento...'
        });

        axios.post('/setUnemIdToUserLogged', {
                unemId: id,
            })
            .then(function(response) {
                notyf.dismissAll();

                notyf.success('Bem vindo(a), ' + nome + '!');

                setTimeout(() => {
                    window.location.href = '/pedidos';
                }, 3000);
            })
            .catch(function(error) {
                console.error(error);
            });
    }
</script>

</html>

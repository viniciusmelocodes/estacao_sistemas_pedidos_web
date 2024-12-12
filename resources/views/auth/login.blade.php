<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('E-mail')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Senha')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Lembrar do meu login') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Esqueceu sua senha?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Login') }}
            </x-primary-button>
        </div>


        {{-- @csrf

        <!-- Usuário -->
        <div>
            <x-input-label for="usrs_login" :value="__('Usuário')" />
            <x-text-input id="usrs_login" class="block mt-1 w-full" type="text" name="usrs_login" :value="old('usrs_login')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('usrs_login')" class="mt-2" />
        </div>

        <!-- Senha -->
        <div class="mt-4">
            <x-input-label for="usrs_senha" :value="__('Senha')" />

            <x-text-input id="usrs_senha" class="block mt-1 w-full"
                            type="password"
                            name="usrs_senha"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('usrs_senha')" class="mt-2" />
        </div>

        <!-- UNEM -->
        <div class="mt-4">
            <x-input-label for="unem_id" :value="__('Unidade Empresarial')" />
            <select name="unem_id" id="unem_id" class="block mt-1 w-full" required>
                <option value="">Selecione</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
            <x-input-error :messages="$errors->get('unem_id')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3">
                {{ __('Login') }}
            </x-primary-button>
        </div> --}}
    </form>
</x-guest-layout>

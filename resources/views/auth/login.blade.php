<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Usuário -->
        <div>
            <x-input-label for="email" :value="__('Usuário')" />
            <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Senha')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Unidade Empresarial -->
        <div class="mt-4">
            <x-input-label for="unem_id" :value="__('Unidade Empresarial')" />
            <select name="unem_id" id="unem_id" class="block mt-1 w-full" required>
                <option value=""></option>
            </select>
            <x-input-error :messages="$errors->get('unem_id')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3">
                {{ __('Entrar') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Ícone da Unidade Empresarial -->
    <div id="icon-unem" class="mt-6"></div>
</x-guest-layout>

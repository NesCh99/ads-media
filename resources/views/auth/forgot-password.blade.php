<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="text-center">
            <h2 class=" text-white mt-6 text-base font-medium tracking-tight">
                Encuentra tu cuenta de ADS SPORT
            </h2>

        </div>
        <br>
        <div class="mb-4 text-sm ml-2  text-slate-900 text-slate-400  font-medium tracking-tight">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}"
                    class="text-white mt-5 text-base font-medium tracking-tight" />
                <x-jet-input id="email" class="block mt-1 w-full ads text-slate-50 text-slate-50 text-sm"
                    type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button style="background-color: #374151">
                    {{ __('Send Link') }}
                </x-jet-button>
            </div>
        </form>
        <br>
        <div class="text-sm text-slate-500 text-slate-400 font-semibold py-3 text-center">
            Copyright © <span id="get-current-year">2023</span><a href="#"
                class=" text-slate-500 text-slate-400 hover:text-slate-500  " target="_blank"> ADS Media
        </div>
    </x-jet-authentication-card>
</x-guest-layout>

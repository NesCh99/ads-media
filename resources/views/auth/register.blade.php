<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />
        <div class="text-center mb-10">
            <h1 class="font-bold text-3xl text-gray-900  text-white mt-6 tracking-tight">REGISTRARSE</h1>
            <p class="text-slate-50 text-slate-400 mt-2 text-sm">Ingresa tus datos para registrarte</p>
        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}"
                    class="text-white mt-5 text-base font-medium tracking-tight" />
                <x-jet-input id="name" class="block mt-1 w-full ads text-slate-50 text-slate-50 text-sm"
                    type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                  

            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}"
                    class="text-white mt-5 text-base font-medium tracking-tight" />
                <x-jet-input id="email" class="block mt-1 w-full ads text-slate-50 text-slate-50 text-sm"
                    type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}"
                    class="text-white mt-5 text-base font-medium tracking-tight" />
                <x-jet-input id="password" class="block mt-1 w-full ads text-slate-50 text-slate-50 text-sm"
                    type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}"
                    class="text-white mt-5 text-base font-medium tracking-tight" />
                <x-jet-input id="password_confirmation"
                    class="block mt-1 w-full ads text-slate-50 text-slate-50 text-sm" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms" />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' =>
                                        '<a target="_blank" href="' .
                                        route('terms.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                        __('Terms of Service') .
                                        '</a>',
                                    'privacy_policy' =>
                                        '<a target="_blank" href="' .
                                        route('policy.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                        __('Privacy Policy') .
                                        '</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-slate-50 text-slate-50 hover:text-slate-50"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4" style="background-color: #374151">
                    {{ __('Register') }}
                </x-jet-button>
            </div>

        </form>
        <div class="text-sm text-slate-50 text-slate-50 font-semibold py-3 text-center">
            Copyright © <span id="get-current-year">2022</span><a href="#"
                class=" text-slate-50 text-slate-50 hover:text-slate-50" target="_blank"> ADS SPORTS
        </div>
    </x-jet-authentication-card>


</x-guest-layout>

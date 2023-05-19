<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>
        <div class="text-center">
			<h2 class=" text-white mt-6 text-base font-medium tracking-tight">
				Crea una contraseña segura
			</h2>
			<p class="mt-2 text-sm text-gray-500 " style="margin-bottom: 10px">Crea una contraseña nueva y segura que no uses en otros sitios web</p>
		</div>

        <x-jet-validation-errors class="mb-4 class="text-white mt-5 text-base font-medium tracking-tight />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" 	class="text-slate-900 text-white mt-5 text-base font-medium tracking-tight" />
                <x-jet-input id="email" class="block mt-1 w-full ads text-slate-500 text-slate-50 text-sm" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" 	class="text-slate-900 text-white mt-5 text-base font-medium tracking-tight"  />
                <x-jet-input id="password" class="block mt-1 w-full ads text-slate-500 text-slate-50 text-sm" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}"  	class="text-slate-900 text-white mt-5 text-base font-medium tracking-tight" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full ads text-slate-500 text-slate-50 text-sm" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4" >
                <x-jet-button style="background-color: #374151">
                    {{ __('Reset Password') }}
                </x-jet-button>
            </div>
        </form>
        <br>
        <div class="text-sm text-slate-500 text-slate-50 font-semibold py-3 text-center">
            Copyright © <span id="get-current-year">2023</span><a href="#"
                class=" text-slate-500 text-slate-50 hover:text-slate-500" target="_blank"> ADS Media
        </div>
    </x-jet-authentication-card>
</x-guest-layout>

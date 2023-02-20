<x-guest-layout>
	<x-jet-authentication-card>
		<x-slot name="logo">
			<x-jet-authentication-card-logo />
		</x-slot>
		<div class="text-center">
			<h2 class=" text-white mt-6 text-base font-medium tracking-tight">
				¡Bienvenido de nuevo!
			</h2>
			<p class="mt-2 text-sm text-gray-500 " style="margin-bottom: 10px">Inicie sesión en su cuenta</p>
		</div>
		<x-jet-validation-errors class="mb-4 text-center" />
		@if (session('status'))
		<div class="mb-4 font-medium text-sm text-green-600">
			{{ session('status') }}
		</div>
		@endif
		
		<form method="POST" action="{{ route('login') }}">
			@csrf
			<div>
				<x-jet-label for="email" value="{{ __('Email') }}"
					class="text-white-900 text-white mt-5 text-base font-medium tracking-tight" />
				<x-jet-input id="email" class="block mt-1 w-full ads text-slate-50 text-slate-50 text-sm"
					type="email" name="email" :value="old('email')" required autofocus />
			</div>
			<div class="mt-4">
				<x-jet-label for="password" value="{{ __('Password') }}"
					class="text-white-900 text-white mt-5 text-base font-medium tracking-tight" />
				<x-jet-input id="password" class="block mt-1 w-full ads text-slate-50 text-slate-50 text-sm"
					type="password" name="password" required autocomplete="current-password" />
			</div>
			<div class="block mt-4">
				<label for="remember_me" class="flex items-center">
					<x-jet-checkbox id="remember_me" name="remember" />
					<span
						class="ml-2  text-white-900 text-white  text-base font-medium tracking-tight">{{ __('Remember me') }}</span>
				</label>
			</div>
			<div class="flex items-center justify-end mt-4">
				@if (Route::has('password.request'))
				<a class="underline text-sm text-slate-50 text-slate-50 hover:text-slate-50"
					href="{{ route('password.request') }}">
				{{ __('Forgot your password?') }}
				</a>
				@endif
				<x-jet-button class="ml-4" style="background-color: #374151">
					{{ __('Log in') }}
				</x-jet-button>
			</div>
			<p
				class="flex flex-col items-center justify-center mt-10 text-center text-md text-slate-50 text-slate-400">
				<span>¿No tienes una cuenta?</span>
				<a href="{{ route('register') }}"
					class="text-indigo-400 hover:text-blue-500 no-underline hover:underline cursor-pointer transition ease-in duration-300">Registrar</a>
			</p>
		</form>
	</x-jet-authentication-card>
</x-guest-layout>
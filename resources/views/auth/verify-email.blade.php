<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="text-center">
			<h2 class=" text-white mt-6 text-base font-medium tracking-tight">
				¡Bienvenido !
			</h2>

		</div>



        <div class=" mb-4 text-sm ml-2  text-white  font-medium tracking-tight">
            {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didnt receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-jet-button type="submit" style="background-color: #374151">
                        {{ __('Resend Verification Email') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
        <br>
        <div class="text-sm text-slate-500 text-slate-400 font-semibold py-3 text-center">
            Copyright © <span id="get-current-year">2023</span><a 
                class=" text-slate-500 text-slate-400 hover:text-slate-500" target="_blank"> ADS MEDIA
        </div>
    </x-jet-authentication-card>
</x-guest-layout>

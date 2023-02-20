<x-app-layout>





    @include('client.componets.sidebar')

    <main class="page has-sidebar">
        <div class="container-fluid relative animatedParent animateOnce p-0">
            <div class="animated fadeInUpShort">
                <!--Banner-->
                <section class="relative" data-bg-possition="center"
                    style="background-image:url('https://images.pexels.com/photos/114296/pexels-photo-114296.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');">
                    <div class="wrapper has-bottom-gradient">
                        <div class="row pt-5 ml-lg-5 mr-lg-5">
                            <div class="col-md-10 offset-1">
                                <div class="row my-5 pt-5">
                                    <div class="col-md-3">


                                    </div>
                                    <div class="col-md-9">


                                        

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bottom-gradient "></div>
                </section>
                <!--Banner-->

                <div class="wrapper p-1 p-lg-4" style="width: 90%">
                    <!--New Releases-->
                    <div class="min-w-screen min-h-screen  py-5">
                        <div class="w-full bg-white border-t border-b border-gray-200 px-5 py-10 text-gray-800 rounded">
                            <div class="w-full">
                                <div class="-mx-3 md:flex items-start">
                                    <div class="px-3 md:w-6/12 lg:pr-10">
                                        <div
                                            class="w-full mx-auto text-gray-800 font-light mb-6 border-b border-gray-200 pb-6">
                                            @foreach ($videoNoSuscripcion as $video)
                                                <div class="w-full flex items-center">
                                                    <div
                                                        class="overflow-hidden rounded-lg w-16 h-15 border border-gray-200">
                                                


                                                        @if ($video->PortadaVid)
                                                            <img src="{{ Storage::url($video->PortadaVid) }}"
                                                                alt="Card image">
                                                        @else
                                                            <img src="https://images.pexels.com/photos/274422/pexels-photo-274422.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                                                alt="Card image">
                                                        @endif





                                                    </div>
                                                    <div class="flex-grow pl-3">
                                                        <h6 class="font-semibold uppercase text-gray-600">
                                                            {{ $video->NombreVid }}
                                                        </h6>
                                                        <p class="text-gray-400">x 1 video</p>
                                                    </div>
                                                    <div>
                                                        <span
                                                            class="font-semibold text-gray-600 text-xl">${{ $video->PrecioVid }}</span><span
                                                            class="font-semibold text-gray-600 text-sm">.00</span>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>







                                        @if ($aux1 == $aux2)
                                            <div class="mb-6 pb-6 border-b border-gray-200 text-gray-800">
                                                <div class="w-full flex mb-3 items-center">
                                                    <div class="flex-grow">
                                                        <span class="text-gray-600">Subtotal</span>
                                                    </div>
                                                    <div class="pl-3">
                                                        <span class="font-semibold">${{ $subtotal }}</span>
                                                    </div>
                                                </div>
                                                <div class="w-full flex items-center">
                                                    <div class="flex-grow">
                                                        <span class="text-gray-600">Descuento</span>
                                                    </div>
                                                    <div class="pl-3">
                                                        <span class="font-semibold">{{ $descuentoCampeonato }} %</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="mb-6 pb-6 border-b border-gray-200 md:border-none text-gray-800 text-xl">
                                                <div class="w-full flex items-center">
                                                    <div class="flex-grow">
                                                        <span class="text-gray-600">Total</span>
                                                    </div>
                                                    <div class="pl-3">
                                                        <span class="font-semibold text-gray-400 text-sm">USD</span>
                                                        <span class="font-semibold">${{ $monto }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="mb-6 pb-6 border-b border-gray-200 text-gray-800">
                                                <div class="w-full flex mb-3 items-center">
                                                    <div class="flex-grow">
                                                        <span class="text-gray-600">Subtotal</span>
                                                    </div>
                                                    <div class="pl-3">
                                                        <span class="font-semibold">${{ $subtotal }}</span>
                                                    </div>
                                                </div>
                                                <div class="w-full flex items-center">
                                                    <div class="flex-grow">
                                                        <span class="text-gray-600">Descuento</span>
                                                    </div>
                                                    <div class="pl-3">
                                                        <span class="font-semibold">{{ $descuento }}%</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="mb-6 pb-6 border-b border-gray-200 md:border-none text-gray-800 text-xl">
                                                <div class="w-full flex items-center">
                                                    <div class="flex-grow">
                                                        <span class="text-gray-600">Total</span>
                                                    </div>
                                                    <div class="pl-3">
                                                        <span class="font-semibold text-gray-400 text-sm">USD</span>
                                                        <span class="font-semibold">${{ $monto }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif




                                    </div>
                                    <div class="px-3 md:w-6/12">

                                        @if ($cliente->billing)
                                            <div
                                                class="w-full mx-auto rounded-lg bg-white border border-gray-200 p-3 text-gray-800 font-light mb-6">
                                                <div class="w-full flex mb-3 items-center">
                                                    <div class="w-32">
                                                        <span class="text-gray-600 font-semibold">Contacto</span>
                                                    </div>
                                                    <div class="flex-grow pl-3">
                                                        <span>{{ $cliente->billing->name }}</span>
                                                    </div>
                                                </div>

                                                <div class="w-full flex mb-3 items-center">
                                                    <div class="w-32">
                                                        <span class="text-gray-600 font-semibold">Correo
                                                            Electrónico</span>
                                                    </div>
                                                    <div class="flex-grow pl-3">
                                                        <span>{{ $cliente->billing->email }}</span>
                                                    </div>
                                                </div>

                                                <div class="w-full flex items-center">
                                                    <div class="w-32">
                                                        <span class="text-gray-600 font-semibold">Número de
                                                            Teléfono</span>
                                                    </div>
                                                    <div class="flex-grow pl-3">
                                                        <span>{{ $cliente->billing->telefono }}</span>
                                                    </div>
                                                </div>

                                                <br>

                                                <div class="w-full flex items-center">
                                                    <div class="w-32">
                                                        <span class="text-gray-600 font-semibold">Dirección de
                                                            Domicilio</span>
                                                    </div>
                                                    <div class="flex-grow pl-3">
                                                        <span>{{ $cliente->billing->direccion }}</span>
                                                    </div>
                                                </div>




                                                <!-- component -->
                                                <!-- This is an example component -->

                                                <div class='flex items-center justify-center   '
                                                    x-data="{ reportsOpen: false }">
                                                    <div class='w-full max-w-lg  mx-auto'>
                                                        <div class='max-w-md mx-auto space-y-6'>




                                                            <div @click="reportsOpen = !reportsOpen"
                                                                class='flex items-center text-gray-600 w-full border-b overflow-hidden mt-32 md:mt-0 mb-5 mx-auto'>
                                                                <div class='w-10 border-r px-2 transform transition duration-300 ease-in-out'
                                                                    :class="{
                                                                        'rotate-90': reportsOpen,
                                                                        ' -translate-y-0.0': !
                                                                            reportsOpen
                                                                    }">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        fill="none" viewBox="0 0 24 24"
                                                                        stroke-width="1.5" stroke="currentColor"
                                                                        class="w-6 h-6">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                                    </svg>
                                                                </div>
                                                                <div class='flex items-center px-2 py-3'>
                                                                    <div class='mx-3'>
                                                                        <button class="hover:underline">Editar</button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class=" md:p-0 w-full transform transition duration-300 ease-in-out border-b "
                                                                x-cloak x-show="reportsOpen" x-collapse
                                                                x-collapse.duration.500ms>
                                                                <div class="">




                                                                    {!! Form::open(['route' => ['cliente.billing.update', $cliente->billing->id], 'method' => 'put']) !!}
                                                                    <div class="form-group">
                                                                        {!! Form::label('Nombre', 'Nombre Completo') !!}
                                                                        <span class="form-required">*</span>
                                                                        {!! Form::text('Nombre', $cliente->billing->name, [
                                                                            'class' => 'form-control w-full rounded-md border bg-white py-2 px-2 outline-none ring-blue-600 focus:ring-1',
                                                                        ]) !!}
                                                                        @error('Nombre')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        @enderror


                                                                    </div>


                                                                    <div class="form-group" style="display: none">
                                                                        {!! Form::label('campeonato', 'video') !!}
                                                                        {!! Form::text('campeonato', $campeonato->idCampeonato, [
                                                                            'class' => 'form-control w-full rounded-md border bg-white py-2 px-2 outline-none ring-blue-600 focus:ring-1',
                                                                        ]) !!}



                                                                    </div>





                                                                    <div class="form-group">
                                                                        {!! Form::label('Address', 'Dirección de Domicilio') !!}
                                                                        <span class="form-required">*</span>
                                                                        {!! Form::text('Address', $cliente->billing->direccion, [
                                                                            'class' => 'form-control w-full rounded-md border bg-white py-2 px-2 outline-none ring-blue-600 focus:ring-1',
                                                                        ]) !!}
                                                                        @error('Address')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        @enderror


                                                                    </div>


                                                                    <div class="form-group">
                                                                        {!! Form::label('Email', 'Correo Electrónico') !!}
                                                                        <span class="form-required">*</span>
                                                                        {!! Form::text('Email', $cliente->billing->email, [
                                                                            'class' => 'form-control w-full rounded-md border bg-white py-2 px-2 outline-none ring-blue-600 focus:ring-1',
                                                                        ]) !!}
                                                                        @error('Email')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="form-group">
                                                                        {!! Form::label('Phone', 'Número de Teléfono') !!}
                                                                        <span class="form-required">*</span>
                                                                        {!! Form::text('Phone', $cliente->billing->telefono, [
                                                                            'pattern' => '[0]{1}[0-9]{9}',
                                                                            'maxlength' => '10',
                                                                            'class' => 'form-control w-full rounded-md border bg-white py-2 px-2 outline-none ring-blue-600 focus:ring-1',
                                                                        ]) !!}
                                                                        @error('Phone')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        @enderror


                                                                    </div>

                                                                    {!! Form::submit('Guardar y Continuar', [
                                                                        'class' =>
                                                                            'p-2 my-2 bg-blue-400 text-white rounded-md focus:outline-none focus:ring-2 ring-blue-200 ring-offset-2 ',
                                                                    ]) !!}

                                                                    {!! Form::close() !!}
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div
                                                class="w-full mx-auto rounded-lg bg-white border border-gray-200 p-3 text-gray-800 font-light mb-6">
                                                <div class=" ">

                                                    <div class="relative mb-5">
                                                        <h1 class="mb-2 text-primary">Detalles de Facturación</h1>
                                                        <p>ADS SPORTS recopila y utiliza datos personales de acuerdo con
                                                            nuestra <a href="{{route('cliente.empresa.politicas')}}" target="_blank" rel="noopener noreferrer"  class="text-primary"> Política de Privacidad </a>. Al crear una cuenta, usted
                                                            acepta nuestras <a href="{{route('cliente.empresa.terminos')}}" target="_blank" rel="noopener noreferrer" class="text-primary"> Condiciones de Uso.</a>
                                                        </p>
                                                    </div>



                                                </div>
                                                <div class="">




                                                    {!! Form::open(['route' => 'client.billings.store']) !!}
                                                    <div class="form-group">
                                                        {!! Form::label('Nombre', 'Nombre Completo') !!}
                                                        <span class="form-required">*</span>
                                                        {!! Form::text('Nombre', auth()->user()->name, [
                                                            'class' => 'form-control w-full rounded-md border bg-white py-2 px-2 outline-none ring-blue-600 focus:ring-1',
                                                        ]) !!}
                                                        @error('Nombre')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror


                                                    </div>


                                                    <div class="form-group" style="display: none">
                                                        {!! Form::label('campeonato', 'video') !!}
                                                        {!! Form::text('campeonato', $campeonato->idCampeonato, [
                                                            'class' => 'form-control w-full rounded-md border bg-white py-2 px-2 outline-none ring-blue-600 focus:ring-1',
                                                        ]) !!}



                                                    </div>





                                                    <div class="form-group">
                                                        {!! Form::label('Address', 'Dirección de Domicilio') !!}
                                                        <span class="form-required">*</span>
                                                        {!! Form::text('Address', null, [
                                                            'class' => 'form-control w-full rounded-md border bg-white py-2 px-2 outline-none ring-blue-600 focus:ring-1',
                                                        ]) !!}
                                                        @error('Address')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror


                                                    </div>


                                                    <div class="form-group">
                                                        {!! Form::label('Email', 'Correo Electrónico') !!}
                                                        <span class="form-required">*</span>
                                                        {!! Form::text('Email', auth()->user()->email, [
                                                            'class' => 'form-control w-full rounded-md border bg-white py-2 px-2 outline-none ring-blue-600 focus:ring-1',
                                                        ]) !!}
                                                        @error('Email')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        {!! Form::label('Phone', 'Número de Teléfono') !!}
                                                        <span class="form-required">*</span>
                                                        {!! Form::text('Phone', null, [
                                                            'pattern' => '[0]{1}[0-9]{9}',
                                                            'maxlength' => '10',
                                                            'class' => 'form-control w-full rounded-md border bg-white py-2 px-2 outline-none ring-blue-600 focus:ring-1',
                                                        ]) !!}
                                                        @error('Phone')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror


                                                    </div>

                                                    {!! Form::submit('Guardar y Continuar', [
                                                        'class' =>
                                                            'p-2 my-2 bg-blue-400 text-white rounded-md focus:outline-none focus:ring-2 ring-blue-200 ring-offset-2 ',
                                                    ]) !!}

                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        @endif

                                        <div
                                            class="w-full mx-auto rounded-lg bg-white border border-gray-200 text-gray-800 font-light mb-6">
                                            <div class="w-full p-3 border-b border-gray-200">
                                                <!-- checkout -->
                                                @if ($cliente->billing)
                                                    <form method="POST"
                                                        action="{{ route('cliente.pago.paypal.campeonato', $idCampeonato) }}"
                                                        autocomplete="off"class="sign__form sign__form--cart">
                                                        @csrf
                                                        <h4 class="sign__title">Métodos De Pago</h4>

                                                        <div class="sign__group sign__group--row">

                                                            <!-- component -->
                                                            <!-- This is an example component -->
                                                            <div class="max-w-2xl mx-auto">




                                                                <button type="submit"
                                                                    class="text-gray-900 bg-[#F7BE38] hover:bg-[#F7BE38]/90 focus:ring-4 focus:ring-[#F7BE38]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#F7BE38]/50 mr-2 mb-2"
                                                                    style="background-color: #F7BE38 ; color:black;width:100%">
                                                                    <svg class="mr-2 -ml-1 w-4 h-4" aria-hidden="true"
                                                                        focusable="false" data-prefix="fab"
                                                                        data-icon="paypal" role="img"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 384 512">
                                                                        <path fill="currentColor"
                                                                            d="M111.4 295.9c-3.5 19.2-17.4 108.7-21.5 134-.3 1.8-1 2.5-3 2.5H12.3c-7.6 0-13.1-6.6-12.1-13.9L58.8 46.6c1.5-9.6 10.1-16.9 20-16.9 152.3 0 165.1-3.7 204 11.4 60.1 23.3 65.6 79.5 44 140.3-21.5 62.6-72.5 89.5-140.1 90.3-43.4 .7-69.5-7-75.3 24.2zM357.1 152c-1.8-1.3-2.5-1.8-3 1.3-2 11.4-5.1 22.5-8.8 33.6-39.9 113.8-150.5 103.9-204.5 103.9-6.1 0-10.1 3.3-10.9 9.4-22.6 140.4-27.1 169.7-27.1 169.7-1 7.1 3.5 12.9 10.6 12.9h63.5c8.6 0 15.7-6.3 17.4-14.9 .7-5.4-1.1 6.1 14.4-91.3 4.6-22 14.3-19.7 29.3-19.7 71 0 126.4-28.8 142.9-112.3 6.5-34.8 4.6-71.4-23.8-92.6z">
                                                                        </path>
                                                                    </svg>
                                                                    Pagar Con Paypal
                                                                </button>


                                                                <div id="smart-button-container">
                                                                    <div style="text-align: center;">
                                                                        <div id="paypal-button-container"></div>
                                                                    </div>
                                                                </div>


                                                                <script
                                                                    src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_CLIENT_ID') }}&components=buttons,funding-eligibility&buyer-country=EC">
                                                                </script>

                                                                <script>
                                                                    paypal.Buttons({
                                                                        fundingSource: paypal.FUNDING.CARD,
                                                                        createOrder: function(data, actions) {
                                                                            return actions.order.create({

                                                                                payer: {
                                                                                    email_address: '{{ auth()->user()->email }}',

                                                                                    name: {
                                                                                        given_name: '{{ auth()->user()->name }}'

                                                                                    },

                                                                                    address: {
                                                                                        country_code: "EC"
                                                                                    }

                                                                                },
                                                                                purchase_units: [{
                                                                                    amount: {
                                                                                        value: '{{ $monto }}'
                                                                                    }
                                                                                }],
                                                                            });
                                                                        },

                                                                        // Call your server to finalize the transaction
                                                                        onApprove: function(data, actions) {
                                                                            return fetch('/streaming/pago/paypal/campeonato/' + data.orderID + '?idCampeonato=' +
                                                                                    {{ $idCampeonato }})

                                                                                .then(res => res.json())
                                                                                .then(function(response) {
                                                                                    // Three cases to handle:
                                                                                    //   (1) Recoverable INSTRUMENT_DECLINED -> call actions.restart()
                                                                                    //   (2) Other non-recoverable errors -> Show a failure message
                                                                                    //   (3) Successful transaction -> Show confirmation or thank you
                                                                                    // Show a failure message
                                                                                    if (!response.success) {
                                                                                        const failureMessage = 'Sorry, your transaction could not be processed.';
                                                                                        alert(failureMessage);
                                                                                        return;
                                                                                    }


                                                                                    location.href = response.url;


                                                                                });
                                                                        }




                                                                    }).render('#paypal-button-container');
                                                                </script>







                                                                </p>


                                                            </div>

                                                        </div>
                                                        <div class="sign__group sign__group--row">
                                                            <span class="sign__text sign__text--small">Su factura será
                                                                enviada al correo electrónico,
                                                                {{ auth()->user()->email }} </span>
                                                        </div>

                                                    </form>
                                                    <!-- end checkout -->
                                                @else
                                                    <div class="max-w-lg mx-auto">

                                                        <div class="flex bg-yellow-100 rounded-lg p-4 mb-4 text-sm text-yellow-700 stop"
                                                            role="alert">
                                                            <svg class="w-5 h-5 inline mr-3" fill="currentColor"
                                                                viewBox="0 0 20 20"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd"
                                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                            <div>
                                                                <span class="font-medium">Método de Pago!</span> Se
                                                                requiere datos de facturación para continuar con el pago
                                                            </div>
                                                        </div>

                                                    </div>
                                                @endif
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    @include('client.componets.footer')


                </div>


            </div>
        </div>
    </main>






</x-app-layout>

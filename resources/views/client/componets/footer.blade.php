<!-- component -->

<footer class="relative  pt-8 pb-6">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap text-left lg:text-left">
            <div class="w-full lg:w-6/12 px-4">
                <h4 class="text-3xl fonat-semibold text-gray-100">ADS Media</h4>
                <h5 class="text-lg mt-0 mb-2 text-gray-200">
                    !Vive el Deporte¡
                </h5>
                <div class="mt-6 lg:mb-0 mb-6">
                    <div class="flex flex-wrap justify-left gap-2">
                        <a href="https://www.facebook.com/adssportstreaming" target="_blank" class="bg-blue-500 p-2 font-semibold text-white inline-flex items-center space-x-2 rounded">
                            <svg class="w-5 h-5 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-6/12 px-4">
                <div class="flex flex-wrap items-top mb-6">
                    <div class="w-full lg:w-4/12 px-4 ml-auto">
                        <span class="block uppercase text-gray-500 text-sm font-semibold mb-2">Navegar</span>
                        <ul class="list-unstyled">



                            <li>
                                <a class="text-gray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                                    href="{{ route('cliente.deportes.index') }}">Deportes</a>
                            </li>
                            <li>
                                <a class="text-gray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                                    href="{{ route('cliente.campeonatos.index') }}">Campeonatos</a>
                            </li>
                            <li>
                                <a class="text-gray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                                    href="{{ route('cliente.videos.index') }}">Transmisiones</a>
                            </li>
                            <li>
                                <a class="text-gray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                                    href="{{ route('cliente.eventos.index') }}">Próximos
                                    Eventos</a>
                            </li>




                        </ul>
                    </div>
                    <div class="w-full lg:w-4/12 px-4">
                        <span class="block uppercase text-gray-500 text-sm font-semibold mb-2">Otros Recursos</span>
                        <ul class="list-unstyled">


                            <li>
                                <a class="text-gray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                                    href="{{ route('cliente.empresa.about') }}" target="_blank">Sobre Nosotros</a>
                            </li>
                            <li>
                                <a class="text-gray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                                    href="{{ route('cliente.empresa.terminos') }}">Condiciones de Uso</a>
                            </li>

                            <li>
                                <a class="text-gray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                                    href="{{ route('cliente.empresa.politicas') }}">Políticas de Privacidad</a>
                            </li>




                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-6 border-blueGray-300">
        <div class="flex flex-wrap items-center md:justify-between justify-center">
            <div class="w-full md:w-4/12 px-4 mx-auto text-center">
                <div class="text-sm text-gray-500 font-semibold py-1">
                    Copyright © <span id="get-current-year">2023</span><a class="text-gray-500hover:text-gray-800"
                        target="_blank"> ADS Media
                        <a href="https://www.creative-tim.com?ref=njs-profile"
                            class="text-gray-500hover:text-blueGray-800"></a>.
                </div>
            </div>
        </div>
    </div>

    <script src="{{ env('TIDIO_CHAT') }}" async></script>
</footer>

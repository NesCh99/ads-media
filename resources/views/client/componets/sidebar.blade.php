<aside class="main-sidebar fixed offcanvas shadow" data-toggle='offcanvas'>
    <div class="sidebar">
        <ul class="sidebar-menu">
            <br>
            <li><a class="ajaxifyPage {{ Route::is('cliente.home') ? 'active' : '' }} lg:display-none"
                    href="{{ route('cliente.home') }}">
                    <i class="icon icon-home s-24"></i> <span>Inicio</span>
                </a>
            <li>
                <br>
            <li><a class="ajaxifyPage {{ Str::contains(request()->path(), ['deportes', 'deporte']) ? 'active' : '' }}"
                    href="{{ route('cliente.deportes.index') }}">
                    <i class="icon icon-futbol-o s-24"></i> <span>Deportes</span>
                </a>
            <li>
                <br>
            <li><a class="ajaxifyPage {{ Str::contains(request()->path(), ['campeonatos', 'campeonato']) ? 'active' : '' }}"
                    href="{{ route('cliente.campeonatos.index') }}">
                    <i class="icon icon-tags s-24"></i> <span>Campeonatos</span>
                </a>
            <li>
                <br>
            <li><a class="ajaxifyPage {{ Str::contains(request()->path(), ['videos', 'video']) ? 'active' : '' }}"
                    href="{{ route('cliente.videos.index') }}">
                    <i class="icon icon-play-circle s-24"></i> <span>Transmisiones</span>
                </a>
            </li>
            <br>
            <li><a
                    class="ajaxifyPage {{ Str::contains(request()->path(), ['eventos', 'evento']) ? 'active' : '' }}"href="{{ route('cliente.eventos.index') }}">
                    <i class="icon icon-calendar-check-o s-24"></i> <span>Eventos</span>
                </a>
            </li>
            <br>
            <li><a class="ajaxifyPage {{ Str::contains(request()->path(), 'suscripcion') ? 'active' : '' }}"
                    href="{{ route('cliente.suscripcion.index') }}">
                    <i class="icon icon-subscript s-24"></i> <span>Mis Suscripciones</span>
                </a>
            </li>
            <br>
            <li><a class="ajaxifyPage {{ Str::contains(request()->path(), 'pago') ? 'active' : '' }}"
                    href="{{ route('cliente.pago.index') }}">
                    <i class="icon icon-paypal s-24"></i> <span>Mis Pagos</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
<!--navbar-->
<nav class="navbar-wrapper shadow">
    <div class="navbar navbar-expand  justify-content-between  bd-navbar">
        <div class="d-flex align-items-center">
            <a href="#" data-toggle="push-menu"
                class="paper-nav-toggle pp-nav-toggle  paper-nav-toggle-sidenav mx-3">
                <i></i>
            </a>
            <a class="navbar-brand d-none d-lg-block" href="{{ route('cliente.home') }}">
                <div class="d-flex align-items-center s-14 l-s-2">
                    <img src="{{ asset('img/logo.png') }}" alt="" width="50px" class="mx-2">
                    <span>ADS SPORTS</span>

                </div>

            </a>

        </div>
        <div class="pagos">
            @livewire('notification-component')
        </div>
        <div class="navbar-custom-menu">
            <div class="sm:flex sm:items-center sm:ml-6">
                <!-- Component Start -->
                


                    
               
                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    @auth
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button
                                        class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-8 w-8 rounded-full object-cover"
                                            src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                            {{ Auth::user()->name }}
                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>
                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="col text-left hover:bg-slate-700" style="padding: 8px">
                                    <a class=" text-white" style="margin-left: 8px ;display:block"
                                        href="{{ route('profile.show') }}">
                                        <small style="margin-right: 1px"><i class="fa-solid fa-user"></i></small>
                                        {{ __('Perfil') }}
                                    </a>
                                </div>
                                @if (Auth::user()->isAdminUser())
                                    <div class="col text-left hover:bg-slate-700 " style="padding: 8px">
                                        <a class=" text-white" style="margin-left: 8px ;display:block"
                                            href="{{ route('admin.home') }}">
                                            <small style="margin-right: 1px"><i class="fa-solid fa-user-group"></i></small>
                                            <small> {{ __('Panel de Administración') }} </small>
                                        </a>
                                    </div>
                                @endif
                                <!-- Authentication -->
                                <div class="col  hover:bg-slate-700 border-solid border-top border-indigo-700">
                                    <form action="{{ route('logout') }}" method="post">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button class="w-full" type="submit" style="padding:5px"> <span
                                                style="margin-left: -57px">

                                                <small><i class="fa-solid fa-right-from-bracket"></i></small>
                                                Cerrar
                                                Sesión</span></button>
                                    </form>
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- end sidebar nav -->

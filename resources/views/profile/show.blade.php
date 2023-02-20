<x-app-layout>

    @include('client.componets.sidebar')


    <main class="page has-sidebar">
        <div class="container-fluid relative animatedParent animateOnce p-0">
            <div class="">
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
                                        <div class="d-md-flex align-items-center justify-content-between">





                                        </div>

                                        <div class="text-white ">

                                            <div class="relative mb-5">
                                                <h1 class="mb-2 text-primary">Hola {{auth()->user()->name}},</h1>
                                                <p> ¡Nos preocupa su seguridad! <br>
                                                    
                                                    
                                                </p>
                                            </div>



                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bottom-gradient "></div>
                </section>
                <!--Banner-->

                <div class="">
                    <!--New Releases-->

                   

                    <main class="page has-sidebar">
                        <div class="container-fluid relative animatedParent animateOnce">
                            <div class=" p-md-5 p-3">
                                
                                <div class="row my-3">
                                    <div class="col-12 col-xl-12">
                                        <div class="card no-b">
                                            <div class="card-header pb-0">
                                                <div class="d-flex justify-content-between">
                                                    <div class="align-self-center">
                                                        <ul class="nav nav-pills mb-3" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active show r-20" id="w3--tab1" data-toggle="tab"
                                                                    href="#w3-tab1" role="tab" aria-controls="tab1"
                                                                    aria-expanded="true" aria-selected="true">Información del Perfil</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link r-20" id="w3--tab2" data-toggle="tab"
                                                                    href="#w3-tab2" role="tab" aria-controls="tab2"
                                                                    aria-selected="false">Seguridad de la cuenta</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link r-20" id="w3--tab3" data-toggle="tab"
                                                                    href="#w3-tab3" role="tab" aria-controls="tab3"
                                                                    aria-selected="false">Gestión de la Cuenta</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    
                
                                                </div>
                                            </div>
                                            <div class="card-body no-p">
                                                <div class="tab-content">
                                                    <div class="tab-pane fade show active" id="w3-tab1" role="tabpanel"
                                                        aria-labelledby="w3-tab1">
                                                        <div class="table-responsive">
                                                            <x-slot name="header">
                                                                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                                                    {{ __('Profile') }}
                                                                </h2>
                                                            </x-slot>
                
                                                            <div>
                                                                <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                                                                    @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                                                                        @livewire('profile.update-profile-information-form')
                
                                                                       
                                                                    @endif
                
                
                
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade text-center p-5" id="w3-tab2" role="tabpanel"
                                                        aria-labelledby="w3-tab2">
                                                     
                
                                                        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                                                            <div class="mt-10 sm:mt-0">
                                                                @livewire('profile.update-password-form')
                                                            </div>
                
                                                           
                                                        @endif
                
                                                        
                
                                                    </div>
                                                    <div class="tab-pane fade text-center p-5" id="w3-tab3" role="tabpanel"
                                                        aria-labelledby="w3-tab3">
                
                
                                                        <div class="mt-10 sm:mt-0">
                                                            @livewire('profile.logout-other-browser-sessions-form')
                                                        </div>
                
                                                        @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                                                           
                
                                                            <div class="mt-10 sm:mt-0">
                                                                @livewire('profile.delete-user-form')
                                                            </div>
                                                        @endif
                
                                                    </div>
                                                </div>
                
                                            </div>
                                        </div>

                                        @include('client.componets.footer')
                                    </div>
                
                
                                </div>
                
                
                            </div>
                
                    </main>





                </div>

            </div>
        </div>
    </main>



   




</x-app-layout>

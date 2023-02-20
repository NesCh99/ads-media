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
                                        <div class="d-md-flex align-items-center justify-content-between">





                                            <div class="ml-auto mb-2">
                                                <div class="share">
                                                    <!-- AddToAny BEGIN -->
                                                    <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                                        <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                                                        <a class="a2a_button_facebook"></a>
                                                        <a class="a2a_button_twitter"></a>
                                                        <a class="a2a_button_email"></a>
                                                        <a class="a2a_button_whatsapp"></a>
                                                        <a class="a2a_button_facebook_messenger"></a>
                                                    </div>
                                                    <span style="color: #FCFCFC;padding-left:5px;padding-right:5px">Comparte si te ha gustado</span>
                                                    <script async src="https://static.addtoany.com/menu/page.js"></script>
                                                    <!-- AddToAny END -->
                                                </div>
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

                    @livewire('video-index')







                </div>

            </div>
        </div>
        
    </main>


</x-app-layout>



<x-app-layout>
    @include('client.componets.sidebar')
    <!--Page Content-->
    <main class="page has-sidebar">
        <div class="container-fluid relative animatedParent animateOnce no-p">
            <div class="animated fadeInUpShort">
                @include('client.componets.slider')
                <div class="wrapper p-md-5 p-3  ">
                    @include('client.componets.new-release')
                    @include('client.componets.videos')
                    @include('client.componets.campeonatos')
                </div>
            </div>
        </div>

        @include('client.componets.footer')
    </main>
    <!--Page Content-->

    
</x-app-layout>


<x-app-layout>
    @include('client.componets.sidebar')
    <!--Page Content-->
    <main class="page has-sidebar">
        <div class=" relative pt-40 pb-20 lg:pt-44 dark:bg-gray-900">
            <div class="relative xl:container m-auto px-6 md:px-12 lg:px-6">
                <h1 class="sm:mx-auto sm:w-10/12 md:w-2/3 font-black text-blue-900 text-4xl text-center sm:text-5xl md:text-6xl lg:w-auto lg:text-left xl:text-7xl dark:text-white">Condiciones de Uso<br class="lg:block hidden"> <span class="relative text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500 dark:from-blue-400 dark:to-cyan-300">ADS SPORTS</span>.</h1>
                <div class="lg:flex">
                    <div class="relative mt-8 md:mt-16 space-y-8 sm:w-10/12   sm:mx-auto text-center lg:text-left lg:mr-auto">
                        <p class="sm:text-lg text-gray-700 dark:text-gray-300 lg:w-11/12 text-justify">
                           {!!$term->body!!}
                        </p>

                        

                       
                       
                       
                        
                    </div>
                    
                </div>
            </div>
        </div>
 <br>
 <br>
 <br>
 <br>
 <br>
        @include('client.componets.footer')
    </main>

    <style>
        p {
            text-align: justify;
        }
        ol {
            text-align: justify !important;
            list-style:circle ;
             
             
        }

        ol li {
            margin-bottom: 5px!important;
        }

        td{
            text-align: justify;
            border-color: 1px solid #98A8B0 !important
           
        }

        blockquote{
            padding: 5px;
            border: 1px solid #9C9D96;
        }
    </style>


    <!--Page Content-->

    
</x-app-layout>

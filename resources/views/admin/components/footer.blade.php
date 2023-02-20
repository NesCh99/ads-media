<footer class="relative bg-blueGray-200 pt-8 pb-6" style="margin-top: 50px">
    <div class="container mx-auto px-4">
      <div class="flex flex-wrap text-left lg:text-left">
        <div class="w-full lg:w-6/12 px-4">
          <h4 class="text-3xl fonat-semibold text-blueGray-700">ADS SPORTS</h4>
          <h5 class="text-lg mt-0 mb-2 text-blueGray-600">
            !Vive el Deporte¡
          </h5>
          <div class="mt-6 lg:mb-0 mb-6">
            <button class="bg-white text-lightBlue-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
              <i class="fab fa-twitter"></i></button><button class="bg-white text-lightBlue-600 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
              <i class="fab fa-facebook-square"></i></button><button class="bg-white text-pink-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
              <i class="fab fa-dribbble"></i></button><button class="bg-white text-blueGray-800 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
              <i class="fab fa-github"></i>
            </button>
          </div>
        </div>
        <div class="w-full lg:w-6/12 px-4">
          <div class="flex flex-wrap items-top mb-6">
            <div class="w-full lg:w-4/12 px-4 ml-auto">
              <span class="block uppercase text-blueGray-500 text-sm font-semibold mb-2">Navegar en el cliente</span>
              <ul class="list-unstyled">

                <li>
                    <a class="text-gray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                    href="{{ route('cliente.home') }}"  target="_blank" >Inicio</a>
                </li>



                <li>
                    <a class="text-gray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                        href="{{route('cliente.deportes.index')}}" target="_blank" >Deportes</a>
                </li>
                <li>
                    <a class="text-gray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                    href="{{route('cliente.campeonatos.index')}}" target="_blank" >Campeonatos</a>
                </li>
                <li>
                    <a class="text-gray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                    href="{{route('cliente.videos.index')}}" target="_blank" >Transmiciones</a>
                </li>
                <li>
                    <a class="text-gray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                    href="{{route('cliente.eventos.index')}}" target="_blank" >Próximos
                        Eventos</a>
                </li>

              </ul>
            </div>
            <div class="w-full lg:w-4/12 px-4">
              <span class="block uppercase text-blueGray-500 text-sm font-semibold mb-2">Otros Recursos</span>
              <ul class="list-unstyled">


                <li>
                    <a class="text-gray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                        href="{{route('cliente.empresa.about')}}" target="_blank" >Sobre Nosotros</a>
                </li>
                <li>
                    <a class="text-gray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm"
                        href="{{route('cliente.empresa.terminos')}}" target="_blank" >Términos &amp; Condiciones</a>
                </li>
               



              </ul>
            </div>
          </div>
        </div>
      </div>
      <hr class="my-6 border-blueGray-300">
      <div class="flex flex-wrap items-center md:justify-between justify-center">
        <div class="w-full md:w-4/12 px-4 mx-auto text-center">
          <div class="text-sm text-blueGray-500 font-semibold py-1">
            Copyright © <span id="get-current-year">2022</span><a href="#" class="text-blueGray-500 hover:text-gray-800" target="_blank"> ADS SPORTS
            
          </div>
        </div>
      </div>
    </div>
  </footer>


  <style>




/*!tailwindcss v2.0.4 | MIT License | https://tailwindcss.com*/
/*!modern-normalize v1.1.0 | MIT License | https://github.com/sindresorhus/modern-normalize*/
*,
::before,
::after {
    box-sizing: border-box
}



hr {
    height: 0;
    color: inherit
}

button {
    font-family: inherit;
    font-size: 100%;
    line-height: 1.15;
    margin: 0
}

button {
    text-transform: none
}

button,
[type=button] {
    -webkit-appearance: button
}


h4,
h5,
hr {
    margin: 0
}

button {
    background-color: transparent;
    background-image: none
}

button:focus {
    outline: 1px dotted;
    outline: 5px auto -webkit-focus-ring-color
}


ul {
    list-style: none;
    margin: 0;
    padding: 0
}

ol {
    list-style: none;
    margin: 0;
    padding: 0
}



*,
::before,
::after {
    box-sizing: border-box;
    border-width: 0;
    border-style: solid;
    border-color: #e4e4e7
}

hr {
    border-top-width: 1px
}

button {
    cursor: pointer
}


h4,
h5 {
    font-size: inherit;
    font-weight: inherit
}

a {
    color: inherit;
    text-decoration: inherit
}




a {
    color: inherit;
    text-decoration: inherit
}


svg {
    display: block;
    vertical-align: middle
}

.border-gray-200 {
    --tw-border-opacity: 1;
    border-color: rgba(228, 228, 231, var(--tw-border-opacity))
}

.rounded-lg {
    border-radius: .5rem
}

.border {
    border-width: 1px
}

.inline-flex {
    display: inline-flex
}



.ml-1 {
    margin-left: .25rem
}

.ml-2 {
    margin-left: .5rem
}


button {
    padding: 0;
    line-height: inherit;
    color: inherit
}

.container {
    width: 100%
}

@media(min-width:640px) {
    .container {
        max-width: 640px
    }
}

@media(min-width:768px) {
    .container {
        max-width: 768px
    }
}

@media(min-width:1024px) {
    .container {
        max-width: 1024px
    }
}

@media(min-width:1280px) {
    .container {
        max-width: 1280px
    }
}

@media(min-width:1536px) {
    .container {
        max-width: 1536px
    }
}

@media(min-width:640px) {
    .container {
        max-width: 640px
    }
}

@media(min-width:768px) {
    .container {
        max-width: 768px
    }
}

@media(min-width:1024px) {
    .container {
        max-width: 1024px
    }
}

@media(min-width:1280px) {
    .container {
        max-width: 1280px
    }
}

@media(min-width:1536px) {
    .container {
        max-width: 1536px
    }
}

@media(min-width:640px) {
    .container {
        max-width: 640px
    }
}

@media(min-width:768px) {
    .container {
        max-width: 768px
    }
}

@media(min-width:1024px) {
    .container {
        max-width: 1024px
    }
}

@media(min-width:1280px) {
    .container {
        max-width: 1280px
    }
}

@media(min-width:1536px) {
    .container {
        max-width: 1536px
    }
}

@media(min-width:640px) {
    .container {
        max-width: 640px
    }
}

@media(min-width:768px) {
    .container {
        max-width: 768px
    }
}

@media(min-width:1024px) {
    .container {
        max-width: 1024px
    }
}

@media(min-width:1280px) {
    .container {
        max-width: 1280px
    }
}

@media(min-width:1536px) {
    .container {
        max-width: 1536px
    }
}

@media(min-width:640px) {
    .container {
        max-width: 640px
    }
}

@media(min-width:768px) {
    .container {
        max-width: 768px
    }
}

@media(min-width:1024px) {
    .container {
        max-width: 1024px
    }
}

@media(min-width:1280px) {
    .container {
        max-width: 1280px
    }
}

@media(min-width:1536px) {
    .container {
        max-width: 1536px
    }
}

@media(min-width:640px) {
    .container {
        max-width: 640px
    }
}

@media(min-width:768px) {
    .container {
        max-width: 768px
    }
}

@media(min-width:1024px) {
    .container {
        max-width: 1024px
    }
}

@media(min-width:1280px) {
    .container {
        max-width: 1280px
    }
}

@media(min-width:1536px) {
    .container {
        max-width: 1536px
    }
}

@media(min-width:640px) {
    .container {
        max-width: 640px
    }
}

@media(min-width:768px) {
    .container {
        max-width: 768px
    }
}

@media(min-width:1024px) {
    .container {
        max-width: 1024px
    }
}

@media(min-width:1280px) {
    .container {
        max-width: 1280px
    }
}

@media(min-width:1536px) {
    .container {
        max-width: 1536px
    }
}

@media(min-width:640px) {
    .container {
        max-width: 640px
    }
}

@media(min-width:768px) {
    .container {
        max-width: 768px
    }
}

@media(min-width:1024px) {
    .container {
        max-width: 1024px
    }
}

@media(min-width:1280px) {
    .container {
        max-width: 1280px
    }
}

@media(min-width:1536px) {
    .container {
        max-width: 1536px
    }
}

@media(min-width:640px) {
    .container {
        max-width: 640px
    }
}

@media(min-width:768px) {
    .container {
        max-width: 768px
    }
}

@media(min-width:1024px) {
    .container {
        max-width: 1024px
    }
}

@media(min-width:1280px) {
    .container {
        max-width: 1280px
    }
}

@media(min-width:1536px) {
    .container {
        max-width: 1536px
    }
}

@media(min-width:640px) {
    .container {
        max-width: 640px
    }
}

@media(min-width:768px) {
    .container {
        max-width: 768px
    }
}

@media(min-width:1024px) {
    .container {
        max-width: 1024px
    }
}

@media(min-width:1280px) {
    .container {
        max-width: 1280px
    }
}

@media(min-width:1536px) {
    .container {
        max-width: 1536px
    }
}

@media(min-width:640px) {
    .container {
        max-width: 640px
    }
}

@media(min-width:768px) {
    .container {
        max-width: 768px
    }
}

@media(min-width:1024px) {
    .container {
        max-width: 1024px
    }
}

@media(min-width:1280px) {
    .container {
        max-width: 1280px
    }
}

@media(min-width:1536px) {
    .container {
        max-width: 1536px
    }
}

@media(min-width:640px) {
    .container {
        max-width: 640px
    }
}

@media(min-width:768px) {
    .container {
        max-width: 768px
    }
}

@media(min-width:1024px) {
    .container {
        max-width: 1024px
    }
}

@media(min-width:1280px) {
    .container {
        max-width: 1280px
    }
}

@media(min-width:1536px) {
    .container {
        max-width: 1536px
    }
}

.container {
    width: 100%
}

@media(min-width:640px) {
    .container {
        max-width: 640px
    }
}

@media(min-width:768px) {
    .container {
        max-width: 768px
    }
}

@media(min-width:1024px) {
    .container {
        max-width: 1024px
    }
}

@media(min-width:1280px) {
    .container {
        max-width: 1280px
    }
}

@media(min-width:1536px) {
    .container {
        max-width: 1280px
    }
}

.bg-white {
    --tw-bg-opacity: 1;
    background-color: rgba(255, 255, 255, var(--tw-bg-opacity))
}

.bg-blueGray-200 {
    --tw-bg-opacity: 1;
    background-color: rgba(226, 232, 240, var(--tw-bg-opacity))
}

.border-blueGray-300 {
    --tw-border-opacity: 1;
    border-color: rgba(203, 213, 225, var(--tw-border-opacity))
}

.rounded-full {
    border-radius: 9999px
}

.block {
    display: block
}

.flex {
    display: flex
}

.flex-wrap {
    flex-wrap: wrap
}

.items-center {
    align-items: center
}

.justify-center {
    justify-content: center
}

.justify-between {
    justify-content: space-between
}

.font-normal {
    font-weight: 400
}

.font-semibold {
    font-weight: 600
}

.h-10 {
    height: 2.5rem
}

.text-sm {
    font-size: .875rem;
    line-height: 1.25rem
}

.text-lg {
    font-size: 1.125rem;
    line-height: 1.75rem
}

.text-3xl {
    font-size: 1.875rem;
    line-height: 2.25rem
}

.my-6 {
    margin-top: 1.5rem;
    margin-bottom: 1.5rem
}

.mx-auto {
    margin-left: auto;
    margin-right: auto
}

.mt-0 {
    margin-top: 0
}

.mb-0 {
    margin-bottom: 0
}

.mr-2 {
    margin-right: .5rem
}

.mb-2 {
    margin-bottom: .5rem
}

.mt-6 {
    margin-top: 1.5rem
}

.mb-6 {
    margin-bottom: 1.5rem
}

.ml-auto {
    margin-left: auto
}

.outline-none {
    outline: 2px solid transparent;
    outline-offset: 2px
}

.py-1 {
    padding-top: .25rem;
    padding-bottom: .25rem
}

.px-4 {
    padding-left: 1rem;
    padding-right: 1rem
}

.pb-2 {
    padding-bottom: .5rem
}

.pb-6 {
    padding-bottom: 1.5rem
}

.pt-8 {
    padding-top: 2rem
}

.relative {
    position: relative
}

* {
    --tw-shadow: 0 0 #0000
}

.shadow-lg {
    --tw-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)
}

* {
    --tw-ring-inset: var(--tw-empty,
            /*!*/
            /*!*/
        );
    --tw-ring-offset-width: 0px;
    --tw-ring-offset-color: #fff;
    --tw-ring-color: rgba(59, 130, 246, 0.5);
    --tw-ring-offset-shadow: 0 0 #0000;
    --tw-ring-shadow: 0 0 #0000
}

.text-left {
    text-align: left
}

.text-center {
    text-align: center
}

.text-pink-400 {
    --tw-text-opacity: 1;
    color: rgba(244, 114, 182, var(--tw-text-opacity))
}

.text-lightBlue-400 {
    --tw-text-opacity: 1;
    color: rgba(56, 189, 248, var(--tw-text-opacity))
}

.text-lightBlue-600 {
    --tw-text-opacity: 1;
    color: rgba(2, 132, 199, var(--tw-text-opacity))
}

.text-blueGray-500 {
    --tw-text-opacity: 1;
    color: rgba(100, 116, 139, var(--tw-text-opacity))
}

.text-blueGray-600 {
    --tw-text-opacity: 1;
    color: rgba(71, 85, 105, var(--tw-text-opacity))
}

.text-blueGray-700 {
    --tw-text-opacity: 1;
    color: rgba(51, 65, 85, var(--tw-text-opacity))
}

.text-blueGray-800 {
    --tw-text-opacity: 1;
    color: rgba(30, 41, 59, var(--tw-text-opacity))
}

.uppercase {
    text-transform: uppercase
}

.w-10 {
    width: 2.5rem
}

.w-full {
    width: 100%
}




.text-gray-500 {
    --tw-text-opacity: 1;
    color: rgba(113, 113, 122, var(--tw-text-opacity))
}

.text-gray-700 {
    --tw-text-opacity: 1;
    color: rgba(63, 63, 70, var(--tw-text-opacity))
}

.text-gray-900 {
    --tw-text-opacity: 1;
    color: rgba(24, 24, 27, var(--tw-text-opacity))
}


@-webkit-keyframes spin {
    to {
        transform: rotate(360deg)
    }
}

@keyframes spin {
    to {
        transform: rotate(360deg)
    }
}

@-webkit-keyframes ping {

    75%,
    100% {
        transform: scale(2);
        opacity: 0
    }
}

@keyframes ping {

    75%,
    100% {
        transform: scale(2);
        opacity: 0
    }
}

@-webkit-keyframes pulse {
    50% {
        opacity: .5
    }
}

@keyframes pulse {
    50% {
        opacity: .5
    }
}

@-webkit-keyframes bounce {

    0%,
    100% {
        transform: translateY(-25%);
        -webkit-animation-timing-function: cubic-bezier(.8, 0, 1, 1);
        animation-timing-function: cubic-bezier(.8, 0, 1, 1)
    }

    50% {
        transform: none;
        -webkit-animation-timing-function: cubic-bezier(0, 0, .2, 1);
        animation-timing-function: cubic-bezier(0, 0, .2, 1)
    }
}

@keyframes bounce {

    0%,
    100% {
        transform: translateY(-25%);
        -webkit-animation-timing-function: cubic-bezier(.8, 0, 1, 1);
        animation-timing-function: cubic-bezier(.8, 0, 1, 1)
    }

    50% {
        transform: none;
        -webkit-animation-timing-function: cubic-bezier(0, 0, .2, 1);
        animation-timing-function: cubic-bezier(0, 0, .2, 1)
    }
}

@media(min-width:1024px) {
    .lg\:bg-opacity-0 {
        --tw-bg-opacity: 0
    }

    .lg\:block {
        display: block
    }

    .lg\:inline-block {
        display: inline-block
    }

    .lg\:flex {
        display: flex
    }

    .lg\:hidden {
        display: none
    }

    .lg\:flex-row {
        flex-direction: row
    }

    .lg\:self-center {
        align-self: center
    }

    .lg\:justify-start {
        justify-content: flex-start
    }

    .lg\:order-1 {
        order: 1
    }

    .lg\:order-2 {
        order: 2
    }

    .lg\:order-3 {
        order: 3
    }

    .lg\:mb-0 {
        margin-bottom: 0
    }

    .lg\:mr-1 {
        margin-right: .25rem
    }

    .lg\:mr-4 {
        margin-right: 1rem
    }

    .lg\:mt-16 {
        margin-top: 4rem
    }

    .lg\:ml-auto {
        margin-left: auto
    }

    .lg\:-ml-16 {
        margin-left: -4rem
    }

    .lg\:-mt-64 {
        margin-top: -16rem
    }

    .lg\:p-10 {
        padding: 2.5rem
    }

    .lg\:py-2 {
        padding-top: .5rem;
        padding-bottom: .5rem
    }

    .lg\:px-10 {
        padding-left: 2.5rem;
        padding-right: 2.5rem
    }

    .lg\:pt-0 {
        padding-top: 0
    }

    .lg\:pt-4 {
        padding-top: 1rem
    }

    .lg\:pt-12 {
        padding-top: 3rem
    }

    .lg\:pt-24 {
        padding-top: 6rem
    }

    .lg\:pb-64 {
        padding-bottom: 16rem
    }

    .lg\:static {
        position: static
    }

    .lg\:shadow-none {
        --tw-shadow: 0 0 #0000;
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)
    }

    .lg\:text-left {
        text-align: left
    }

    .lg\:text-right {
        text-align: right
    }

    .lg\:text-white {
        --tw-text-opacity: 1;
        color: rgba(255, 255, 255, var(--tw-text-opacity))
    }

    .lg\:text-blueGray-200 {
        --tw-text-opacity: 1;
        color: rgba(226, 232, 240, var(--tw-text-opacity))
    }

    .lg\:hover\:text-blueGray-200:hover {
        --tw-text-opacity: 1;
        color: rgba(226, 232, 240, var(--tw-text-opacity))
    }

    .lg\:w-auto {
        width: auto
    }

    .lg\:w-3\/12 {
        width: 25%
    }

    .lg\:w-4\/12 {
        width: 33.333333%
    }

    .lg\:w-6\/12 {
        width: 50%
    }

    .lg\:w-8\/12 {
        width: 66.666667%
    }

    .lg\:w-9\/12 {
        width: 75%
    }
}

@media(min-width:1280px) {
    .xl\:mb-0 {
        margin-bottom: 0
    }

    .xl\:w-3\/12 {
        width: 25%
    }

    .xl\:w-4\/12 {
        width: 33.333333%
    }

    .xl\:w-6\/12 {
        width: 50%
    }

    .xl\:w-8\/12 {
        width: 66.666667%
    }
}

@media(min-width:1536px) {}




  </style>
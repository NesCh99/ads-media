<div>

    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="relative flex items-center justify-center rounded-full w-[40px] h-[40px] transform transition-all bg-slate-700 ring-0 ring-gray-300 hover:ring-4 group-focus:ring-4 ring-opacity-30 duration-200 shadow-md">
        <i class="fa-solid fa-bell"></i>
        
    </button>





    <!-- Dropdown menu -->
    <div id="dropdownNavbar"
        class="hidden dark:bg-slate-800 text-base z-10 list-none divide-y divide-gray-500 rounded shadow  w-52  h-96 overflow-x-auto">
        <div class="px-3 py-2">
            <span class="block text-sm">Lista de Notificaciones</span>
           
        </div>

        <ul class="py-1 " aria-labelledby="dropdownLargeButton">
            @foreach ($notifications as $notification)
            <li>
                <div class="p-2 flex dark:bg-slate-800  hover:bg-slate-900 cursor-pointer border-b border-gray-500" style="">


                    <div class="flex-auto text-sm w-32">
                        <div class="font-bold">{{ $notification->data['message'] }}</div>
             
                        <div class="dark:text-slate-400 ">{{ \FormatTime::LongTimeFilter($notification->created_at) }}</div>
                    </div>
                    <div class="flex flex-col w-18 font-medium items-end">
                        <div class="w-4 h-4 mb-6 hover:bg-red-200 rounded-full cursor-pointer text-red-700" wire:click="delete('{{$notification->id}}')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-trash-2 ">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path
                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                </path>
                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                <line x1="14" y1="11" x2="14" y2="17"></line>
                            </svg>
                        </div>
                       <div class="text-slate-900 dark:text-white">  ${{ $notification->data['mount'] }} <small>    USD</small></div>  
                    </div>
                </div>
            </li>

            @endforeach


        </ul>

    </div>
       
 


   

    <script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
</div>

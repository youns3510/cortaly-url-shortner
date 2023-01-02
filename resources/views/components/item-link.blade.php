{{-- @props(['name','count','show','edit','delete']) --}}
<div {{$attributes->merge([ "class"=>"shadow-lg my-2"])}}>

    <a
        class="py-3 cursor-pointer  inline-flex rounded-md bg-white text-[0.8125rem] font-medium leading-5 text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-gray-800 hover:text-white transition duration-300 ease-in-out w-full capitalize">
        <div class="flex py-2 px-5 w-3/4">
            <svg class="mr-2.5 h-5 w-5 flex-none " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M6.429 9.75L2.25 12l4.179 2.25m0-4.5l5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0l4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0l-5.571 3-5.571-3" />
            </svg>
            {{$name}}
        </div>
        <div class="border-l border-slate-400/20 py-2 text-center  w-1/4">
            {{$count}}
        </div>
    </a>
    <div class="relative">

        {{ $slot }}
    </div>




</div>
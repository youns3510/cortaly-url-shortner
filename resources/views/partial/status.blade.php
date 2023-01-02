{{-- for success,string error,other messages --}}
@if (session('status'))
<div x-data x-ref="status_msg" x-transition class="alert alert-{{session('status')}} relative">
    <div x-data="{success:'bg-green-100 text-green-700',error:'bg-red-100 text-red-700'}"
        :class="{{in_array(session('status'),['success','error']) ? session('status') :'bg-gray-300 text-gray-800'}}"
        class="rounded-lg py-5 px-6 mb-4 text-base" role="alert">
        {{session('status-msg')}}
    </div>
    <button @click="$refs.status_msg.remove()"
        class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50  hover:text-black hover:opacity-100  absolute top-0 right-1">X</button>
</div>
@endif

{{-- for array of Errors --}}
@if ($errors->any())
<div x-data x-ref="status_msg" x-transition class="alert alert-danger relative">
    <div x-data class="bg-red-100 text-red-700 rounded-lg py-5 px-6 mb-4 text-base" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach

        </ul>
    </div>

    <button @click="$refs.status_msg.remove()"
        class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50  hover:text-black hover:opacity-100  absolute top-0 right-1">X</button>
</div>
@endif



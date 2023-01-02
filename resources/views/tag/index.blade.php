@pushOnce('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('fire_model', {
            id : '',
            name : '',
            show_model:false,
            updateItem:function(id,name){
                this.id = id;
                this.name = name;
                this.show_model = !this.show_model;
            },

        })

        
    });  
</script>
@endpushOnce
<x-app-layout>
    <x-slot:title>
        All Tags
      </x-slot:title>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Tags') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="grid grid-cols-1  mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @include('partial.status')
                <form method="post" action="{{ route('tag.store') }}" class="mt-6 space-y-6"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div>
                        <x-input-label for="name" class="sm:text-lg" :value="__('Tag Name')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full max-w-xl" />

                    </div>
                    <div class="flex items-center gap-4">
                        <x-primary-button>
                            {{ __('Save') }}
                        </x-primary-button>
                    </div>
                </form>


            </div>




            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg font-bold   font-mono">
                <div
                    class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-4  gap-2 justify-between   text-white text-sm leading-6 relative z-30">

                    @forelse ($tags as $tag )

                    <div x-data="{ tooltip_{{$tag->id}}: false }"
                        @click="tooltip_{{$tag->id}} = ! tooltip_{{$tag->id}}"
                        x-on:mouseover="tooltip_{{$tag->id}} = true"
                        x-on:mouseleave="tooltip_{{$tag->id}} = false" class="relative">
                        @include('partial.item-list',['tag_or_category'=>'tag'])

                    </div>



                    @empty

                    <h4 class="text-lg text-center text-gray-800">No Tags Here.</h4>
                    @endforelse
                    @include('partial.update-modal',['tag_or_category'=>'tag'])

                </div>
            </div>

        </div>
    </div>



</x-app-layout>
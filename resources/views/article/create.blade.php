@include('partial.editor')
<x-app-layout>
    <x-slot:title>
        Create Aritcle
    </x-slot:title>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Aritcle') }}
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="max-w-6xl mx-auto   sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @include('partial.status')

                <form method="post" action="{{ route('article.store') }}" class="mt-6 space-y-6"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div>
                        <x-input-label for="title" :value="__('Title')" class="text-lg" />
                        <x-text-input id="title" required name="title" type="text" class="mt-1 block w-full" />
                    </div>

                    <div>
                        <x-input-label for="category" :value="__('Category')" class="text-lg" />
                        <x-select id="category" required name="category" class="mt-1 block w-full">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </x-select>
                    </div>


                    <div>
                        <x-input-label for="tags" :value="__('Tags')" class="text-lg" />
                        <x-select id="tags" required name="tags[]" size="3" multiple
                            class="form-multiselect block w-full mt-1">
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </x-select>
                    </div>




                    <x-input-label for="body" :value="__('Body')" class="text-lg" />
                    <x-text-area id="editor" required name="body" rows="10" class="mt-1 block w-full" />


                    <x-input-label for="thumbnail" :value="__('Thumbnail')" class="text-lg" />
                    <x-file-input name="thumbnail" required />


                    <x-primary-button class="text-lg">{{ __('Save') }}</x-primary-button>

                </form>






            </div>



        </div>
    </div>
</x-app-layout>

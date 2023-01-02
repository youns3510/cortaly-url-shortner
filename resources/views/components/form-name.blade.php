<form method="post" action="{{ route('category.store') }}" class="mt-6 space-y-6"
enctype="multipart/form-data">
@csrf
@method('POST')

<div>
    <x-input-label for="name" class="sm:text-lg" :value="__('Category Name')" />
    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full max-w-xl" />

</div>
<div class="flex items-center gap-4">
    <x-primary-button>
        {{ __('Save') }}
    </x-primary-button>
</div>
</form>
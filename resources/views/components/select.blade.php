<select {{ $attributes->merge(['class' => "mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3
    shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"])}}>
    {{ $slot }}
</select>
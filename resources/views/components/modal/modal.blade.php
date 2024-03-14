<div x-cloak {{ $attributes->merge(['class' => 'bg-black bg-opacity-80 fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full']) }} x-transition:enter="animate__animated animate__fadeIn" x-transition:leave="animate__animated animate__fadeOut">
    {{$slot}}
</div>
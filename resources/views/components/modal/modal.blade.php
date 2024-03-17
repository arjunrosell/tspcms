{{-- <div {{ $attributes->merge(['class' => 'bg-black bg-opacity-80 fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full']) }} x-transition:enter="animate__animated animate__fadeIn" x-transition:leave="animate__animated animate__fadeOut">
    {{$slot}}
</div> --}}
@props(['name'])
<div x-data="{
    show: false,
    name: '{{ $name }}',
    init() {
        this.$watch('showEdit', value => {
            if (value) {
                document.body.style.overflowY = 'hidden';
            } else {
                document.body.style.overflowY = 'auto';
            }
        })
    }
}" x-show="show"
    x-on:open-modal.window = "console.log($event.detail); show = ($event.detail[0].name === name)"
    x-on:close-modal.window = "show = false" x-on:keydown.escape.window = 'show = false' x-cloak
    {{ $attributes->merge(['class' => 'bg-black bg-opacity-80 fixed top-0 right-0 left-0 bottom-0 z-50 flex justify-center items-center w-full md:inset-0']) }}
    x-transition>
    <div class="">
        {{ $slot }}
    </div>
</div>

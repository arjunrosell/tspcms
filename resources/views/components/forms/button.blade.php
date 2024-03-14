<div>
    <button {{ $attributes->merge(['class' => 'px-3 py-2']) }}>
        {{ $slot }}
    </button>
</div>
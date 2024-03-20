@props(['style' => 'primary'])

<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-outline-'.$style.' btn-block font-weight-bold']) }}>
    {{ $slot }}
</button>
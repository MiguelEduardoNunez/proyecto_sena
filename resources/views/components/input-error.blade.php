@props(['messages'])

@if($messages)
    <p {{ $attributes->merge(['class' => 'text-danger']) }}>
        @foreach ((array) $messages as $message)
            {{ $message }}
        @endforeach
    </p> 
@endif

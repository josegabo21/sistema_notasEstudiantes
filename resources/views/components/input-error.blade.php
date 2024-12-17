@props(['messages'])

@if ($messages)
<<<<<<< HEAD
    <div {{ $attributes->merge(['class' => 'text-sm text-red-600 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <p>¡Error! usuario o contresaña incorrectos</p>
        @endforeach
</div>
@endif
=======
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
>>>>>>> 6502411f574ce143f3c13b69ac4e753493e4531a

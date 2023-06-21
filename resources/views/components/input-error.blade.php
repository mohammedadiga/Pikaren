@props(['messages'])

@if ($messages)
        @foreach ((array) $messages as $message)
            <div>{{ $message }}</div>
        @endforeach
@endif

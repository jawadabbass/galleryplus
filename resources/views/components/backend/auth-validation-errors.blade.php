@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="text-info lead">
            {{ __('Whoops! Something went wrong.') }}
        </div>

        <ul class="mt-3 list-unstyled text-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

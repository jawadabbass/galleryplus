@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'lead text-success']) }}>
        {{ $status }}
    </div>
@endif

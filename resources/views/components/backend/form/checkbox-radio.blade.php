@props(['id', 'labelValue'])
<div class="icheck-primary">
    <input {!! $attributes !!}>
    <x-backend.form.label for="{{ $id }}" :value="$labelValue" />
</div>

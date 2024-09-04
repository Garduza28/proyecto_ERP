<div>
    <label for="{{ $id }}" class="form-label">{{ $label ?? '' }}</label>
    <input value="{{ $value ?? '' }}" type="{{ $type ?? 'text' }}" name="{{ $name ?? $id }}"
        class="rounded-0 form-control {{ $classes ?? '' }}" id="{{ $id }}"
        placeholder="{{ $placeholder ?? '' }}">

</div>


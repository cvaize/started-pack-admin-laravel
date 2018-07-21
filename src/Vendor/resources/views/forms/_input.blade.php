<div class="form-group  {{ $errors->has($name) ? ' has-danger' : '' }} {{ $formClass ?? null }}">
    @isset($label)
    <label class="form-control-label"
           for="input_{{ $type  ?? 'text'
     }}_{{ (str_slug($name)) }}"> {!!  $label !!} </label>
    @endisset
    {{ Form::input(
    $type ?? 'text',
    $name,
    old($name) ?? ($value ?? null),
    [
    'required'=>(isset($required) ? true : null),
    'autofocus'=>(isset($autofocus) ? true : null),
    'id'=>'input_'.($type ?? 'text').'_'.str_slug($name),
    'class'=>'form-control '
    .($errors->has($name) ? ' is-invalid ' : '')
    .($class ?? ''),
    'placeholder'=>($placeholder ?? null),
    'autocomplete'=>($autocomplete ?? 'on'),
    'data-value'=>($value ?? null),
    ]+($attributes ?? [])
    ) }}

        @if(isset($feedback) || $errors->has($name) === true)
    <div class="invalid-feedback">{{ $feedback ?? $errors->first($name) }}</div>
        @endif

        @isset($text)
    <small class="form-text text-muted"> {!! $text !!}</small>
            @endisset
</div>

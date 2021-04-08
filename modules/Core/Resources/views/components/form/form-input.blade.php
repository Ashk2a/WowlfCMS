<div class="@if($type === 'hidden') d-none @else form-group @endif">
    <x-form-label :label="$label" :required="$required" :for="$attributes->get('id') ?: $id()" />

    <div class="input-group">
        @isset($prepend)
            <div class="input-group-prepend">
                <div class="input-group-text">
                    {!! $prepend !!}
                </div>
            </div>
        @endisset

        <input {!! $attributes->merge(['class' => 'form-control ' . ($hasError($name) ? 'is-invalid' : '')]) !!}
            type="{{ $type }}"

            @if($isWired())
                wire:model{!! $wireModifier() !!}="{{ $name }}"
            @else
                name="{{ $name }}"

               @if($value !== '')
                value="{{ $value }}"
               @endif
            @endif

            @if($required)
                required
            @endif

            @if($label && !$attributes->get('id'))
                id="{{ $id() }}"
            @endif
        />

        @isset($append)
            <div class="input-group-append">
                <div class="input-group-text">
                    {!! $append !!}
                </div>
            </div>
        @endisset

        @if($hasErrorAndShow($name))
            <x-form-errors :name="$name" />
        @endif
    </div>

    {!! $help ?? null !!}
</div>

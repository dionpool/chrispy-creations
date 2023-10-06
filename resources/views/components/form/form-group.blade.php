@props(['type' => 'text', 'name', 'label', 'placeholder'])

<div class="form-group">
    <x-form.label :name="$name" :label="$label" />
    <x-form.input :type="$type" :name="$name" :placeholder="$placeholder" />
</div>

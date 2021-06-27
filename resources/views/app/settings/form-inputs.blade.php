@php $editing = isset($setting) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="title"
            label="Title"
            value="{{ old('title', ($editing ? $setting->title : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="value"
            label="Value"
            value="{{ old('value', ($editing ? $setting->value : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>

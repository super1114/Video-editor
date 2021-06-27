<div class="relative flex flex-col rounded bg-white break-words shadow">
    <div class="flex-auto p-6">
        <h4 class="text-lg font-bold mb-3">
            {{ $title }}
        </h4>

        @if(isset($subtitle))
        <h5 class="text-gray-600 text-sm">
            {{ $subtitle }}
        </h5>
        @endif

        {{ $slot }}
    </div>
</div>
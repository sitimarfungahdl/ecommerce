<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div
        x-data="{ state: $wire.$entangle('{{ $getStatePath() }}') }"
        class="flex {{ $isInline() ? 'flex-row gap-2 flex-wrap' : 'flex-col gap-1' }}"
    >
        @foreach($getOptions() as $value => $label)
            @php
                $color = $getColor($value);
                $icon = $getIcon($value);

                // Hex color untuk setiap status
                $colorHex = match($color) {
                    'info' => '#3b82f6',      // Biru
                    'primary' => '#8b5cf6',    // Ungu
                    'warning' => '#f59e0b',    // Kuning/Orange
                    'success' => '#10b981',    // Hijau
                    'danger' => '#ef4444',     // Merah
                    default => '#6b7280',      // Abu-abu
                };
            @endphp

            <button
                type="button"
                @click="state = '{{ $value }}'"
                x-bind:style="state === '{{ $value }}' ? 'background-color: {{ $colorHex }}; color: white; box-shadow: 0 2px 4px rgba(0,0,0,0.1);' : ''"
                style="border: 1px solid #d1d5db;"
                class="px-4 py-2 rounded-lg font-medium transition-all duration-200 flex items-center justify-center gap-2 min-w-[120px]"
                x-bind:class="state !== '{{ $value }}' ? 'bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700' : ''"
            >
                @if($icon)
                    <x-filament::icon
                        :icon="$icon"
                        class="w-5 h-5"
                    />
                @endif
                <span>{{ $label }}</span>
            </button>
        @endforeach
    </div>
</x-dynamic-component>

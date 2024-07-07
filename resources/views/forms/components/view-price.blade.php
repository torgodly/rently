<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div x-data="{ state: $wire.$entangle('{{ $getStatePath() }}') }">
        @php
            $data = (object) collect($this->data)->toArray();

            // Initialize variables
            $days = 0;
            $start = '';
            $end = '';

            // Check if date_range exists and is not empty
            if (isset($data->date_range) && !empty($data->date_range)) {
                // Split date_range into start and end dates
                list($start, $end) = explode(' - ', $data->date_range);

                // Parse dates using correct format
                $date1 = DateTime::createFromFormat('d/m/Y', trim($start));
                $date2 = DateTime::createFromFormat('d/m/Y', trim($end));

                // Calculate days between two dates
                if ($date1 && $date2) {
                    $interval = $date2->diff($date1);
                    $days = $interval->days + 1; // Add 1 to include both start and end dates
                }
            }
        @endphp

        <div class="flex justify-center items-center text-4xl font-bold">
            {{-- Display number of days --}}
            {{$this->record->price_per_day * $days}}
        </div>
    </div>
</x-dynamic-component>

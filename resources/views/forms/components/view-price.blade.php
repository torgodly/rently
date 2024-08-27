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
            $discount = $this->record->discount; // Assuming $discount is a percentage

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

            // Calculate total price
            $pricePerDay = $this->record->price_per_day;
            $totalPrice = $pricePerDay * $days;
            $discountAmount = $totalPrice * ($discount / 100);
            $discountedPrice = $totalPrice - $discountAmount;
        @endphp

        <div class="flex flex-col justify-center items-center text-4xl font-bold">
            {{-- Display discounted price --}}
            @if ($totalPrice > 0)
                @if ($discount > 0)
                    <div class="text-sm line-through text-gray-500">{{ number_format($totalPrice) }} د.ل</div>
                @endif
                <div class="text-green-600">{{ number_format($discountedPrice) }} د.ل</div>
            @else
                <div class="text-green-600">{{ number_format($discountedPrice) }} د.ل</div>
            @endif

        </div>
    </div>
</x-dynamic-component>

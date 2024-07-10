<x-dynamic-component :component="$getEntryWrapperView()" :entry="$entry">
    @php
        $data = $this->record;

        // Initialize variables
        $days = 0;
        $start = $this->record->pickup_date->format('d/m/Y');
        $end = $this->record->return_date->format('d/m/Y');
        $discount = $this->record->discount; // Assuming $discount is a percentage

        // Parse dates using correct format
        $date1 = DateTime::createFromFormat('d/m/Y', trim($start));
        $date2 = DateTime::createFromFormat('d/m/Y', trim($end));

        // Calculate days between two dates
        if ($date1 && $date2) {
            $interval = $date2->diff($date1);
            $days = $interval->days + 1; // Add 1 to include both start and end dates
        }
        // Calculate total price
        $pricePerDay = $this->record->price;
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
</x-dynamic-component>

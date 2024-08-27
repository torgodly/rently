<x-dynamic-component :component="$getEntryWrapperView()" :entry="$entry">
    <div class="flex flex-col items-center text-4xl font-bold">
        @php
            $discount = $this->record->discount;
            $price = $this->record->price_per_day;
            $discountedPrice = $price - ($price * $discount / 100);
        @endphp
        @if($discount > 0)
            <div class="text-gray-500 text-sm line-through mb-2">{{ $price }} د.ل</div>
        @endif
        <div class="text-green-600">{{ $discountedPrice }} د.ل</div>
    </div>
</x-dynamic-component>

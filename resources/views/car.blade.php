<div class="px-5 py-2">
    <div class="grid grid-cols-3 gap-3">
        @foreach ($records as $record)
            @php
                $originalPrice = $record->price_per_day;
                $discount = $record->discount;
                $finalPrice = $originalPrice;

                if ($discount > 0) {
                    $finalPrice = $originalPrice * (1 - $discount / 100);
                }
            @endphp

            <a href="{{ \App\Filament\Resources\CarResource::getUrl('view', [$record]) }}">
                <div class="relative cursor-pointer @if(!$record->available) opacity-50 @endif">
                    <div class="relative">
                        <img
                            class="object-cover transition duration-300 ease-in-out rounded-xl hover:ring hover:ring-gray-400 hover:ring-offset-4"
                            src="https://img.sixt.com/1600/6f09b0e8-6820-4ac0-bedd-5797e9814c18.jpg">
                        <img class="absolute z-10 transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                             src="{{ $record->hero }}">
                        @if(!$record->available)
                            <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 rounded-xl">
                                <span class="text-xl font-bold text-white">Not Available</span>
                            </div>
                        @endif
                    </div>
                    <div class="absolute text-left rounded-lg top-3 left-4">
                        <div class="space-y-5">
                            <div>
                                <h1 class="font-bold text-white rounded-lg">({{ $record->body_style }}) {{ $record->model }}</h1>
                                <span class="text-xs font-semibold text-gray-500">{{ $record->make }} | {{ $record->manufacturing_year }}</span>
                            </div>
                            <div class="flex flex-row-reverse items-center justify-start gap-3">
                                <div class="flex flex-row-reverse items-center justify-center px-2 py-1 text-white bg-gray-800 rounded-xl w-fit">
                                    <x-tabler-user-filled class="w-3 h-3 mr-1"/>
                                    <span class="text-xs">5</span>
                                </div>
                                <div class="flex flex-row-reverse items-center justify-center px-2 py-1 text-white bg-gray-800 rounded-xl w-fit">
                                    @if($record->transmission_type == 'automatic')
                                        <x-tabler-automatic-gearbox class="w-4 h-4 mr-1"/>
                                    @else
                                        <x-tabler-manual-gearbox class="w-4 h-4 mr-1"/>
                                    @endif
                                    <span class="text-sm">{{ $record->transmission_type }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="absolute text-left rounded-lg bottom-3 left-4">
                        <div class="">
                            <div class="flex flex-col justify-start">
                                <span class="text-xs font-semibold text-gray-500">Millage</span>
                                <span class="font-bold text-white rounded-lg">{{ $record->mileage_to_service }}km</span>
                            </div>
                            <div>
                                <span class="text-xs font-semibold text-gray-500">Price</span>
                                <div class="flex flex-row-reverse items-baseline justify-center gap-1 font-bold text-white rounded-lg">
                                    @if ($discount > 0)
                                        <div class="flex flex-col items-center justify-center">
                                            <div class="flex flex-row-reverse items-center justify-center gap-3">
                                                <span class="ml-2 text-2xl">${{ number_format($finalPrice, 2) }}</span>
                                                <span class="text-sm">day /</span>
                                            </div>
                                            <div class="flex items-baseline gap-2">
                                                <span class="text-sm text-green-500">({{ $discount }}% off)</span>
                                                <span class="text-red-500 line-through">${{ number_format($originalPrice, 2) }}</span>
                                            </div>
                                        </div>
                                    @else
                                        <span class="text-2xl">د.ل{{ (int) $record->price_per_day }}</span>
                                        <span class="text-sm">
                                            {{ round(($record->price_per_day - (int) $record->price_per_day) * 100) }}.
                                        </span>
                                        <span class="text-sm">day /</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>

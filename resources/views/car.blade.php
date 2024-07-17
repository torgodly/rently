<div class="py-2 px-5">
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

            <a href="{{\App\Filament\Resources\CarResource::getUrl('view', [$record])}}">
                <div class="relative cursor-pointer">
                    <div class="relative">
                        <img
                            class="object-cover rounded-xl hover:ring hover:ring-gray-400 hover:ring-offset-4 transition duration-300 ease-in-out"
                            src="https://img.sixt.com/1600/6f09b0e8-6820-4ac0-bedd-5797e9814c18.jpg">
                        <img class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-10"
                             src="{{$record->hero}}">
                    </div>
                    <div class="absolute top-3 left-4 rounded-lg text-left">
                        <div class="space-y-5">
                            <div>
                                <h1 class="text-white font-bold rounded-lg">({{$record->body_style}}) {{$record->model}}</h1>
                                <span class="text-gray-500 text-xs font-semibold">{{$record->make}} | {{$record->manufacturing_year}}</span>
                            </div>
                            <div class="flex flex-row-reverse justify-start items-center gap-3">
                                <div class="bg-gray-800 text-white px-2 py-1 rounded-xl w-fit flex justify-center items-center flex-row-reverse">
                                    <x-tabler-user-filled class="w-3 h-3 mr-1"/>
                                    <span class="text-xs">5</span>
                                </div>
                                <div class="bg-gray-800 text-white px-2 py-1 rounded-xl w-fit flex justify-center items-center flex-row-reverse">
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
                    <div class="absolute bottom-3 left-4 rounded-lg text-left">
                        <div class="">
                            <div class="flex flex-col justify-start">
                                <span class="text-gray-500 text-xs font-semibold">Millage</span>
                                <span class="text-white font-bold rounded-lg">{{$record->mileage_to_service}}km</span>
                            </div>
                            <div>
                                <span class="text-gray-500 text-xs font-semibold">Price</span>
                                <div class="text-white font-bold rounded-lg flex flex-row-reverse justify-center items-baseline gap-1">
                                    @if ($discount > 0)
                                        <div class="flex flex-col justify-center items-center">

                                            <div class="flex flex-row-reverse justify-center items-center gap-3">
                                                <span class="ml-2 text-2xl">${{ number_format($finalPrice, 2) }}</span>
                                                <span class="text-sm">day /</span>
                                            </div>


                                            <div class="flex items-baseline gap-2">
                                                <span class="text-sm text-green-500">({{ $discount }}% off)</span>

                                                <span class="line-through text-red-500">${{ number_format($originalPrice, 2) }}</span>

                                            </div>

                                        </div>
                                    @else
                                        <span class="text-2xl">${{ (int) $record->price_per_day }}</span>
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

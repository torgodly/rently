<x-filament-breezy::grid-section md=2 title="{{__('Identity Update')}}"
                                 description="{{__('Please upload a clear image of your passport to confirm your identity. Ensure that the image is clear and legible to avoid any delays in the verification process.')}}">
    <x-filament::card>
        <form wire:submit.prevent="submit" class="space-y-6">

            {{ $this->form }}
            <div class="text-right">
                <x-filament::button type="submit" form="submit" class="align-right" :disabled="Auth::user()->isVerified()">
                    {{__('Submit')}}
                </x-filament::button>
            </div>
        </form>
    </x-filament::card>
</x-filament-breezy::grid-section>

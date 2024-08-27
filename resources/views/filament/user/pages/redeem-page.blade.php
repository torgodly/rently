{{--<x-filament-panels::page class="h-full">--}}
<div class="flex justify-center items-center   h-full">
    <div
        class="fi-modal-window pointer-events-auto relative row-start-2 flex w-full cursor-default flex-col bg-white shadow-xl ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10 mx-auto rounded-xl max-w-md">
        <div class="fi-modal-header flex px-6 pt-6 flex-col">

            <div class="mb-5 flex items-center justify-center">
                <div class="rounded-full fi-color-custom bg-blue-100 dark:bg-custom-500/20 p-3">
                    <x-tabler-ticket class="fi-modal-icon h-10 w-10 text-blue-600 dark:text-custom-400"/>
                </div>
            </div>
            <div class="text-center">
                <h2 class="fi-modal-heading text-base font-semibold leading-6 text-gray-950 dark:text-white">{{__("Redeem")}}</h2>
                <p class="fi-modal-description text-sm text-gray-500 dark:text-gray-400 mt-2">{{__('Type your voucher code below to TopUp your balance')}}</p>
            </div>
        </div>

        <div class="fi-modal-content flex flex-col gap-y-4 py-6 px-6">
            <div style="--cols-default: repeat(1, minmax(0, 1fr));"
                 class="grid grid-cols-[--cols-default] fi-fo-component-ctn gap-6">
                <div style="--col-span-default: span 1 / span 1;" class="col-[--col-span-default]">
                    <div data-field-wrapper="" class="fi-fo-field-wrp">
                        <div class="grid gap-y-2">

                            <x-filament-panels::form wire:submit="save">
                                {{ $this->form }}

                                <x-filament-panels::form.actions :full-width="true"
                                                                 :actions="$this->getFormActions()"
                                />
                            </x-filament-panels::form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="fi-modal-footer w-full px-6 pb-6">
            <div
                class="fi-modal-footer-actions gap-3 flex flex-col-reverse sm:grid sm:grid-cols-[repeat(auto-fit,minmax(0,1fr))]">


            </div>
        </div>
    </div>

</div>
{{--</x-filament-panels::page>--}}

<x-filament-panels::page>
    <div>
        {{$this->generateAction}}
        <x-filament-actions::modals />
    </div>

    {{$this->table}}
</x-filament-panels::page>

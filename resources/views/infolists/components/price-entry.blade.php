<x-dynamic-component :component="$getEntryWrapperView()" :entry="$entry">
    <div class="flex justify-center items-center text-4xl font-bold">
        {{ $getState() }} د.ل
    </div>
</x-dynamic-component>

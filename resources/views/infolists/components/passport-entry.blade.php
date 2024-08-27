<x-dynamic-component :component="$getEntryWrapperView()" :entry="$entry">
    <div>

       <img src="{{asset('storage/'. $getState() )}}">
    </div>
</x-dynamic-component>

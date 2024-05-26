<div class="flex justify-center items-center">
    @switch($getState())
        @case('Pending')
            <span class="bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-400 text-4xl font-medium me-2 px-2.5 py-2.5 rounded-xl border border-gray-500 w-full flex justify-center items-center">{{__($getState())}}</span>
            @break
        @case('Confirmed')
            <span class="bg-yellow-100 dark:bg-yellow-600 text-yellow-600 dark:text-yellow-200 text-4xl font-medium me-2 px-2.5 py-2.5 rounded-xl border border-gray-500 w-full flex justify-center items-center">{{__($getState())}}</span>
            @break
        @case('Active')
            <span class="bg-green-100 dark:bg-green-600 text-green-600 dark:text-green-200 text-4xl font-medium me-2 px-2.5 py-2.5 rounded-xl border border-gray-500 w-full flex justify-center items-center">{{__($getState())}}</span>
            @break
        @case('Completed')
            <span class="bg-blue-100 dark:bg-blue-600 text-blue-600 dark:text-blue-200 text-4xl font-medium me-2 px-2.5 py-2.5 rounded-xl border border-gray-500 w-full flex justify-center items-center">{{__($getState())}}</span>
            @break
        @case('Cancelled')
            <span class="bg-red-100 dark:bg-red-600 text-red-600 dark:text-red-200 text-4xl font-medium me-2 px-2.5 py-2.5 rounded-xl border border-gray-500 w-full flex justify-center items-center">{{__($getState())}}</span>
            @break
    @endswitch
</div>

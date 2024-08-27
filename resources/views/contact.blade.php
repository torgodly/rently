<x-tailwind-app-layout>
    <div class="relative bg-white isolate">
        <div class="grid grid-cols-1 mx-auto max-w-7xl lg:grid-cols-2">
            <div class="px-6 pt-20 pb-24 sm:pb-32 lg:px-8 lg:py-48">
                <div class="max-w-xl mx-auto lg:mr-0 lg:max-w-lg">
                    {{--                    flash message--}}
                    @if(session('message'))
                        <div class="relative px-4 py-3 text-green-700 bg-green-100 border border-green-400 rounded"
                             role="alert">
                            <strong class="font-bold">{{__("Success!")}}</strong>
                            <span class="block sm:inline">{{session('message')}}</span>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                <svg onclick="this.parentElement.parentElement.style.display='none';"
                                     class="w-6 h-6 text-green-500 fill-current" role="button"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <title>Close</title>
                                    <path fill-rule="evenodd"
                                          d="M14.354 5.354a2 2 0 00-2.828 0L10 7.172 7.172 5.354a2 2 0 10-2.828 2.828L7.172 10l-2.828 2.828a2 2 0 102.828 2.828L10 12.828l2.828 2.828a2 2 0 102.828-2.828L12.828 10l2.828-2.828a2 2 0 000-2.828z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </span>
                        </div>
                    @endif
                    <form action="{{route('message.create')}}" method="POST">
                        @csrf
                        <div>
                            <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">

                                <div class="sm:col-span-2">
                                    <label for="name"
                                           class="block text-sm font-semibold leading-6 text-gray-900">{{__('Name')}}</label>
                                    <div class="mt-2.5">
                                        <input type="text" name="name" id="name" autocomplete="given-name"
                                               class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6">
                                    </div>
                                    @error('name')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="email"
                                           class="block text-sm font-semibold leading-6 text-gray-900">{{__('Email')}}</label>
                                    <div class="mt-2.5">
                                        <input type="email" name="email" id="email" autocomplete="email"
                                               class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6">
                                    </div>
                                    @error('email')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="phone-number"
                                           class="block text-sm font-semibold leading-6 text-gray-900">{{__('Phone number')}}</label>
                                    <div class="mt-2.5">
                                        <input type="tel" name="phone" id="phone-number" autocomplete="tel"
                                               class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6">
                                    </div>
                                    @error('phone')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="subject"
                                           class="block text-sm font-semibold leading-6 text-gray-900">{{__('subject')}}</label>
                                    <div class="mt-2.5">
                                        <input type="text" name="subject" id="subject" autocomplete="subject"
                                               class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6">
                                    </div>
                                    @error('subject')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="message"
                                           class="block text-sm font-semibold leading-6 text-gray-900">{{__('Message')}}</label>
                                    <div class="mt-2.5">
                                    <textarea name="message" id="message" rows="4"
                                              class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6"></textarea>
                                    </div>
                                    @error('message')
                                    <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex justify-between mt-8">

                                <button type="submit"
                                        class="rounded-md h-fit bg-primary px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-primary focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary">
                                    {{__('Send message')}}
                                </button>

                            </div>

                        </div>
                    </form>

                </div>
            </div>

            <div class="relative px-6 pt-24 pb-20 sm:pt-32 lg:static lg:px-8 lg:py-48">
                <div class="max-w-xl mx-auto lg:mx-0 lg:max-w-lg">
                    <div
                        class="absolute inset-y-0 left-0 w-full overflow-hidden bg-gray-100 -z-10 ring-1 ring-gray-900/10 lg:w-1/2">
                        <svg
                            class="absolute inset-0 h-full w-full stroke-gray-200 [mask-image:radial-gradient(100%_100%_at_top_right,white,transparent)]"
                            aria-hidden="true">
                            <defs>
                                <pattern id="83fd4e5a-9d52-42fc-97b6-718e5d7ee527" width="200" height="200" x="100%"
                                         y="-1" patternUnits="userSpaceOnUse">
                                    <path d="M130 200V.5M.5 .5H200" fill="none"/>
                                </pattern>
                            </defs>
                            <rect width="100%" height="100%" stroke-width="0" fill="white"/>
                            <svg x="100%" y="-1" class="overflow-visible fill-gray-50">
                                <path d="M-470.5 0h201v201h-201Z" stroke-width="0"/>
                            </svg>
                            <rect width="100%" height="100%" stroke-width="0"
                                  fill="url(#83fd4e5a-9d52-42fc-97b6-718e5d7ee527)"/>
                        </svg>
                        <x-contact-svg/>

                    </div>
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900">{{__('Get in touch')}}</h2>
                    <p class="mt-6 text-lg leading-8 text-gray-600">
                        {{__("مرحباً، نحن هنا للمساعدة! إذا كان لديك أي أسئلة، أو تواجه أي مشكلات، أو لديك أي اقتراحات، فلا تتردد في الاتصال بنا. نحن نقدر ملاحظاتك ونتطلع إلى سماعك!")}}
                    </p>
                    <div class="flex w-full">
                        <dl class="w-full mt-10 space-y-4 text-base leading-7 text-gray-600">

                            <div class="flex gap-x-4">
                                <dt class="flex-none">
                                    <span class="sr-only">{{__('Address')}}</span>
                                    <svg class="w-6 text-gray-400 h-7" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5"
                                         stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z"/>
                                    </svg>
                                </dt>
                                <dd> Tripoli - Libya</dd>


                            </div>
                            <div class="flex gap-x-4">
                                <dt class="flex-none">
                                    <span class="sr-only">{{__('Telephone')}}</span>
                                    <svg class="w-6 text-gray-400 h-7" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5"
                                         stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/>
                                    </svg>
                                </dt>
                                <dd><a class="hover:text-gray-900" dir="ltr" href="tel:+218 91 11 111 111">+218 91 111
                                        111
                                        1</a></dd>
                            </div>
                            <div class="flex gap-x-4">
                                <dt class="flex-none">
                                    <span class="sr-only">{{__('Email')}}</span>
                                    <svg class="w-6 text-gray-400 h-7" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5"
                                         stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                                    </svg>
                                </dt>
                                <dd><a class="hover:text-gray-900" href="mailto:info@rently.ly">info@rently.ly</a>
                                </dd>
                            </div>
                            <div class="flex gap-x-4">
                                <dt class="flex-none">
                                    <span class="sr-only">{{__('Facebook')}}</span>
                                    <x-tabler-brand-facebook class="w-6 text-gray-400 h-7"/>
                                </dt>
                                <dd><a class="hover:text-gray-900" href="#">rently </a></dd>
                            </div>


                        </dl>

                    </div>



                </div>
            </div>

        </div>
    </div>

</x-tailwind-app-layout>

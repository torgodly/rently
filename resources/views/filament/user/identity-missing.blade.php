@auth
    @if(!Auth::user()->isVerified())

        <div
            class="relative isolate flex items-center gap-x-6 overflow-hidden bg-red-50 px-6 py-2.5 sm:px-3.5 sm:before:flex-1 rtl:dir-rtl">
            <!-- Background Shapes for LTR Layout -->
            <div
                class="absolute left-[max(-7rem,calc(50%-52rem))] top-1/2 -z-10 -translate-y-1/2 transform-gpu blur-2xl rtl:left-[max(-7rem,calc(50%+52rem))] rtl:transform-gpu rtl:-translate-y-1/2"
                aria-hidden="true">
                <div class="aspect-[577/310] w-[36.0625rem] bg-gradient-to-r from-[#ff6b6b] to-[#ff4757] opacity-30"
                     style="clip-path: polygon(74.8% 41.9%, 97.2% 73.2%, 100% 34.9%, 92.5% 0.4%, 87.5% 0%, 75% 28.6%, 58.5% 54.6%, 50.1% 56.8%, 46.9% 44%, 48.3% 17.4%, 24.7% 53.9%, 0% 27.9%, 11.9% 74.2%, 24.9% 54.1%, 68.6% 100%, 74.8% 41.9%)"></div>
            </div>
            <div
                class="absolute left-[max(45rem,calc(50%+8rem))] top-1/2 -z-10 -translate-y-1/2 transform-gpu blur-2xl rtl:left-[max(45rem,calc(50%-8rem))] rtl:transform-gpu rtl:-translate-y-1/2"
                aria-hidden="true">
                <div class="aspect-[577/310] w-[36.0625rem] bg-gradient-to-r from-[#ff6b6b] to-[#ff4757] opacity-30"
                     style="clip-path: polygon(74.8% 41.9%, 97.2% 73.2%, 100% 34.9%, 92.5% 0.4%, 87.5% 0%, 75% 28.6%, 58.5% 54.6%, 50.1% 56.8%, 46.9% 44%, 48.3% 17.4%, 24.7% 53.9%, 0% 27.9%, 11.9% 74.2%, 24.9% 54.1%, 68.6% 100%, 74.8% 41.9%)"></div>
            </div>
            <div class="flex flex-wrap items-center gap-x-4 gap-y-2 text-center justify-center ">
                <p class="text-sm leading-6 text-red-900">
                    <strong class="font-semibold">{{__('Verification Required')}}</strong>
                    <svg viewBox="0 0 2 2" class="mx-2 inline h-0.5 w-0.5 fill-current" aria-hidden="true">
                        <circle cx="1" cy="1" r="1"/>
                    </svg>{{__('Your account is not verified. Please verify your identity to continue.')}}
                </p>
                <a href="/user/my-profile"
                   class="flex justify-center items-center gap-2 rounded-full bg-red-900 px-3.5 py-1 text-sm font-semibold text-white shadow-sm hover:bg-red-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-900">{{__('Verify now')}}
                    <span aria-hidden="true">
                <x-tabler-arrow-narrow-right class="rtl:rotate-180"/>
            </span></a>
            </div>
            <div class="flex flex-1 justify-end rtl:justify-start">

            </div>
        </div>
    @endif

@endauth

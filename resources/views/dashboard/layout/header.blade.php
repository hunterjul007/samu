<div class="flex items-center relative z-20 rounded-md text-sm justify-between bg-black/30 p-4">
    <div class="flex items-center gap-4">
        <img width="30" class="size-12 rounded-full" height="30" alt="Logo" src="{{ asset('assets/images/logo-2.jpg')}}" />
        <h1 class="text-lg font-semibold text-white"> UrgenceSAMU </h1>
    </div>
    <div class="flex gap-4">
        <div title="Ma performance"
            class="flex items-center bg-stone-500 bg-gradient-to-tr from-stone-600 shadow-inner justify-between space-x-4 shadow-black/30 px-2 rounded-xl">
            <img width="24" height="24" src="{{ asset('assets/images/icons8-performance-48.png') }}" alt=""
                srcset="">
            <span class="text-lg font-semibold text-white">{{ Auth::guard('appuser')->user()->experience }}</span>
        </div>
        <div title="mon argent"
            class="flex items-center bg-stone-100 shadow-inner justify-between space-x-4 shadow-black/30  px-2 rounded-xl">
            <img width="24" height="24" src="{{ asset('assets/images/icons8-coin-60.png') }}" alt=""
                srcset=""> <span class="text-lg font-semibold">{{ Auth::guard('appuser')->user()->argent }}</span>
        </div>
        <button class="flex items-center justify-start text-left gap-2" data-popover-placement="bottom"
            data-popover-trigger="click" data-popover-target="popover-user-profile">
            <img width="30" class="size-8" height="30" src="{{ asset('assets/images/icons8-user-30.png') }}"
                alt="" srcset="">
            <div class="text-white">
                <h2 class="font-semibold">{{ Auth::guard('appuser')->user()->pseudo }}</h2>
                <h3 class="text-sm  text-stone-400">{{ Auth::guard('appuser')->user()->email }}</h3>
            </div>
        </button>
        <div data-popover id="popover-user-profile" role="tooltip"
            class="absolute z-10 overflow-hidden invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0400y-6000">
            <div class="px-3 py-2 bg-red-100 w-fit hover:bg-red-50 border-b border-red-200 text-xs">
                <a href="{{ route('logoutUser') }}">
                    <h3 class="font-semibold text-red-900">Se deconnecter</h3>
                </a>
            </div>
            <div data-popper-arrow></div>
        </div>
    </div>
</div>

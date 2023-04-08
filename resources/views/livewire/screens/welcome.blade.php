<div class="flex flex-col justify-between min-h-screen">
    <div class="h-full w-full max-w-md mx-auto px-4 py-6">
        <img src="{{ asset('images/wfdt-logo.png') }}" class="h-5 w-24" />
    </div>


    <div class="h-full px-4 w-full max-w-md mx-auto">
         <div >
            <p class="font-bold mb-3 text--primary text-4xl">{!! __('screens.welcome.title') !!}</p>
            <p class="mb-12 text-gray-600 text--primary">{!! __('screens.welcome.subtitle') !!}</p>
        </div>
        <div class="mt-16">
            <img src="{{ asset('images/icons/gif-thankyou.png') }}" class="w-16 h-16" />
            <p class="mb-3 text-base text--primary">{!! __('screens.welcome.text') !!}</p>
            <p class="font-bold mb-3 text--primary text-base">{!! __('screens.welcome.profile') !!}</p>
        </div>

    </div>

    <div  class="h-full px-4 w-full max-w-md mx-auto mb-6" >
        <x-button wire:click="submit" class="w-full btn--primary m-15"  wire:loading.attr="disabled">
            Let's Start!
        </x-button>
    </div>

    <x-analytics-tracker page="welcome" />
</div>

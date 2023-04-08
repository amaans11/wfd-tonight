<form form wire:submit.prevent="submit" class="flex flex-col flex-grow justify-between min-h-body  w-full max-w-md mx-auto px-4 py-6">
    <div class="h-full w-full max-w-md mx-auto"></div>
    <div class="w-full max-w-md mx-auto">
        <img src="{{ asset('images/icons/gif-thankyou.png') }}" class="w-16 h-16 mb-4" />
        <h1 class="text-4xl font-bold mb-5 text--primary mb-4">Thank you for signing up!</h1>
        <span class="text--primary text-xl" style="text-align:center;">We're building <span class="font-bold">What’s For Dinner Tonight</span> for people like you, that's why we're excited to have you try it out for yourself. We plan to share our new app with you soon.</span>
        <p class="text--primary text-xl pt-4">In the meantime, we'll e-mail you some  new meal ideas using common pantry and fridge ingredients.</p>
    </div>
    <div class="flex justify-end w-full max-w-md mx-auto pt-4 m-15">
        <x-button
                type="submit"
                class="btn--primary w-full ml-2"
                wire:loading.attr="disabled"
        >
            Ok
        </x-button>
    </div>
</form>

<form form wire:submit.prevent="submit" class="flex flex-col flex-grow justify-between min-h-body py-4">
    <div class="h-full px-4 w-full max-w-md mx-auto">
        <h1 class="text-4xl font-bold mb-2 text--primary">Hurray! </h1>
        <p class="text--primary">Thanks for telling us a bit about yourself to help us make our meal suggestions more relevant to you.</p>
    </div>
    <div class="h-full px-4 w-full max-w-md mx-auto mt-4">
        <div class="w-16 h-16 bg-white" style="border-radius:32px;">
            <img src="{{ asset('images/icons/ic-comingsoon.png') }}"  />
        </div>
    </div>

    <div class="h-full px-4 w-full max-w-md mx-auto">
        <p class="text-base text--primary uppercase">WHAT’S FOR DINNER tonight is launching soon!</p>
        <p class="text-2xl text--primary font-bold">Sign up for our early access list</p>
        <p class="text-base text--primary">In the meantime, we'll send you some new meal ideas using common pantry and fridge ingredients.</p>
        <div class="mt-4">
            <input
                    type="text"
                    class="rounded-lg border-primary bg-grey border-1 w-full outline-none p-4 text-xl text--primary focus:bg-input"
                    placeholder="Type your full name here"
                    wire:model.defer="name"
            />
            @error('name') <p class="text-red-600 mt-2">{{ $message }}</p> @enderror
        </div>

        <div class="mb-2 mt-2">
            <input
                    type="email"
                    class="rounded-lg border-primary bg-grey border-1 w-full outline-none p-4 text-xl text--primary focus:bg-input"
                    placeholder="{{ __('common.email') }}"
                    wire:model.defer="email"
            />
            @error('email') <p class="text-red-600 mt-2">{{ $message }}</p> @enderror
        </div>
    </div>

    <div class="flex justify-end w-full max-w-md mx-auto pt-4 m-15">
        <x-button
                type="submit"
                class="btn--primary w-full ml-2"
                wire:loading.attr="disabled"
        >
            Sign up
        </x-button>
    </div>
    <x-analytics-tracker page="welcome" />
</form>

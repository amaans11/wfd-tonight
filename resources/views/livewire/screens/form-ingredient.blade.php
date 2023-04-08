<form form wire:submit.prevent="submit" class="flex flex-col flex-grow justify-between min-h-body py-4">
    <div class="h-full w-full max-w-md mx-auto">
        <x-progress-bar value="{{ ($ingredient1 || $ingredient2 || $ingredient3) ? 100 : 87.5 }}" class="mb-10 mt-3"/>

        <h1 class="text-4xl font-bold text--primary pb-4">What are 3 ingredients you typically have on hand that you’d like meal ideas for?</h1>

    </div>

    <div class="gap-3 w-full max-w-md mx-auto">
       <div class ="mb-4">
            <input
                type="text"
                class="rounded-lg border-primary bg-grey border-1 w-full outline-none p-4 text-xl text--primary focus:bg-input"
                placeholder="Ingredient 1"
                wire:model="ingredient1"
            />
       </div>
       <div class ="mb-4">
            <input
                type="text"
                class="rounded-lg border-primary bg-grey border-1 w-full outline-none p-4 text-xl text--primary focus:bg-input"
                placeholder="Ingredient 2"
                wire:model="ingredient2"
            />
       </div>
       <div class ="mb-4">
            <input
                type="text"
                class="rounded-lg border-primary bg-grey border-1 w-full outline-none p-4 text-xl text--primary focus:bg-input"
                placeholder="Ingredient 3"
                wire:model="ingredient3"
            />
       </div>
    </div>

    <div class="flex justify-end w-full max-w-md mx-auto pt-4 m-15">
        <x-button
            type="button"
            class="border-grey w-full mr-2"
            wire:click="back"
        >
            <img src="{{ asset('images/icons/arrow-left.png') }}" class="w-10 h-6 pr-4" />
            Back
        </x-button>
        @if($ingredient1 || $ingredient2 || $ingredient3)
            <x-button
                type="submit"
                class="border btn--primary w-full"
                wire:loading.attr="disabled"
            >
               Next
               <i class="fas fa-arrow-right ml-3"></i>
            </x-button>
        @else
            <x-button
                wire:click="skip"
                class="border-grey w-full"
                wire:loading.attr="disabled"
            >
               Skip
            </x-button>
        @endif
        <x-analytics-tracker page="ingredient-start" />
    </div>
</form>

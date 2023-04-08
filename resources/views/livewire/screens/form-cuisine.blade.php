<form form wire:submit.prevent="submit" class="flex flex-col flex-grow justify-between min-h-body py-4">
    <div class="h-full w-full max-w-md mx-auto">
        <x-progress-bar value="{{ ($input) ? 87.5 : 75 }}" class="mb-10 mt-3"/>

        <h1 class="text-4xl font-bold text--primary">What are your favorite cuisines?</h1>
        <p class="text--primary py-4">We’re happy to explore new culinary territories with you!</p>
       <p class="pt-1 text--primary pb-4">Select all that apply.</p>

    </div>

    <div class="gap-3 mt-6 w-full max-w-md mx-auto">
        <div class="grid grid-cols-6 gap-3">
            @foreach($options as $value => $option)
                <div class="{{$value === 'other' ? 'col-span-6' : 'col-span-2'}}">
                    <x-checkbox-card
                            name="input"
                            type="checkbox"
                            value="{{ $value }}"
                            checked="{{ in_array($value, $input) ? 'true' : 'false' }}"
                            class="rounded-lg flex justify-center items-center py-4 px-2 font-bold"
                    >
                        {{$option['title']}}

                    </x-checkbox-card>
                </div>
            @endforeach
        </div>

        @error('input') <p class="text-red-600 mt-2">{{ $message }}</p> @enderror
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
        <x-button
            type="submit"
            class="btn--primary w-full ml-2"
            wire:loading.attr="disabled"
        >
            Next
            <i class="fas fa-arrow-right ml-3"></i>
        </x-button>
        <x-analytics-tracker page="cuisine-start" />
    </div>
</form>

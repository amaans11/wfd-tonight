<form form wire:submit.prevent="submit" class="flex flex-col flex-grow justify-between min-h-body py-4">
    <div class="h-full w-full max-w-md mx-auto">
        <x-progress-bar value="{{ ($input) ? 75 : 62.5 }}" class="mb-10 mt-3"/>

        <h1 class="text-4xl font-bold mb-4 text--primary">Do you follow any of the following diets?</h1>
        <p class="text--primary">Select all that apply.</p>
    </div>

    <div class="grid grid-cols-2 gap-3 mt-6 w-full max-w-md mx-auto">
        @foreach($options as $value => $option)
            <x-checkbox-card
                    name="input"
                    type="checkbox"
                    value="{{ $value }}"
                    checked="{{ in_array($value, $input) ? 'true' : 'false' }}"
                    label-class="{{ $value === 'otherLowCarb' || $value === 'healthy' || $value === 'other' ? 'col-span-2' : '' }}"
                    class="rounded-lg flex justify-center items-center py-4 px-2 font-bold"
            >
            
                <div>
                    <div class="flex justify-center">
                        {{$option['title']}}
                    </div>
                    <p class="text-base" style="font-weight:100">
                        {{ isset($option['text']) ? $option['text'] : ''}}
                    </p>
                </div>
            </x-checkbox-card>
        @endforeach

        @error('input') <p class="text-red-600 mt-2">{{ $message }}</p> @enderror
    </div>

    <div class="flex justify-end w-full max-w-md mx-auto pt-8 m-15">
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
        <x-analytics-tracker page="diet-start" />
    </div>
</form>

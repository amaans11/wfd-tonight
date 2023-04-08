<?php

namespace App\Http\Livewire\Screens;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FormDiet extends Component
{
    public array $input = [];

    protected $rules = [
        'input' => ['required', 'array'],
        'input.*' => ['required', 'string'],
    ];

    public function mount()
    {
        $this->input = Auth::user()->data->get('diet', []);
    }
    public function back(){
        return redirect()->route('householdForm');
    }

    public function submit()
    {
        $this->validate();

        $user = Auth::user();
        $user->data->put('diet', $this->input);
        $user->save();

        return redirect()->route('formCuisine');
    }

    public function render()
    {
        $options = [
            'vegan' => ['title' => 'Vegan' ],
            'vegetarian' => ['title' => 'Vegetarian'],
            'otherLowCarb' => ['title' => 'Other Low Carb', 'text' => 'e.g paleo,whole30'],
            'healthy' => ['title' => 'Heart Healthy','text' => 'low fat, low cholesterol, low sodium'],
            'diaryFree' => ['title' => 'Dairy-free'],
            'glutenFree' => ['title' => 'Gluten-free'],
            'keto' => ['title' => 'Keto'],
            'fasting' => ['title' => 'Intermittent Fasting'],
            'other' => ['title' => 'Other'],
        ];

        return view('livewire.screens.form-diet', ['options' => $options]);
    }
}

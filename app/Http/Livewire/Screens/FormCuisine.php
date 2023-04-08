<?php

namespace App\Http\Livewire\Screens;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FormCuisine extends Component
{
    public array $input = [];

    protected $rules = [
        'input' => ['required', 'array'],
        'input.*' => ['required', 'string'],
    ];

    public function mount()
    {
        $this->input = Auth::user()->data->get('cuisines', []);
    }

    public function submit()
    {
        $this->validate();

        $user = Auth::user();
        $user->data->put('cuisines', $this->input);
        $user->save();

        return redirect()->route('formIngredient');
    }
    public function back(){
        return redirect()->route('formDiet');
    }

    public function render()
    {
        $options = [
            'thai' => ['title' => 'Thai' ],
            'indian' => ['title' => 'Indian' ],
            'mexican' => ['title' => 'Mexican' ],
            'korean' => ['title' => 'Korean' ],
            'japanese' => ['title' => 'Japanese' ],
            'italian' => ['title' => 'Italian' ],
            'mediterranean' => ['title' => 'Mediterranean' ],
            'american' => ['title' => 'American' ],
            'chinese' => ['title' => 'Chinese' ],
            'other' => ['title' => 'Other' ],
        ];

        return view('livewire.screens.form-cuisine', ['options' => $options]);
    }
}

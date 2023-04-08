<?php

namespace App\Http\Livewire\Screens;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CookingSkill extends Component
{
    public string $input = '';

    protected $rules = [
        'input' => ['required', 'string'],
    ];
    public function mount()
    {
        $this->input = Auth::user()->data->get('cookingSkill', '');
    }

    public function submit()
    {
        $this->validate();

        $user = Auth::user();
        $user->data->put('cookingSkill', $this->input);
        $user->save();

        return redirect()->route('formProfileAge');
    }

    public function render()
    {
        $options = [
            'novice' => 'Novice',
            'intermediate' => 'Intermediate',
            'expert' => 'Expert',
        ];

        return view('livewire.screens.cooking-skill', ['options' => $options])->layout('layouts.app');
    }
}

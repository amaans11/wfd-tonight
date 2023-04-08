<?php

namespace App\Http\Livewire\Screens;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class GenderForm extends Component
{
    public string $gender = '';

    protected $rules = [
        'gender' => ['required', 'string'],
    ];

    public function submit()
    {
        $this->validate();

        $user = Auth::user();
        $user->data->put('gender', $this->gender);
        $user->save();

        return redirect()->route('ageForm');
    }

    public function render()
    {
        $options = [
            'female' => 'Female',
            'male' => 'Male',
            'non_binary' => 'Non-binary',
            'other' => 'Other',
            'none' => 'I’d rather not say'
        ];

        return view('livewire.screens.gender-form', ['options' => $options])
            ->layout('layouts.app');
    }
}

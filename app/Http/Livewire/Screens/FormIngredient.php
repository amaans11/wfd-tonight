<?php

namespace App\Http\Livewire\Screens;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FormIngredient extends Component
{
    public string $ingredient1,$ingredient2,$ingredient3 = '';

    protected $rules = [
        'ingredient1' => ['required', 'string'],
        'ingredient2' => ['required', 'string'],
        'ingredient3' => ['required', 'string'],
    ];

    public function mount()
    {
        $this->ingredient1 = Auth::user()->data->get('ingredient1', '');
        $this->ingredient2 = Auth::user()->data->get('ingredient2', '');
        $this->ingredient3 = Auth::user()->data->get('ingredient3', '');
    }
    public function skip(){
        $user = Auth::user();
        $user->data->put('ingredients', []);
        $user->save();

        return redirect()->route('formSignup');
    }
    public function back(){
        return redirect()->route('formCuisine');
    }

    public function submit()
    {
        $ingredients=[];
        if($this->ingredient1){
            array_push($ingredients,$this->ingredient1);
        }
        if($this->ingredient2){
            array_push($ingredients,$this->ingredient2);
        }
        if($this->ingredient3){
            array_push($ingredients,$this->ingredient3);
        }
        $user = Auth::user();
        $user->data->put('ingredients', $ingredients);
        $user->save();

        return redirect()->route('formSignup');
    }

    public function render()
    {
        return view('livewire.screens.form-ingredient',['ingredient1' => $this->ingredient1]);
    }
}

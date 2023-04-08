<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::all();
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->name,
            $user->email,
            $user->data?->get('hurdle_process'),
            $user->data?->get('source_id'),
            $user->data?->get('cookingSkill'),
            $user->data?->get('age'),
            $user->data?->get('gender'),
            $user->data?->get('healthyEating'),
            $user->data?->get('noOfAdults'),
            $user->data?->get('noOfKids'),
            implode('|', $user->data?->get('diet') ?? []),
            implode('|', $user->data?->get('cuisines') ?? []),
            implode('|', $user->data?->get('ingredients') ?? []),
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Name',
            'Email',
            'Hurdle process',
            'Source id',
            'Cooking Skill',
            'Age',
            'Gender',
            'Healthy Eating',
            'No. Of Adults',
            'No. Of Kids',
            'Diets',
            'Cuisines',
            'Ingredients',
        ];
    }
}

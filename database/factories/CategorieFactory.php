<?php

namespace Database\Factories;

use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategorieFactory extends Factory
{
    protected $model = Categorie::class;
    public function definition()

    {
        return [
            'name' => Str::random(10),
            'description' => Str::random(10)
        ];
    }
}

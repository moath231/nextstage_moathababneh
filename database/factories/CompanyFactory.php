<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'google',
            'email' => 'gmail.com',
            'logo' => 'public\askl',
            'website' => 'google.com',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

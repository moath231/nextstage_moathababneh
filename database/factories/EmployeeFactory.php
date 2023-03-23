<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname' => 'moath',
            'lastname' => 'ababneh',
            'company_id' => Company::factory(),
            'email' => 'moath@moath.com',
            'phone' => '0797895786',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Sojho Developer',
            'email' => 'sojhodeveloper@gmail.com',
            'address' => 'Nepal',
            'phone' => '1234567890',
            'status' => 1
        ];
    }
}

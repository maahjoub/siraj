<?php

namespace Database\Factories;

use App\Models\Phase;
use App\Models\Gender;
use App\Models\ClassRom;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'date_of_birth' => fake()->date(),
            'nationality_number' => random_int(99999999999, 999999999999),
            'Std_number' => rand(999, 9999),
            'mobile' => fake()->mobile(),
            'gender_id' => Gender::get()->random(),
            'class_rom_id' => ClassRom::get()->random(),
            'phase_id' => Phase::get()->random(),
          
        ];
    }
}

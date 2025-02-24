<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Prescription;
use App\Models\Appointment;

class PrescriptionFactory extends Factory
{
    protected $model = Prescription::class;

    public function definition(): array
    {
        return [
            'appointment_id' => Appointment::factory(),
            'medications' => $this->faker->words(3, true),
            'instructions' => $this->faker->sentence,
        ];
    }
}

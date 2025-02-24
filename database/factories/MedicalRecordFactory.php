<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\MedicalRecord;
use App\Models\Patient;

class MedicalRecordFactory extends Factory
{
    protected $model = MedicalRecord::class;

    public function definition(): array
    {
        return [
            'patient_id' => Patient::factory(),
            'diagnosis' => $this->faker->sentence,
            'treatment' => $this->faker->sentence,
            'record_date' => $this->faker->date,
        ];
    }
}

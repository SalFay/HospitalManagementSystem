<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\MedicalRecord;
use App\Models\Prescription;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ModuleSeeder extends Seeder
{
    public function run(): void
    {
        Department::factory(5)->create()->each(function ($department) {
            $doctors = Doctor::factory(3)->create(['department_id' => $department->id]);

            $patients = Patient::factory(10)->create();

            $patients->each(function ($patient) use ($doctors) {
                $appointments = Appointment::factory(2)->create([
                    'patient_id' => $patient->id,
                    'doctor_id' => $doctors->random()->id,
                ]);

                $appointments->each(function ($appointment) {
                    MedicalRecord::factory()->create(['patient_id' => $appointment->patient_id]);
                    Prescription::factory()->create(['appointment_id' => $appointment->id]);
                });
            });
        });
    }
}

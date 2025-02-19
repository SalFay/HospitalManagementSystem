<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalRecord extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['patient_id', 'diagnosis', 'treatment', 'record_date'];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}

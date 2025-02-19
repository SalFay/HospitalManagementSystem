<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prescription extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['appointment_id', 'medications', 'instructions'];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}


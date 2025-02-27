<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
  use HasFactory, SoftDeletes;

  protected $fillable = ['name', 'email', 'phone', 'address', 'dob', 'gender'];

  public function appointments()
  {
    return $this->hasMany(Appointment::class);
  }
}

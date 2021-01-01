<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Med;
use App\Models\Patient;
use App\Models\Person;

class Doctor extends Model
{
    use HasFactory;

    protected $table = 'doctor';
    public $timestamps = false;
    protected $primaryKey = 'did';

    public function med()
    {
        return $this->hasMany(Med::class);
    }

    public function patient()
    {
        return $this->hasMany(Patient::class);
    }

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}

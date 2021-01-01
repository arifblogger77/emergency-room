<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = 'patient';
    public $timestamps = false;
    protected $primaryKey = 'pid';

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function medication()
    {
        return $this->hasMany(Medication::class);
    }

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
